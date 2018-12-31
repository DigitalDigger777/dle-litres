<?php

namespace App\Command;

use App\Entity\DlePost;
use App\Entity\LitresJsonData;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class LitresCheckBookInDleCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $em;

    protected static $defaultName = 'litres:check-book-in-dle';

    /**
     * LitresImportCommand constructor.
     * @param null $name
     * @param EntityManagerInterface $em
     */
    public function __construct($name = null, EntityManagerInterface $em)
    {
        parent::__construct($name);
        $this->em = $em;

    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
//        $arg1 = $input->getArgument('arg1');
//
//        if ($arg1) {
//            $io->note(sprintf('You passed an argument: %s', $arg1));
//        }
//
//        if ($input->getOption('option1')) {
//            // ...
//        }
//        $posts = DlePost::findAll

        $filename = 'check_book.pid';

        if (!file_exists($filename)) {
            $offset = 0;
        } else {
            $h = fopen($filename, 'r+');
            $offset = fread($h, filesize($filename));
            fclose($h);
        }

        if (!file_exists('check_book_count.pid')) {
            $qb = $this->em->createQueryBuilder();
            $qb->select('count(post.id)');
            $qb->from(DlePost::class,'post');

            $count = $qb->getQuery()->getSingleScalarResult();

            $h1 = fopen('check_book_count.pid', 'w+');
            fwrite($h1, $count);
            fclose($h1);
        } else {
            $h1 = fopen('check_book_count.pid', 'r+');
            $count = fread($h1, filesize('check_book_count.pid'));
            fclose($h1);
        }

        if ($offset >= 0) {
            $posts = $this->em->getRepository(DlePost::class)->findBy([], [], 100, $offset);

            //treatment post

            /**
             * @var DlePost $post
             * @var LitresJsonData $litresData
             */
            foreach ($posts as $post) {
                $xfieldsData = $post->getXfields();
                $xfields = $this->explode_xfields($xfieldsData);

                if (isset($xfields['hub_id']) || isset($xfields['litres_hub_id'])) {
                    $hub_id = isset($xfields['hub_id']) ? $xfields['hub_id'] : $xfields['litres_hub_id'];

                    $litresData = $this->em->getRepository(LitresJsonData::class)->findOneBy(['hub_id' => $hub_id]);

                    if ($litresData) {
                        $localId = $post->getId();
                        $litresData->setLocalId($localId);
                        $this->em->persist($litresData);

                        echo "update local id for hub_id " . $hub_id . "\n";
                    }
                } else {
                    echo "hub_id not isset for dle_post #" . $post->getId() .  "\n";
                }
            }

            $this->em->flush();

            $offset = $offset + 100;

            if (ceil($count / 100) < ceil($offset / 100)) {
                $offset = -1; //disable command
            }

            $h = fopen($filename, 'w+');
            fwrite($h, $offset);
            fclose($h);
            $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
        } else {
            $io->success('Script stopped');
        }


    }

    /**
     * @param $data
     * @return array|bool
     */
    private function explode_xfields($data){
        //преобразует строку xfields в двумерный массив
        $xfields_array = explode('||',$data);
        foreach ($xfields_array as $xfield){
            $xfield_array = explode('|',$xfield);
            $xfields[$xfield_array[0]] = isset($xfield_array[1]) ? $xfield_array[1] : '';
        }
        return is_array($xfields) ? $xfields : false;
    }

}

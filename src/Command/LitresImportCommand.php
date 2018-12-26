<?php

namespace App\Command;

use App\Entity\LitresData;
use App\Entity\LitresJsonData;
use App\Entity\LitresProcess;
use App\Utils\Litres;
use App\Utils\Log;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class LitresImportCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $em;

    protected static $defaultName = 'litres:import';

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

//        $litresData = new LitresData();
//        $litresData->setHubId(1);
//        $litresData->setLitresUrl('');
//        $litresData->setLitresId(1);
//        $litresData->setHubAuthorId(1);
//        $litresData->setLitresAUrl('');
//        $litresData->setLocalBookId(1);
//        $litresData->setLocalBookIdLitresCatalog(1);
//        $litresData->setGlobalBookId('1');
//        $litresData->setHasTrial('0');
//        $litresData->setMybookBookUrl('');
//        $litresData->setVkFb2DocId(1);
//        $litresData->setVkRtfDocId(1);
//        $litresData->setVkTxtDocId(1);
//        $litresData->setVkEpubDocId(1);
//        $litresData->setVkDocIdPublicStatus(1);
//        $litresData->setAuthorName('test');
//        $litresData->setAuthorSname('t');
//        $litresData->setLitresARod('');
//        $litresData->setAuthorLvl(1);
//        $litresData->setSecondAuthorName('');
//        $litresData->setSecondAuthorSname('');
//        $litresData->setBookTitle('');
//        $litresData->setGenre('');
//        $litresData->setGenreNames('');
//        $litresData->setOptions(1);
//        $litresData->setMustImport(1);
//        $litresData->setYouCanSell(1);
//        $litresData->setCanPreorder(1);
//        $litresData->setLang('en');
//        $litresData->setPrice(0);
//        $litresData->setType(1);
//        $litresData->setAnnotation('');
//        $litresData->setCoverExt('');
//        $litresData->setContractTitle('');
//        $litresData->setPublisher('');
//        $litresData->setPublYear(2018);
//        $litresData->setReteller('');
//        $litresData->setReader('');
//        $litresData->setReleaseDate(new \DateTime());
//        $litresData->setDateWritten(new \DateTime());
//        $litresData->setUpdated(new \DateTime());
//        $litresData->setDateInserted(new \DateTime());
//
//        $this->em->persist($litresData);
//        $this->em->flush();

        $this->getFreshBooks();
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }


    private function getFreshBooks()
    {
        /**
         * @var \SimpleXMLElement $xml
         */
        $process = $this->em->getRepository(LitresProcess::class)->findAll();

        if (count($process) > 0) {
            $litresProcess = $process[0];
            $checkpoint = $process[0]->getLastUpdate()->format('Y-m-d H:i:s');
        } else {
            $litresProcess = new LitresProcess();
            $checkpoint = '2013-01-01 00:00:00';
        }


        $endpoint = new \DateTime($checkpoint);
        $endpoint->add(new \DateInterval('P1D'));

        $litres = new Litres();
        $litres->setCheckpoint($checkpoint);
        $litres->setEndpoint($endpoint->format('Y-m-d H:i:s'));
        $litres->setType(Litres::TYPE_ELECTRONIC_BOOKS);

        $xml = $litres->getFreshBook();

        $updateTime = $xml->attributes()->timestamp->__toString();

        $checkpointDate = new \DateTime($checkpoint);
        $updateTimeDate = new \DateTime($updateTime);

        if ($checkpointDate < $updateTimeDate) {
            $litresProcess->setLastUpdate($endpoint);
        } else {
            $litresProcess->setLastUpdate($updateTimeDate);
        }

        $litresProcess->setStatus(LitresProcess::STATUS_RUN);
        $this->em->persist($litresProcess);
        $this->em->flush();

        //$log = new Log();

        foreach ($xml->{'updated-book'} as $book)
        {
            $hub_id = $book->attributes()->id->__toString();

            $litresJsonData = $this->em->getRepository(LitresJsonData::class)->findOneBy(['hub_id' => $hub_id]);

            if (!$litresJsonData) {
                $litresJsonData = new LitresJsonData();
                $litresJsonData->setHubId($book->attributes()->id->__toString());
                $litresJsonData->setLocalId(0);
                $litresJsonData->setNeedLocalUpdate(false);

                //$log->write('Added new book id ' . $book->attributes()->id->__toString());
            } else {
                $litresJsonData->setNeedLocalUpdate(true);
                //$log->write('update book id ' . $book->attributes()->id->__toString());
            }

            $litresJsonData->setUpdated(new \DateTime($book->attributes()->updated->__toString()));
            $litresJsonData->setExternalId($book->attributes()->external_id->__toString());
            $litresJsonData->setLastRelease(new \DateTime($book->attributes()->last_release->__toString()));
            $litresJsonData->setYouCanSell($book->attributes()->you_can_sell->__toString());
            $litresJsonData->setData($book);


            $this->em->persist($litresJsonData);
            $this->em->flush();

//            $litresData = new LitresData();
//            $litresData->setHubId($book->attributes()->id);
//            $litresData->setLitresUrl($book->attributes()->url);
//            $litresData->setLitresId(1);
//            $litresData->setHubAuthorId(1);
//            $litresData->setLitresAUrl('');
//            $litresData->setLocalBookId(1);
//            $litresData->setLocalBookIdLitresCatalog(1);
//            $litresData->setGlobalBookId($book->attributes()->external_id);
//            $litresData->setHasTrial($book->attributes()->has_trial);
//            $litresData->setMybookBookUrl('');
//            $litresData->setVkFb2DocId(1);
//            $litresData->setVkRtfDocId(1);
//            $litresData->setVkTxtDocId(1);
//            $litresData->setVkEpubDocId(1);
//            $litresData->setVkDocIdPublicStatus(1);
//            $litresData->setAuthorName('test');
//            $litresData->setAuthorSname('t');
//            $litresData->setLitresARod('');
//            $litresData->setAuthorLvl(1);
//            $litresData->setSecondAuthorName('');
//            $litresData->setSecondAuthorSname('');
//            $litresData->setBookTitle('');
//            $litresData->setGenre('');
//            $litresData->setGenreNames('');
//            $litresData->setOptions(1);
//            $litresData->setMustImport($book->attributes()->must_import);
//            $litresData->setYouCanSell(1);
//            $litresData->setCanPreorder(1);
//            $litresData->setLang('en');
//            $litresData->setPrice($book->attributes()->price);
//            $litresData->setType(1);
//            $litresData->setAnnotation('');
//            $litresData->setCoverExt('');
//            $litresData->setContractTitle($book->attributes()->contract_title);
//            $litresData->setPublisher('');
//            $litresData->setPublYear(2018);
//            $litresData->setReteller('');
//            $litresData->setReader('');
//            $litresData->setReleaseDate(new \DateTime());
//            $litresData->setDateWritten(new \DateTime());
//            $litresData->setUpdated(new \DateTime($book->attributes()->updated));
//            $litresData->setDateInserted(new \DateTime());
//
//            $this->em->persist($litresData);
//            $this->em->flush();
        }


    }
}

<?php
    namespace App\Utils;

    use App\Utils\Log;
    use Doctrine\ORM\EntityManager;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;

    class Litres
    {
        const TYPE_ELECTRONIC_BOOKS = 0;
        const TYPE_AUDIO_BOOKS = 1;
        const TYPE_PDF_BOOK = 4;
        const TYPE_ENGLISH_BOOK = 11;
        const TYPE_ALL = 'all';

        private $log;


        /**
         * @var string
         */
        private $place = 'PRTN';

        private $secreetKey = '';

        private $logFile = '';

        /**
         * @var string
         */
        private $checkpoint = null;

        private $uuid = null;

        private $endpoint = null;

        private $sha = null;

        private $type = null;

        /**
         * @param null $checkpoint
         */
        public function setCheckpoint($checkpoint)
        {
            $this->checkpoint = $checkpoint;
        }

        /**
         * @param null $uuid
         */
        public function setUuid($uuid)
        {
            $this->uuid = $uuid;
        }

        /**
         * @param null $endpoint
         */
        public function setEndpoint($endpoint)
        {
            $this->endpoint = $endpoint;
        }

        /**
         * @param null $sha
         */
        public function setSha($sha)
        {
            $this->sha = $sha;
        }

        /**
         * @param null $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }

        /**
         * Litres constructor.
         */
        public function __construct()
        {
            $this->place = getenv('LITRES_PLACE');
            $this->secreetKey = getenv('LITRES_SECREET_KEY');
            $this->logFile = getenv('LITRES_LOG_FILE');

            $this->log = new Log($this->logFile);
        }

        /**
         * @return null|\SimpleXMLElement
         */
        public function getFreshBook()
        {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://partnersdnld.litres.ru',
                // You can set any number of default request options.
                'timeout'  => 60*30,
            ]);

            try {
                $response = $client->request('GET', '/get_fresh_book/', [
                    'query' => $this->buildQuery()
                ]);

                if ($response->getStatusCode() == 200) {
                    $body = $response->getBody();
                    $contents = $body->getContents();
                    return simplexml_load_string($contents);


                }
            } catch (ClientException $e) {

                $body = $e->getResponse()->getBody();
                $contents = $body->getContents();
                $xml = simplexml_load_string($contents);

                $this->log->write($xml[0]);
            }

            return null;
        }

        public function getAllBooks()
        {
            $this->checkpoint = '2013-01-01 00:00:00';
            $this->getFreshBook();
        }

        /**
         * Build query.
         *
         * @return array
         */
        private function buildQuery()
        {
            $dateStart = new \DateTime($this->checkpoint);
            $timestamp = time();

            $query = [
                'place'      => $this->place,
                'checkpoint' => $dateStart->format('Y-m-d H:i:s'),
                'sha'        => $this->makeSHA($timestamp),
                'timestamp'  => $timestamp,
                'type'       => $this->type
            ];

            if ($this->uuid) {
                $query['uuid'] = $this->uuid;
            }

            if ($this->endpoint) {
                $query['endpoint'] = $this->endpoint;
            }

            return $query;
        }

        /**
         * @param $timestamp
         * @return string
         */
        private function makeSHA($timestamp)
        {
            return hash('sha256', $timestamp . ':' . $this->secreetKey . ':' . $this->checkpoint);
        }
    }
<?php
/**
 * Created by PhpStorm.
 * User: korman
 * Date: 23.12.18
 * Time: 2:53
 */

namespace App\Utils;

class Log
{

    private $logFile;

    /**
     * Log constructor.
     */
    public function __construct()
    {
        $this->logFile = getenv('LITRES_LOG_FILE');
    }

    /**
     * @param $text
     */
    public function write($text)
     {
         $actionDate = new \DateTime();
         $date = $actionDate->format('Y-m-d H:i:s');
         $h = fopen($this->logFile, 'a+');
         fwrite($h, '[' . $date .'] ' . $text . "\n");
         fclose($h);
     }
}
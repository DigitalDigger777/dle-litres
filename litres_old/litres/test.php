<?php
echo basename(__DIR__) . "\n";
echo dirname(__FILE__) . "\n";
$h = fopen(dirname(__FILE__) . '/../../../bks/pppooo.jpg', 'a+');

fwrite($h, 'sss');
fclose($h);

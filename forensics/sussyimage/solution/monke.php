<?php
$secret = 'superdupertopsecretpasswordforrunningphpandhackingserverslol...defsnotsus';

$c1 = 'AAwDERcJ';
$c2 = 'FhYYClJD';
$c3 = 'NiQjCQc5';
$c4 = 'RQAsPBso';
$c5 = 'QBdSLBRH';
$c6 = 'Gy0dVTAa';
$c7 = 'RhYlXQ1P';
$c8 = 'Glc=';

$sus = base64_decode($c1) ^ $secret;
$even_sussier = base64_decode($c2.$c3.$c4.$c5.$c6.$c7.$c8) ^ $secret;
echo '$sus: '.$sus."\n";
echo '$even_sussier: '.$even_sussier."\n";
__halt_compiler();

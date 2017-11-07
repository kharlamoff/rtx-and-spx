<?php
header('Content-type: text/html; charset=utf-8');

$uploadfile = 'some.rtx';
$file = file_get_contents($uploadfile);
$resultMas = explode('<ClassInstance Type="TRTResult" Name="Results">', $file);
$channelsMas = explode('<Channels>', $file);
$channelsMasEnd = explode('</Channels>', $channelsMas[1]);
$channels = $channelsMasEnd[0];
$fp = fopen("channels.txt", "w");
fwrite($fp, $channels);
fclose($fp);  
         
preg_match_all('|<Result[^>]*?>(.*?)</Result>|sei', $resultMas[1], $Result); 

$Atom = [];
$xline = [];
$NetIntens = [];
$Background = [];
$Sigma = [];
$Chi = [];
$Cycles = [];
$arr1 = [];
$arr2 = [];
$arr3 = [];
$arr4 = [];      
$arr5 = [];
$arr6 = [];      
$arr7 = []; 

for ($i=0; $i<count($Result[0]); $i++) {
$arr2[1] = '';
$arr3[1] = '';
$arr4[1] = '';
$arr5[1] = '';
$arr6[1] = '';
$arr7[1] = '';
        
preg_match('|<Atom>(.*)</Atom>|sei', $Result[0][$i], $arr1);  
preg_match('|<XLine>(.*)</XLine>|sei', $Result[0][$i], $arr2);     
preg_match('|<NetIntens>(.*)</NetIntens>|sei', $Result[0][$i], $arr3);  
preg_match('|<Background>(.*)</Background>|sei', $Result[0][$i], $arr4);
preg_match('|<Sigma>(.*)</Sigma>|sei', $Result[0][$i], $arr5);
preg_match('|<Chi>(.*)</Chi>|sei', $Result[0][$i], $arr6);        
preg_match('|<Cycles>(.*)</Cycles>|sei', $Result[0][$i], $arr7);
              
array_push($Atom, $arr1[1]);
if ($arr2[1] == null) {$arr2[1] = '';}
array_push($xline, $arr2[1]);
if ($arr3[1] == null) {$arr3[1] = '';}
array_push($NetIntens, $arr3[1]);
if ($arr4[1] == null) {$arr4[1] = '';}
array_push($Background, $arr4[1]);
if ($arr5[1] == null) {$arr5[1] = '';}
array_push($Sigma, $arr5[1]);
if ($arr6[1] == null) {$arr6[1] = '';}
array_push($Chi, $arr6[1]);
if ($arr7[1] == null) {$arr7[1] = '';}
array_push($Cycles, $arr7[1]);

}
      
      
?>

<?php
 define('NAMA', 'JAFARUDINA ARDIAN MAULANA');
 echo NAMA . PHP_EOL; 
 const UMUR = 19;
 echo UMUR;

 class Coba {
    const NAMA = 'MANYAN';

    function testing(){
        return __NAMESPACE__;
    }
 }
 echo Coba::NAMA;
 echo "\n";
 $new = new Coba();
 echo $new->testing();
?>
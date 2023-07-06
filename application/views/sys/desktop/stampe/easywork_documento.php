<?php
require_once 'phpword/PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate("../JDocServer/Modelli/$modello");


$document->setValue('nomecognome', $nomecognome);
$document->setValue('cognomenome', $cognomenome);
$document->setValue('nome', $nome);
$document->setValue('cognome', $cognome);
$document->setValue('nomecognomemaiusc', $nomecognomemaiusc);
$document->setValue('email', $email);
$document->setValue('dataassunzione', $dataassunzione);
$document->setValue('indirizzo', $indirizzo);
$document->setValue('cap', $cap);
$document->setValue('paese', $paese);
$document->setValue('numeroavs', $numeroavs);
$document->setValue('dd', $datanascita_dd);
$document->setValue('mm', $datanascita_mm);
$document->setValue('yyyy', $datanascita_yyyy);
$document->setValue('sm', $sesso_m);
$document->setValue('sf', $sesso_f);
$document->setValue('ni', $nazione_i);
$document->setValue('telefono', $telefono);
$document->setValue('sc1', $sc1);
$document->setValue('sc3', $sc3);
$document->setValue('sc6', $sc6);
$document->setValue('scdd', $datastatocivile_dd);
$document->setValue('scmm', $datastatocivile_mm);
$document->setValue('scyyyy', $datastatocivile_yyyy);

$document->setValue('spcognome', $spcognome);
$document->setValue('spnome', $spnome);
$document->setValue('spnumeroavs', $spnumeroavs);
$document->setValue('spdatanascitadd', $spdatanascitadd);
$document->setValue('spdatanascitamm', $spdatanascitamm);
$document->setValue('spdatanascitayyyy', $spdatanascitayyyy);
$document->setValue('spindirizzo', $spindirizzo);
$document->setValue('spcap', $spcap);
$document->setValue('sppaese', $sppaese);
$document->setValue('spdataattivitadd', $spdataattivitadd);
$document->setValue('spdataattivitamm', $spdataattivitamm);
$document->setValue('spdataattivitayyyy', $spdataattivitayyyy);
$document->setValue('spredditoestero', $spredditoestero);
$document->setValue('spredditosvizzera', $spredditosvizzera);

$document->setValue('funocognomenome', "$f1cognome $f1nome");
$document->setValue('funodatadinascitadd', $f1datadinascitadd);
$document->setValue('funodatadinascitamm', $f1datadinascitamm);
$document->setValue('funodatadinascitayyyy', $f1datadinascitayyyy);


$document->setValue('fduecognomenome', "$f2cognome $f2nome");
$document->setValue('fduedatadinascitadd', $f2datadinascitadd);
$document->setValue('fduedatadinascitamm', $f2datadinascitamm);
$document->setValue('fduedatadinascitayyyy', $f2datadinascitayyyy);

$document->setValue('ftrecognomenome', "$f3cognome $f3nome");
$document->setValue('ftredatadinascitadd', $f3datadinascitadd);
$document->setValue('ftredatadinascitamm', $f3datadinascitamm);
$document->setValue('ftredatadinascitayyyy', $f3datadinascitayyyy);

$document->setValue('altreattivitasi', $altreattivitasi);
$document->setValue('altreattivitano', $altreattivitano);






$document->save('../JDocServer/DocumentiCreati/'.$nomecognome.'-'.$id.'-'.$documento);
?>

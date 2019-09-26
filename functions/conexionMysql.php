<?php
// CONNEXIO BD MICROBOOK 
$cfgConMySql['Servidor']='localhost';
$cfgConMySql['NomBD']='noteschords';
$cfgConMySql['Usuari']='root';
$cfgConMySql['Contrasenya']='';

$conmysql = new mysqli($cfgConMySql['Servidor'], $cfgConMySql['Usuari'], $cfgConMySql['Contrasenya'], $cfgConMySql['NomBD']);

if ($conmysql->connect_errno){die("Error obrint BD" . $conmysql->connect_error);}
?>
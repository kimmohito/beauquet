<?php

$dbserv='localhost';
$dbuser='root';
$dbpass='';
$dbname='beauquet';

$connect=mysqli_connect($dbserv, $dbuser, $dbpass, $dbname) or die(mysqli_error());
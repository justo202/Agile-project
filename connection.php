<?php

$dbhost = "agile-project.azurewebsites.net";
$dbuser = "root";
$dbpass = "";
$dbname = "localdb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

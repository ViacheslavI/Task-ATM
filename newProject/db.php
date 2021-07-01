<?php
/*
Данные подключения к базе
*/
header('Content-Type: text/html; charset=utf-8');
$host = "localhost";
$username = "root";
$pass = "";
$DB ="atm";
$conn = new PDO("mysql:dbname=$DB;host=$host; charset=UTF8", $username, $pass);
if(!$conn){
	die("<p>Ошибка подключения к БД.</p><p> Код ошибки: ".$mysqli->connect_errno.$mysqli->connect_error."</p>");
}

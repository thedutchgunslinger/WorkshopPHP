<?php
include('db.php');
session_start();
$id = $_GET["id"];


startConnection();
//hier verwijdere we de item met het opgegeven id
$query = "DELETE FROM bericht WHERE id = '$id'";
executeInsertQuery($query);

header('location: dashboard.php');

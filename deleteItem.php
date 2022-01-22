<?php
include('db.php');
session_start();
$id = $_GET["id"];


$db = db_connect();
//hier verwijdere we de item met het opgegeven id
$sql = "DELETE FROM berichten WHERE id = :id";
$stmt = $query = $db->prepare($sql);

$stmt->bindParam(':id', $id);
$query->execute();

header('location: dashboard.php');

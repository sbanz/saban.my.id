<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$favorit = find("favorit", $_GET['id']);
$result = delete("favorit", $_GET['id']);

flash("favorit berhasil dihapus!", "success");
header("Location: ./index.php");

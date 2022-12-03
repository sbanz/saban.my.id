<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$book = find("klub", $_GET['id']);
$result = delete("klub", $_GET['id']);

flash("{$book['judul']} berhasil dihapus!", "success");
header("Location: ./index.php");

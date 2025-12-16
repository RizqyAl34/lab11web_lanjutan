<?php
$db = new Database();
$id = $_GET['id'];

$db->delete('artikel', "id=$id");
header('Location: ../artikel/index');
exit;

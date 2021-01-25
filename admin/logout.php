<?php
include 'common/header.php';
session_destroy();
header('Location: ../index.php');
?>
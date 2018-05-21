<?php
require_once 'includes/Database/database.php'; 
session_start();
session_unset(); // of session_destroy?
    header('Location: index.php');
    exit;
?>
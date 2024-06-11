<?php
session_start();

if (!isset($_SESSION['Id'])) {
    header('Location: ../admin/iniciar-sesion.html');
    exit;
}
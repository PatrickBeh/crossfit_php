<?php
    global $pdo;

    $pdo = new PDO('mysql:host=localhost;dbname=crossfit', 'crossfit', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
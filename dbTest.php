<?php

$pdo = new PDO('sqlite:tcg.db');

$statement = $pdo->query("SELECT * FROM users");
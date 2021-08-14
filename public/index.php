<?php

session_start();

if (!isset($_SESSION['csrf']) || (isset($_SESSION['csrf-expire']) && time() > $_SESSION['csrf-expire'])) {
    $_SESSION['csrf'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32);
    $_SESSION['csrf-expire'] = time() + 3600;
}

require __DIR__.'/../vendor/autoload.php';

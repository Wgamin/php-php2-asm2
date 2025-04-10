<?php


session_start();
// Đây là file chạy chính (Là nơi chúng require các file)
require_once "./env.php";    // Chứa các biến môi trường

require_once "./vendor/autoload.php";

require_once "./routes/router.php";

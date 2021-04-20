<?php
require_once __DIR__ . '/vendor/autoload.php';

setcookie('X-PZN-SESSION', 'LOGOUT');

header('Location: /login.php');
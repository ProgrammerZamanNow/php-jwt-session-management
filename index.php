<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/session.php';

try {
    $session = SessionManager::getCurrentSession();
} catch (Exception $exception) {
    header('Location: /login.php');
    exit(0);
}

?>

<html>
<head>

</head>
<body>
<h1>Hello <?= $session->username ?></h1>
</body>
</html>

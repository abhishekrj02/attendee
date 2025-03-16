<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Configure Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false, // Set to '/path/to/cache' for production
]);

// Make Twig globally available
return $twig;
?>



<!-- hello redit ok. -->

<?php

// ======================== test twig ======================

require_once dirname(dirname(__FILE__)) . '/Twig/Autoloader.php'; 
Twig_Autoloader::register();  

$loader = new Twig_Loader_filesystem(dirname(__FILE__));
$twig = new Twig_Environment($loader, array('cache' => dirname(__FILE__).'/compilation_cache', ));
$template = $twig->loadTemplate('index.html');
$template->display(array('name' => 'Fabien222'));

// ==========================


?>
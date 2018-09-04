<?php session_start() ?>

<?php

require_once ('controllers/Router.php');


$router = new Routeur();
$router->RouteRequest();
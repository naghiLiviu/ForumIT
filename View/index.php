<?php
include '../Utils/autoload.php';
include '../Utils/View/Common.html';
include 'header.php';

$controller = new $_GET['Controller'];
$viewModel = $controller->$_GET['Action']();

$viewModel->render();
//in functie de parametri din link new IndexController(); $view = IndexController->indexAction(); $view->render();


include 'footer.php';

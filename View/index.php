<?php
include '../Utils/autoload.php';
use Model\Role as Role;

include '../Utils/View/Common.html';
include 'header.php';
$viewFactory = new Model\ViewFactory();
$viewModel = $viewFactory->create('indexTemplate.php');
var_dump($viewModel);
$viewModel->render();
//in functie de parametri din link new IndexController(); $view = IndexController->indexAction(); $view->render();


include 'footer.php';

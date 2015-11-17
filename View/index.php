<?php
include '../Utils/autoload.php';
include '../Utils/View/Common.html';
include 'header.php';
function getPage($string)
{
    $explode = explode('/', $string);
    return $explode[count($explode)-1];
}
$route = getPage($_SERVER['PHP_SELF']);
$route = explode('.', $route);
$route = array_shift($route);

$controller = new Controller\Index();
$viewModel = $controller->indexAction();

$viewModel->render();
//in functie de parametri din link new IndexController(); $view = IndexController->indexAction(); $view->render();


include 'footer.php';

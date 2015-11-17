<?php
include '../Utils/autoload.php';
include '../Utils/View/Common.html';
include 'header.php';
function getPage($string)
{
    $explode = explode('/', $string);
    return $explode[count($explode)-1];
}
if (getPage($_SERVER['PHP_SELF']) == 'index.php'){
    $viewName = 'indexTemplate.php';
} else {
    $viewName = getPage($_SERVER['PHP_SELF']);
}
$viewFactory = new Model\ViewFactory();
$viewModel = $viewFactory->create($viewName);
$viewModel->render();
//in functie de parametri din link new IndexController(); $view = IndexController->indexAction(); $view->render();


include 'footer.php';

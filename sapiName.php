<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/12/15
 * Time: 1:16 PM
 */
$array = array(
    'firstname' => 'Slobodan',
    'lastname' => 'Nedeljkovic',
    'ocupation' => 'php'
);
if (preg_match('/Opera/', $_SERVER['HTTP_USER_AGENT']) || preg_match('/Mozilla/', $_SERVER['HTTP_USER_AGENT'])) {
    print_r($array);
} else {
    echo json_encode($array);
}
<div style="background-color: #787878">
<?php
    $first = array(
        'pink',
        'fucsia',
        'calico',
        'magenta'
    );

    $second = array(
        'blueish',
        'greenish',
        'irish',
        'fucsia',
    );

    $third = array(
        'unu',
        'doi',
        'trei',
        'patru',
        'cinci'
    );

    $fourth = array(
        'unu'   => 'one',
        'doi'   => 'two',
        'trei'  => 'three',
        'patru' => 'four',
        'cinci' => 'five',
        'sase'  => 'six'
    );

    $fifth = array(
    );

    $string = "/View/index.php";

    echo "<b><u><i>The arrays used above</i></u></b>";
    var_dump($first, $second, $third, $fourth);

    class MyClass {
        const CONST_VALUE = 'A constant value';
    }

    $classname = 'MyClass';
    //echo $classname::CONST_VALUE;
    //echo MyClass::CONST_VALUE;

    echo "<hr><hr><b>static</b> <br>";
    class OtherClass extends MyClass
    {
        public static $my_static = 'static var';

        public static function doubleColon() {
            echo parent::CONST_VALUE . "\n<br>";
            echo self::$my_static . "\n";
        }
    }

    $classname = 'OtherClass';
    echo $classname::doubleColon() . "<br>"; // As of PHP 5.3.0

    OtherClass::doubleColon();


    echo "<hr><br><b>continue</b> <br>";
    for ($i = 0; $i < 10; ++$i) {
        if ($i == 5) {
            continue 1;
            }
            print "$i\n";
    }
    echo "<i><hr>Functie getPage from string<hr></i>";

    function getPage($string)
    {
        $explode = explode('/', $string);
        return $explode[count($explode)-1];
    }
    var_dump(getPage($string));


    echo "<b><hr><hr><br>array functions<br><hr></b>";
    echo "<i><br>array_diff<br><hr></i>";



    var_dump(array_diff($first, $second));

    echo "<i><hr>array_chunk<hr></i>";

    var_dump(array_chunk($second, 2));

    echo "<i><hr>array_combine<hr></i>";

    var_dump(array_combine($second, $first));

    echo "<i><hr>array_count_values<hr></i>";

    var_dump(array_count_values($second));
    var_dump(array_count_values($third));

    echo "<i><hr>array_diff_asoc<hr></i>";

    var_dump(array_diff_assoc($first, $fourth));

    echo "<i><hr>array_fill<hr></i>";

    var_dump(array_fill(3, 2, $first));

    echo "<i><hr>array_flip<hr></i>";

    var_dump(array_flip($fourth));

    echo "<i><hr>array_intersect<hr></i>";

    var_dump(array_intersect($first, $second));

    echo "<i><hr>array_merge<hr></i>";

    var_dump(array_merge($first, $fourth));

    echo "<i><hr>array_pad<hr></i>";

    var_dump(array_pad($first, 5, 'test'));


?>
</div>

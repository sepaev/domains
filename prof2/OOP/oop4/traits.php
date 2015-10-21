<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 18.08.15
 * Time: 20:33
 */
trait Foo{
    function first(){
        echo"putin ";
    }
    function second(){
        echo "syr";
    }
}
trait Baz
{
    function second()
    {
        echo "hamlo ";
    }
}
class Bar   {
    use Foo, Baz{
    Foo::second insteadof Baz; // вызов вункции second из Foo вместо Baz
    Baz::second as hamlo
    }

//    function second() {
//        echo "lalala";
//    }
}

$obj = new Bar();
$obj->first();
$obj->second();

$obj->hamlo()
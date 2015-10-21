<pre>
<?php

/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 18.08.15
 * Time: 19:06
 */
abstract class People{
    abstract function eat();
}

class Girl extends People{
    public function eat ()
    {
        echo "Чвак-чвак";
    }
}
$obj = new Girl();
var_dump($obj);
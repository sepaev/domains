<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 18.08.15
 * Time: 20:47
 */
namespace First {

    use \First\Second\Bar as lalala;


    class Bar
    {
        public $a = 1;
        public function putin() {
//            $obj = new \First\Second\Bar();
            $obj = new lalala();
            echo "putin ";
            $obj->hamlo();
        }
    }

}

namespace First\Second {
    class Bar
    {
        public $a = 2;

        public function hamlo(){
            echo "hamlo";
        }
    }
}
namespace {
    $obj = new First\Bar();
    $obj->putin();

}
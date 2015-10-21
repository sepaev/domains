<?php

class People
{
    function say($words)
    {
        echo $words."<br>";
        echo 'Путин хамло';
    }

    protected function see()
    {
        echo "я тебя вижу<br>";
    }

    function eat()
    {
        $this->say('чвак-чвак<br>');
    }
}

class Girl extends People
{
    function say($words){
        echo $words."<br>";
    }

    private function peelPotatoes()
    {
        echo "я чищу картошку...";
    }
    function cooking(){
        echo "начинаю готовить";
        $this->peelPotatoes();
        echo "заканчиваю гоотовить";
    }
    function openEyes(){
        echo "я открываю левый глаз<br>";
        echo "я открываю правый глаз<br>";
        $this->see();
    }

}

$obj = new Girl();
$obj->openEyes();
$obj->see();
?>
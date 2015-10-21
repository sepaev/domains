<?php

/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 15.09.15
 * Time: 19:05
 */
class Karpaty
{
    public function bookTickets($place, $timeStart, $timeEnd)
    {
        echo "buy tickets in $place<br>";
    }

    public function retnEquipment($type)
    {
        echo "rent a $type <br>";
    }

    public function bookHotel($star)
    {
        echo "Booking hotel with $star stars<br>";
    }

    public function baySkiPass($count)
    {
        echo "my skies<br>";
    }

    public function other()
    {
        echo  "other<br>";
    }

    public function goToKarpaty($place,$timeStart, $timeEnd,$type,$star,$count)
    {
        $this->bookHotel($star);
        $this->bookTickets($place, $timeStart, $timeEnd);
        $this->baySkiPass($count);
        $this->retnEquipment($type);
        $this->other();
    }
}

$obj = new Karpaty();
$obj->goToKarpaty("bukovel",1234, 3122, "ski",5,10);

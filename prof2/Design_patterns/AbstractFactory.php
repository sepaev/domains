<?php

abstract class AbstractTechFactory {
    abstract function makeLapTop();
    abstract function makePhone();
    abstract function makeSmartWatch();
}




class AppleTechFactory extends AbstractTechFactory {
    private $context = "Apple";
    function makeLapTop() {
        return new AppleLapTop;
    }
    function makePhone() {
        return new ApplePhone;
    }
    function makeSmartWatch() {
        return new AppleSmartWatch;
    }
}


class LGTechFactory extends AbstractTechFactory {
    private $context = "LG";
    function makeLapTop() {
        return new LGLapTop;
    }
    function makePhone() {
        return new LGPhone;
    }
    function makeSmartWatch() {
        return new LGSmartWatch;
    }
}




class SamsungTechFactory extends AbstractTechFactory {
    private $context = "Samsung";
    function makeLapTop() {
        return new SamsungLapTop;
    }
    function makePhone() {
        return new SamsungPhone;
    }
    function makeSmartWatch() {
        return new SamsungSmartWatch;
    }
}




abstract class AbstractProduct {
    abstract function getPrice();
    private $price;
}




abstract class AbstractPhone extends AbstractProduct {
    private $subject = "Phone";
}

abstract class AbstractSmartWatch extends AbstractProduct {
    private $subject = "SmartWatch";
}


class ApplePhone extends AbstractPhone {
    private $price;
    function __construct() {
        $this->price = '800$';
    }
    function getPrice() {
        return $this->price;
    }
}

class LGPhone extends AbstractPhone {
    private $price;
    function __construct() {
        $this->price = '150$';
    }
    function getPrice() {
        return $this->price;
    }
}


class SamsungPhone extends AbstractPhone {
    private $price;
    function __construct() {
        $this->price = '100$';
    }
    function getPrice() {
        return $this->price;
    }
}




abstract class AbstractLapTop extends AbstractProduct{
    private $subject = "LapTop";
}




class AppleLapTop extends AbstractLapTop {
    private $price;

    function __construct()
    {
        static $s;
        if (1 == $s) {
            $this->price = '1000$';
            $s = 2;
        }
        else {
            $this->price = '1200$';
            $s = 1;
        }
    }

    function getPrice() {
        return $this->price;
    }
}

class LGLapTop extends AbstractLapTop {
    private $price;

    function __construct()
    {
        static $s;
        if (1 == $s) {
            $this->price = '900$';
            $s = 2;
        }
        else {
            $this->price = '600$';
            $s = 1;
        }
    }

    function getPrice() {
        return $this->price;
    }
}




class SamsungLapTop extends AbstractLapTop {
    private $price;
    function __construct() {
        $rand_num = rand(0,1);

        if (1 > $rand_num) {
            $this->price = '800$';
        }
        else {
            $this->price = '850$';
        }
    }
    function getPrice() {
        return $this->price;
    }
}

class SamsungSmartWatch extends AbstractSmartWatch {
    private $price;
    function __construct() {
        $this->price = '10$';
    }
    function getPrice() {
        return $this->price;
    }
}
class AppleSmartWatch extends AbstractSmartWatch {
    private $price;
    function __construct() {
        $this->price = '200$';
    }
    function getPrice() {
        return $this->price;
    }
}

class LGSmartWatch extends AbstractSmartWatch {
    private $price;
    function __construct() {
        $this->price = '20$';
    }
    function getPrice() {
        return $this->price;
    }
}
echo '�������� ����������� ������� ����������� �������<br><br>';

echo '��������� ������ ���������� ������� Apple<br>';
$factoryInstance = new AppleTechFactory;

testConcreteFactory($factoryInstance);

echo '��������� ������ ���������� ������� Samsung<br>';
$factoryInstance = new SamsungTechFactory;
testConcreteFactory($factoryInstance);

echo '��������� ������ ���������� ������� LG<br>';
$factoryInstance = new LGTechFactory;
testConcreteFactory($factoryInstance);
echo "����� ���������<br>";

function testConcreteFactory(AbstractTechFactory $factoryInstance)
{

    $lapTop = $factoryInstance->makeLapTop();
    echo '���� ������� ��������: '.$lapTop->getPrice()."<br>";

    $lapTop = $factoryInstance->makeLapTop();
    echo '���� ������� ��������: '.$lapTop->getPrice()."<br>";

    $phone = $factoryInstance->makePhone();
    echo '���� ��������: '.$phone->getPrice()."<br>";

    $SmartWatch = $factoryInstance->makeSmartWatch();
    echo '���� SmartWatch: '.$SmartWatch->getPrice()."<br><br>";

}

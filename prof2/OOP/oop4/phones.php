<?php

/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 18.08.15
 * Time: 19:25
 */
interface IPhones
{
    public function call($phoneNumber);

    public function takeCall();

    public function sendSMS($phoneNumber, $meccage);

    public function chargin();
}

interface ICamera
{
    public function takePhoto()
    public function takeVideo()
    public function panorama()

}

interface ISmart extends IPhones, ICamera{
    public function serfInternet();

}

class ApplePhone implements ISmart
{

    public function call($phoneNumber)
    {
        // TODO: Implement call() method.
    }

    public function takeCall()
    {
        // TODO: Implement takeCall() method.
    }

    public function sendSMS($phoneNumber, $meccage)
    {
        // TODO: Implement sendSMS() method.
    }

    public function chargin()
    {
        // TODO: Implement chargin() method.
    }

    public function takePhoto(){
        // TODO: Implement chargin() method.
    }
    public function takeVideo(){
        // TODO: Implement chargin() method.
    }
    public function panorama()
    {
        // TODO: Implement serfInternet() method.
    }
    public function serfInternet()
    {
        // TODO: Implement chargin() method.
    }
}

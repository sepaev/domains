<?php

class Foo
{
    public static function first()
    {
        echo "first in Foo";
    }

    public static function second()
    {
    static::first();
    }
}

class Bar extends Foo
{
    public static function first()
    {
        echo "first in Bar";
        parent::first();
    }
}

Bar::second();
//Bar::first();
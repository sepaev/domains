<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 29.09.15
 * Time: 19:29
 */

$cache = new Memcache();

$cache ->connect("localhost", 11211, 1);


$cache ->set("putin","hamlo");

echo $cache->get("putin")."<br>";
$cache->set("putin1","durak");
echo "putin1".$cache->get("putin1")."<br>";
$a=2;
$a=$a++ + ++$a - $a--;
echo$a;

$cache->delete("putin1");
//file_get_contents()
$res = $cache->get("putin1");
echo  "putin1".$res ."<br>";


//$cache->add("putin2","hamlokhflsdfsds", MEMCACHE_COMPRESSED, 10);
echo $cache->get("putin2");

$cache ->add("views", 1);
$cache->increment("views");
echo $cache->get("views");
//$cache->delete("views");
echo "<pre>";
//$cache->flush();
var_dump($cache->getstats());
$cache->close();

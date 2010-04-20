--TEST--
Test for bug #565: xdebug.show_local_vars setting does not work with php 5.3.
--INI--
xdebug.default_enable=1
xdebug.collect_params=1
xdebug.show_local_vars=1
--FILE--
<?php
function func(){
	$a="hoge";
	throw new Exception();
}

func();
?>
--EXPECTF--
Fatal error: Uncaught exception 'Exception' in %sbug00565.php on line 4

Exception:  in %sbug00565.php on line 4

Call Stack:
    0.0010     666392   1. {main}() %sbug00565.php:0
    0.0010     666392   2. func() %sbug00565.php:7


Variables in local scope (#2):
  $a = 'hoge'

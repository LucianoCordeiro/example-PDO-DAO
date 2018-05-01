<?php

require_once("config.php");

$list = User::login("lcesar", "tartse");
echo $list;
?>

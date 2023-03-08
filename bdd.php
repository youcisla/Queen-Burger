<?php




$c = mysqli_connect("localhost", "username", "password", "QueenBurger");
mysqli_set_charset($c, "utf8");

if ($c->connect_error) {
    die("Connection failed: " . $c->connect_error);
}

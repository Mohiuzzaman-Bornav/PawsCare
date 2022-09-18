<?php

session_start();
session_unset();
session_destroy();
header("location:/PawsCare/index.php");





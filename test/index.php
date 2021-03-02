<?php

define('LOG_FOLDER', "../");

include "../src/class.log.php";


//Add Lines
LOG::add("Test Line");
LOG::add("Test User Line", 524);
LOG::add("Other User Line", 524);
LOG::add("Order Test Line", 'WEB581657816', 'order');


echo 'Completed';
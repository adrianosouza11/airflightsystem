<?php

foreach (glob("entities/*.php") as $filename)
{
    include $filename;
}

include ("util/Util.php");
include ("main/index.php");




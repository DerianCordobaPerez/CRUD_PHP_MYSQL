<?php

function redirect(): never
{
    sleep(1);
    header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/");
    exit;
}

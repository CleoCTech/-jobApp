<?php

require_once 'baseClass.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    /** DO YOUR FORM VALIDATION HERE */
   // var_dump("yes found here");
    $api = new API();

    /** Here you need to post all your variables , but you can make it much more beautiful*/
    
    $api->store();
}
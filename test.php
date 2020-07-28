<?php
 

 require_once 'DBClass.php';
 require_once 'baseClass.php';

 $db =new DB;

 $obj = new API;

 $last_id =$obj->getlastId();


echo json_encode($last_id);

 //echo $last_id;
// $tables = "CREATE TABLE parcel_info(
//     parcel_id int not null AUTO_INCREMENT,
//     sender_name varchar(100) not null,
//     sender_id varchar(15) not null,
//     parcel_origin varchar(50) not null,
//     parcel_description varchar(255) not null,
//     sender_mobile varchar(15) not null,
//     recipient_name varchar(100) not null,
//     recipient_id varchar(15) not null,
//     recipient_mobile varchar(15) not null,
//     destination varchar(50) not null,
//     cost_of_delivery double not null,
//     mpesa_code varchar(20) default null,
//     is_collected int default 0,
//     is_payed_for int default 0
//     PRIMARY KEY(parcel_id),
// )";

// $table .= "";
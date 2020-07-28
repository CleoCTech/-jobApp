<?php

public function insert_db($tbl_name){
    require("db.php");
    $fields = '';
    $values = '';

    foreach ($_POST as $key=>$value ) {
      if($fields != ''){
        $fields = $fields.', '.$key.'';
        $values = $values.", '".addslashes($value)."'";
      }else{
        $fields = $fields."".$key."";
        $values = $values."'".addslashes($value)."'";
      }
    }

    $statment  = "INSERT INTO $tbl_name($fields) VALUES ($values)";
  /*  echo $statment;
*/
  if($query=$con->query($statment)){
    return true;
  }else{
    //for debugging purposes
    echo $statment;
  }
}
insert_db("personal_info");
<?php

require_once '../DBClass.php';

$db = new DB;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  //$del_id= $_POST['delete_id'];  
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL|E_STRICT);
  try {
        if( isset( $_POST['delete_id'] ) && is_numeric( $_POST['delete_id'] ) && $_POST['delete_id'] > 0 )
        {
            $del_id = $_POST['delete_id'];
           // $file_pointer = "test.txt";  
           $con = $db->con;
           $con->beginTransaction();
            
            $file_pointer_name =$con->prepare("SELECT `book_file` FROM `applications` WHERE `application_id`=:application_id ");
            $file_pointer_name->execute([
                ":application_id" =>  $del_id
            ]);
         //   var_dump($db);
            $file_pointer = $file_pointer_name->fetchColumn();
           //var_dump($file_pointer);
            
            $stmt = $con->prepare("DELETE FROM `applications` WHERE `application_id` =:id");
            $stmt->execute([':id' => $del_id]);
            $stmt = $con->prepare( "DELETE FROM `education_details` WHERE `application_id` =:id" );
            $stmt->execute([':id' => $del_id]);
            $stmt =$con->prepare( "DELETE FROM `interests` WHERE `application_id` =:id" );
            $stmt->execute([':id' => $del_id]);
            $stmt =$con->prepare( "DELETE FROM `personal_info` WHERE `application_id` =:id" );
            $stmt->execute([':id' => $del_id]);
            $stmt = $con->prepare( "DELETE FROM `referees` WHERE `application_id` =:id" );
            $stmt->execute([':id' => $del_id]);

            //delete resume pdf file of this application 
            if (!unlink($file_pointer)) {  
                echo ("$file_pointer cannot be deleted due to an error");  
            }  
            else {  
               // echo ("$file_pointer has been deleted");  
            } 
            
            $con->commit();
            
            if( ! $stmt->rowCount() ) echo "Deletion failed";
            header("Location:applications.php"); 
            exit();
            }
           
        else
        {
            echo "ID must be a positive integer";
        }
  } catch (PDOException $e) {
    return  $e->getMessage();
  }
    

//   if( isset($_POST['delete']) )
//   {
//       if( isset( $_POST['id'] ) && is_numeric( $_POST['id'] ) && $_POST['id'] > 0 )
//       {
//           $id = $_POST['id'];
//           $stmt = $dbh->prepare( "DELETE FROM news WHERE id =:id" );
//           $stmt->bindParam(':id', $id);
//           $stmt->execute();
//           if( ! $stmt->rowCount() ) echo "Deletion failed";
//       }
//       else
//       {
//           echo "ID must be a positive integer";
//       }
//   }
}
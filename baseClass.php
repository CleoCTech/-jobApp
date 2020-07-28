<?php

//we call this class so that we can be able to be connected to the database

require_once 'DBClass.php';

class API extends DB 
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function getApplications(){
        try {
            $applications = $this->con->prepare("SELECT A.`application_id`, P.`fullname`, P.`ID_No`, P.`phone`, A.`created_at`
            FROM applications AS A INNER JOIN `personal_info` AS P ON 
            A.`application_id`=P.`application_id`;");

            $applications ->execute();
           $applications_ = $applications->fetchAll();
           return $applications_;   
        } catch (PDOException $e) {
            return  $e->getMessage();
        }
    }
    public function getlastId(){
      //  $db =new DB;
      // $last_row=1;
        try {
            // $last_row = $this->con->prepare("SELECT `application_id` FROM applications  ORDER BY application_id DESC LIMIT 1");
            $last_row = $this->con->prepare("SELECT `application_id` FROM `applications` WHERE `status`=:statusx ");
            $last_row->execute([
                ":statusx" => "Incomplete"
            ]);
         //   var_dump($db);
            $lastrow_data = $last_row->fetchColumn();

            if ($lastrow_data == null) {
               try {
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL|E_STRICT);

                    $current_date = date("Y-m-d");
                    $save_application = $this->con->prepare("INSERT INTO applications(
                        created_at,
                        updated_at) 
                        VALUES(
                            :created_at,
                            :updated_at)"
                        );
                    $save_application->execute(
                        [
                           ":created_at" => $current_date,
                           ":updated_at" => $current_date
                       ]);

                       $last_row = $this->con->prepare("SELECT `application_id` FROM `applications` WHERE `status`=:statusx ");
                       $last_row->execute([
                           ":statusx" => "Incomplete"
                       ]);
                    //   var_dump($db);
                       $lastrow_data = $last_row->fetchColumn();
                       return $lastrow_data;
               } catch (PDOException $e) {
                    return $e->getMessage();
               }
            }else{
                return $lastrow_data;
            }
            // if(empty(array_filter($lastrow_data))){
            //     return ['code' => 0, 'message' => 'Nothing Found'];
            // }

       //     $id= $lastrow_data[0];
            // return $lastrow_data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
       // return $last_row;
    }
    public function store(){

        $para = $_POST['stage'];
        //var_dump($para);
        switch ($para) {
            case '1':

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
                try {
                   // var_dump("Start point");
                    $save_personal_info = $this->con->prepare("INSERT INTO personal_info(
                        fullname, 
                        email, 
                        phone, 
                        ID_No, 
                        gender, 
                        application_id,
                        created_at,
                        updated_at) 
                        VALUES(
                            :fullname, 
                            :email, 
                            :phone, 
                            :ID_No,  
                            :gender, 
                            :application_id,
                            :created_at,
                            :updated_at)"
                        );
                    $save_personal_info->execute(
                        [
                           ":fullname" => $_POST['name'], 
                           ":email" => $_POST['email'],
                           ":phone" => $_POST['phone'], 
                           ":ID_No" =>$_POST['ID_No'], 
                           ":gender" =>$_POST['gender'], 
                           ":application_id" => $_POST['lastid'],
                           ":created_at" => $_POST['created_at'],
                           ":updated_at" => $_POST['updated_at']
                       ]);

                    if ( $this->con->lastInsertId() !== null ) {
                        header("Location: pages/education.php"); 
                        exit();
                      // var_dump("success"); 
                    // return $this->con->lastInsertId();
                    }else{
                        // var_dump("Oops!");
                        return ['code' => 0];
                    }

                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                    return ['code' => 0, 'message' => $e->getMessage()];
                } 
              
                break;
            case '2':

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
                try {
                   // var_dump("Start point");
                    $save_education_info = $this->con->prepare("INSERT INTO education_details(
                        highschool_grade, 
                        highschool_points, 
                        college_qualification, 
                        college_course, 
                        year_of_graduation, 
                        college_points,
                        application_id,
                        created_at,
                        updated_at) 
                        VALUES(
                            :highschool_grade, 
                            :highschool_points, 
                            :college_qualification, 
                            :college_course,  
                            :year_of_graduation, 
                            :college_points, 
                            :application_id,
                            :created_at,
                            :updated_at)"
                        );
                    $save_education_info->execute(
                        [
                           ":highschool_grade" => $_POST['Hgrade'], 
                           ":highschool_points" => $_POST['Hpoints'],
                           ":college_qualification" => $_POST['HLevel'], 
                           ":college_course" =>$_POST['course'], 
                           ":year_of_graduation" =>$_POST['year'], 
                           ":college_points" =>$_POST['Lpoints'], 
                           ":application_id" => $_POST['lastid'],
                           ":created_at" => $_POST['created_at'],
                           ":updated_at" => $_POST['updated_at']
                       ]);

                    if ( $this->con->lastInsertId() !== null ) {
                        header("Location: pages/work-experience.php"); 
                        exit();
                      // var_dump("success"); 
                    // return $this->con->lastInsertId();
                    }else{
                        // var_dump("Oops!");
                        return ['code' => 0];
                    }

                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                    return ['code' => 0, 'message' => $e->getMessage()];
                } 
              
                break;
            case '3':

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
                try {
                   // var_dump("Start point");
                    $save_work_info = $this->con->prepare("INSERT INTO work_experience(
                        job_title, 
                        work_place, 
                        w_address, 
                        roles, 
                        application_id,
                        created_at,
                        updated_at) 
                        VALUES(
                            :job_title, 
                            :work_place, 
                            :w_address, 
                            :roles,   
                            :application_id,
                            :created_at,
                            :updated_at)"
                        );
                    $save_work_info->execute(
                        [
                           ":job_title" => $_POST['job_title'], 
                           ":work_place" => $_POST['work_place'],
                           ":w_address" => $_POST['address'], 
                           ":roles" =>$_POST['job_roles'], 
                           ":application_id" => $_POST['lastid'],
                           ":created_at" => $_POST['created_at'],
                           ":updated_at" => $_POST['updated_at']
                       ]);

                    if ( $this->con->lastInsertId() !== null ) {
                        header("Location: pages/areas-of-interests.php"); 
                        exit();
                      // var_dump("success"); 
                    // return $this->con->lastInsertId();
                    }else{
                        // var_dump("Oops!");
                        return ['code' => 0];
                    }

                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                    return ['code' => 0, 'message' => $e->getMessage()];
                } 
              
                break;
            case '4':

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
                try {
                   // var_dump("Start point");
                    $save_intrests_info = $this->con->prepare("INSERT INTO interests(
                        title, 
                        company_name, 
                        a_address, 
                        roles, 
                        application_id,
                        created_at,
                        updated_at) 
                        VALUES(
                            :job_title, 
                            :work_place, 
                            :w_address, 
                            :roles,   
                            :application_id,
                            :created_at,
                            :updated_at)"
                        );
                    $save_intrests_info->execute(
                        [
                           ":job_title" => $_POST['title'], 
                           ":work_place" => $_POST['company'],
                           ":w_address" => $_POST['a_address'], 
                           ":roles" =>$_POST['job_roles'], 
                           ":application_id" => $_POST['lastid'],
                           ":created_at" => $_POST['created_at'],
                           ":updated_at" => $_POST['updated_at']
                       ]);

                    if ( $this->con->lastInsertId() !== null ) {
                        header("Location: pages/referees.php"); 
                        exit();
                      // var_dump("success"); 
                    // return $this->con->lastInsertId();
                    }else{
                        // var_dump("Oops!");
                        return ['code' => 0];
                    }

                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                    return ['code' => 0, 'message' => $e->getMessage()];
                } 
              
                break;
            case '5':

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
                try {
                  // var_dump("Start point");
                    $save_ref_info = $this->con->prepare("INSERT INTO referees(
                        fullname, 
                        company_name, 
                        position,
                        r_address, 
                        phone, 
                        application_id,
                        created_at,
                        updated_at) 
                        VALUES(
                            :fullname, 
                            :company_name,
                            :position, 
                            :r_address, 
                            :phone,   
                            :application_id,
                            :created_at,
                            :updated_at)"
                        );
                    $save_ref_info->execute(
                        [
                           ":fullname" => $_POST['name'], 
                           ":company_name" => $_POST['company'],
                           ":position" => $_POST['position'],
                           ":r_address" => $_POST['address'], 
                           ":phone" =>$_POST['phone'], 
                           ":application_id" => $_POST['lastid'],
                           ":created_at" => $_POST['created_at'],
                           ":updated_at" => $_POST['updated_at']
                       ]);

                    if ( $this->con->lastInsertId() !== null ) {
                        header("Location: pages/resume.php"); 
                        exit();
                      // var_dump("success"); 
                    // return $this->con->lastInsertId();
                    }else{
                        // var_dump("Oops!");
                        return ['code' => 0];
                    }

                } catch (PDOException $e) {
                    //var_dump($e->getMessage());
                    return ['code' => 0, 'message' => $e->getMessage()];
                } 
              
                break;
            case '6':

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
                $folder_path = 'resume_files/';

                $filename = basename($_FILES['book_file']['name']);
                $newname = $folder_path . $filename;

                $FileType = pathinfo($newname,PATHINFO_EXTENSION);
                
                if ($FileType == "pdf") {

                    if (move_uploaded_file($_FILES['book_file']['tmp_name'], $newname)) {
                        $upload_resume_file = $this->con->prepare("UPDATE `applications` SET `updated_at`= :updated_at, `book_file`=:filenamex WHERE `application_id`=:application_id"
                            );
                        $upload_resume_file->execute(
                            [
                            ":updated_at" => $_POST['updated_at'],
                            ":filenamex" => $filename,
                            ":application_id" => $_POST['lastid']
                            
                            ]);

                            header("Location: pages/submit.php"); 
                    }
                } else {
                    header("Location: pages/resume.php");
                    die("Please Upload the book");
                   //exit();
                }
                
               
                break;
            case '7':

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
               try {
                $upload_resume_file = $this->con->prepare("UPDATE `applications` SET `updated_at`= :updated_at, `status`=:statusx WHERE `application_id`=:application_id"
                    );
                $upload_resume_file->execute(
                    [
                    ":updated_at" => $_POST['updated_at'],
                    ":statusx" => "Complete",
                    ":application_id" => $_POST['lastid']
                    
                    ]);
                    // C:\xampp\htdocs\Nariphon_Technologies\_jobApp\index.php
                    header("Location: index.php");
                    exit();
               } catch (PDOException $e) {
                
               }
                
                break;
            
            default:
                # code...
                break;
        }
        
    }
}
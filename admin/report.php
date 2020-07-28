<?php
        require_once '../DBClass.php';

        class viewR extends DB{

            public function __construct()
            {
                parent::__construct();
                // $view =new viewR();
                // $view->getAlldata();
                
            }
            public function getAlldata($id){


            
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL|E_STRICT);
                try {
                    $applications = $this->con->prepare("SELECT
                    `applications`.`application_id`
                    , `personal_info`.`fullname` AS C_Fullname
                    , `personal_info`.`ID_No`
                    , `personal_info`.`email` AS C_Email
                    , `personal_info`.`phone` AS C_Phone
                    , `personal_info`.`gender` AS C_Gender
                    , `applications`.`created_at`
                    , `applications`.`book_file`
                    , `education_details`.`highschool_grade`
                    , `education_details`.`highschool_points`
                    , `education_details`.`college_qualification`
                    , `education_details`.`college_course`
                    , `education_details`.`year_of_graduation`
                    , `education_details`.`college_points`
                    , `interests`.`title`
                    , `interests`.`company_name`
                    , `interests`.`a_address`
                    , `interests`.`roles`
                    , `work_experience`.`job_title`
                    , `work_experience`.`work_place`
                    , `work_experience`.`w_address`
                    , `work_experience`.`roles`
                    , `referees`.`fullname`
                    , `referees`.`company_name`
                    , `referees`.`position`
                    , `referees`.`r_address`
                    , `referees`.`phone`
                FROM
                    `jobapp`.`applications`
                    INNER JOIN `jobapp`.`education_details` 
                        ON (`applications`.`application_id` = `education_details`.`application_id`)
                    INNER JOIN `jobapp`.`interests` 
                        ON (`applications`.`application_id` = `interests`.`application_id`)
                    INNER JOIN `jobapp`.`personal_info` 
                        ON (`applications`.`application_id` = `personal_info`.`application_id`)
                    INNER JOIN `jobapp`.`referees` 
                        ON (`applications`.`application_id` = `referees`.`application_id`)
                    INNER JOIN `jobapp`.`work_experience` 
                        ON (`applications`.`application_id` = `work_experience`.`application_id`) WHERE	`applications`.`application_id`=:app_id;");
            
                    $applications ->execute([
                        ":app_id" => $id
                    ]);
                   $applications_ = $applications->fetchAll();
                   return $applications_; 
                  // echo $applications_; 
                } catch (PDOException $e) {
                    return  $e->getMessage();
                }
            }
           
           
        }
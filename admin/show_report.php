<!DOCTYPE html>
<?php

require_once 'report.php';
// include(dirname(__DIR__).'/inc/header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    /** DO YOUR FORM VALIDATION HERE */
   // var_dump("yes found here");
  
   $app_id =$_POST['app_id'];
  // var_dump($app_id);
    $viewR = new viewR();

    $application_data=$viewR->getAlldata($app_id);
  
   // var_dump($application_data);
}
?>


<body>
    <table class="table">
        <tbody>
            <?php 
              foreach ($application_data as $application_datax) {
                
                  echo"<tr>";
                    echo"<td colspan='2'>";
                    echo "Personal Details";
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo $application_datax['C_Fullname'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo $application_datax['ID_No'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo $application_datax['C_Phone'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo $application_datax['C_Email'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo $application_datax['C_Gender'];
                    echo"</td>";
                    echo "<hr>";
                  echo"</tr>";
                 

                  echo"<tr>";
                    echo"<td colspan='2' style='padding-top:1rem;'>";
                    echo "Educational  Background";
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo "Highschool Grade: " . $application_datax['highschool_grade'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo "Highschool Points: " . $application_datax['highschool_points'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo "Higher Education Level : " . $application_datax['college_qualification'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo "Course: " . $application_datax['college_course'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo "Year of Graduation: " . $application_datax['year_of_graduation'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo "Points: " . $application_datax['college_points'];
                    echo"</td>";
                  echo"</tr>";

                  echo"<tr>";
                    echo"<td colspan='2' style='padding-top:1rem;'>";
                    echo "Work Expereince";
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['job_title'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['work_place'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['w_address'];
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['roles'];
                    echo"</td>";
                  echo"</tr>";

                  echo"<tr>";
                    echo"<td colspan='2' style='padding-top:1rem;'>";
                    echo "Areas of Involvement";
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['title'];
                    echo"</td>";
                  echo"</tr>";  
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['company_name'];
                    echo"</td>";
                  echo"</tr>";  
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['a_address'];
                    echo"</td>";
                  echo"</tr>";  
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['roles'];
                    echo"</td>";
                  echo"</tr>";  

                  echo"<tr>";
                    echo"<td colspan='2' style='padding-top:1rem;'>";
                    echo "Refrees";
                    echo"</td>";
                  echo"</tr>";
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['fullname'];
                    echo"</td>";
                  echo"</tr>";  
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['company_name'];
                    echo"</td>";
                  echo"</tr>";  
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['position'];
                    echo"</td>";
                  echo"</tr>";  
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['r_address'];
                    echo"</td>";
                  echo"</tr>";  
                  echo"<tr>";
                    echo"<td style='padding-left: 1rem;'>";
                    echo  $application_datax['phone'];
                    echo"</td>";
                  echo"</tr>";  
                  
              }
            ?>
        </tbody>
    </table>
    <br>
    <button>Create PDF</button>

</body>

</html>
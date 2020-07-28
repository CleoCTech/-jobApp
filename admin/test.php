<html>
    <style>
    </style>

    <body>
        <?php

$v_company= array(
    'ABC'=>
        array('Kuching'=>array('Michael', 'Jenny'), 
             'Sibu'=>array('Sally', 'Muhammad', 'Mutu')
                ),
    'XYZ'=>array('Kuching'=>array('Lucy', 'Abdullah'), 
                'Sibu'=>array('John', 'Alicia')
    )
);





?>
        <table>

            <tr>
                <th>Company's Name</th>
                <th>Branch</th>
                <th>Staff's Name</th>
            </tr>
            <?php
$company = '';
$branch = '';
$staff = '';
foreach($v_company as $v_company_name=>$v_company_info){
    foreach($v_company_info as $v_branch=>$v_staffs){
        foreach($v_staffs as $v_staff){
              echo "<tr>";
                  echo "<td>";
                        if($company == '' || $company != $v_company_name){
                            $company = $v_company_name;
                            echo "$v_company_name <br>";
                        }

                  echo "</td>";
                  echo "<td>";
                        if($branch != $v_branch){
                            $branch = $v_branch;
                            echo "$v_branch <br>";
                        }

                  echo "</td>";
                  echo "<td>";
                      echo "$v_staff <br/>";
                  echo "</td>";
              echo "</tr>";  
         }
    }    
}
?>
        </table>
    </body>

</html>
<!DOCTYPE html>

<?php  
include(dirname(__DIR__).'/inc/header.php');

require_once '../baseClass.php';

$obj = new API;

$applications =$obj->getApplications();
//var_dump($applications);
?>
<style>
.table {
    /* margin-top: -35rem !important; */
}

.content-right {
    padding: 10px !important;
    display: block !important;
}
</style>

<body>
    <div id="app">
        <?php 
            include(dirname(__DIR__).'/inc/navbar.php');
        ?>
        <main class="py-4">
            <!-- @yield('content') -->
            <div class="container-fluid">
                <div class="row row-height">
                    <?php  include(dirname(__DIR__).'/inc/innerforms/content-left.php'); ?>
                    <!-- /content-left -->
                    <div class="col-xl-8 col-lg-8 content-right" id="start">

                        <!-- /top-wizard -->
                        <form action="show_report.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="holder" name="app_id" value="">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">ID No</th>
                                        <th scope="col">Phone No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                        
                            foreach ($applications as $application ) {
                               
                               echo "<tr>" ;
                                echo "<td style='display:none;'>";
                                 
                                 echo $application['application_id'];
                                // echo "<input type='' id='app_id' name='app_id' value='" . $application['application_id'] ."'>";
                                
                                echo "</td>" ;
                                echo "<td>" ;

                                    echo $application['fullname'];

                                echo "</td>" ;
                                echo "<td>" ;

                                    echo $application['ID_No'];

                                    echo "</td>" ;
                                echo "<td>" ;

                                    echo $application['phone'];

                                    echo "</td>" ;
                                echo "<td>" ;

                                    echo $application['created_at'];

                                    echo "</td>" ;
                                echo "<td>" ;

                                    // echo " <a class='btn btn-info text-white'>View</a>";
                                    // echo " <a class='btn btn-primary text-white'>Download CV</a>";
                                    // echo " <a class='btn btn-danger text-white'>Delete</a>";
                                    echo "<button type='submit' name='process' class='forward' id='view'>View</button>
                                        <button type='button' name='process' class='forward CV' id='st' data-id='" . $application['book_file'] ."'>Download
                                            CV</button>
                                        <button type='submit' name='process' class='btn btn-danger text-white'
                                            id='st'>Delete</button>";
                                    echo "</td>" ;
                                echo "</tr>" ;


                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!-- /Wizard container -->
                </div>
                <!-- /content-right-->
            </div>
            <!-- /row-->
    </div>

    <!-- <h1>Contents Here</h1> -->
    </main>
    </div>
    <?php  include(dirname(__DIR__).'/inc//footer.php'); ?>
</body>

</html>
<script>
$(document).ready(function() {
    $('.table tbody tr').click(function() {
        //  var details = '';
        var app_id = $(this).find('td:first-child').html();
        document.getElementById("holder").value = app_id;
    });
    $(".CV").on("click", function() {
        $targetID = $(this).attr('data-id');
        //console.log("Selected ID:" + $targetID);
        window.location.href = "../resume_files/" + $targetID;
        // REMOVE WILL COME HERE
    });
});
</script>
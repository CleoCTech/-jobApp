<!DOCTYPE html>

<?php  
include(dirname(__DIR__).'/inc/header.php');

 require_once '../baseClass.php';


$obj = new API;

$last_id =$obj->getlastId();

?>

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
                        <div id="wizard_container" class="wizard" novalidate="novalidate">
                            <div id="top-wizard">
                                <span id="location"></span>
                                <div id="progressbar" class="ui-progressbar ui-widget ui-widget-content ui-corner-all"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="ui-progressbar-value ui-widget-header ui-corner-left"
                                        style="display: none; width: 0%;"></div>
                                </div>
                            </div>
                            <!-- /top-wizard -->
                            <form id="wrapped" method="POST" enctype="multipart/form-data"
                                class="fl-form fl-style-1 wizard-form" novalidate="novalidate" action="../route.php">
                                <input id="website" name="website" type="text" value="">

                                <!-- Leave for security protection, read docs for details  -->
                                <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                                    <div class="step wizard-step mybox" data-state="branchtype">
                                        <h2 class="section_title">Education Background</h2>
                                        <h3 class="main_question">What is your level of qualification?</h3>
                                        <!-- {!! Form::hidden('unit',2) !!}
                                        {!! Form::hidden('lastid', $last_row->application_id) !!} -->
                                        <input type="hidden" name="stage" value="2">
                                        <input type="hidden" name="lastid" value="<?php echo $last_id; ?>">
                                        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d');?>" />
                                        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d');?>" />
                                        <div class="form-group">
                                            <label class="">High School

                                                <select name="Hgrade" class="form-control required grade"
                                                    id="gradeFormControlSelect1">
                                                    <option value="0" disabled="true" selected="true">Choose Grade
                                                    </option>
                                                    <option value="A">A</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B">B</option>
                                                    <option value="B-">B-</option>
                                                    <option value="C+">C+</option>
                                                    <option value="C">C</option>
                                                    <option value="C-">C-</option>
                                                </select>
                                                <br>
                                                <input type="text" name="Hpoints" id="h_points"
                                                    class="form-control required fl-input" placeholder="Points*">
                                                <span class="checkmark"></span>

                                            </label>

                                            <label class="">College/University
                                                <select name="HLevel" class="form-control required collGP"
                                                    id="college_gFormControlSelect1">
                                                    <option value="0" disabled="true" selected="true">Choose Level
                                                    </option>
                                                    <option value="PhD">PhD</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Degree">Degree</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="Certificate">Certificate</option>
                                                </select>
                                                <br>
                                                <input type="text" name="course" id="course"
                                                    class="form-control  required" placeholder="Course">
                                                <br>
                                                <input type="text" name="year" id="YOG"
                                                    class="form-control required fl-input"
                                                    placeholder="Year of graduation">
                                                <br>
                                                <input type="text" name="Lpoints" id="College_points"
                                                    class="form-control required fl-input" placeholder="Points*">
                                                <span class="checkmark"></span>

                                            </label>
                                            <button onclick="addOthers()" type="button" name="add" class="forward">Add
                                                Others+</button>
                                            <div id="myDIV" style="display: none;">
                                                <label class="" id="">Others
                                                    <input type="text" name="points" id="id"
                                                        style="width:400px !important;"
                                                        class="form-control required fl-input"
                                                        placeholder="Other Related Course Name">
                                                    <br>
                                                    <select class="form-control required collGP"
                                                        id="college_gFormControlSelect1">
                                                        <option value="0" disabled="true" selected="true">Choose Level
                                                        </option>
                                                        <option value="PhD">PhD</option>
                                                        <option value="Dr.">Dr.</option>
                                                        <option value="Degree">Degree</option>
                                                        <option value="Diploma">Diploma</option>
                                                        <option value="Certificate">Certificate</option>
                                                    </select>
                                                    <br>
                                                    <input type="text" name="points" id="id"
                                                        style="width:400px !important;"
                                                        class="form-control required fl-input"
                                                        placeholder="Year of graduation">

                                                    <br>
                                                    <input type="text" name="points" id="id"
                                                        style="width:400px !important;"
                                                        class="form-control required fl-input" placeholder="Points*">
                                                    <span class="checkmark"></span>

                                                </label>
                                            </div>
                                        </div>
                                        <small>* Start branch radio based </small>
                                    </div>
                                </div>
                                <!-- /middle-wizard -->

                                <div id="bottom-wizard">
                                    <button onclick="" type="button" name="backward" class="backward"
                                        id="bk">Prev</button>
                                    <!-- {{--  <button onclick="showNext()" type="button" name="forward" class="forward" id="nt">Next</button>    --}} -->
                                    <button type="submit" name="process" class="forward" id="st">Next</button>
                                </div>
                                <!-- /bottom-wizard -->
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
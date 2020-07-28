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
                                <div class="step wizard-step mybox" data-state="branchtype">
                                    <h2 class="section_title">Resume</h2>
                                    <!-- {!! Form::hidden('unit',6) !!}
                                    {!! Form::hidden('lastid', $last_row->application_id) !!} -->
                                    <input type="hidden" name="stage" value="6">
                                    <input type="hidden" name="lastid" value="<?php echo $last_id; ?>">
                                    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d');?>" />
                                    <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d');?>" />
                                    <div class="form-group">
                                        <label class="custom">
                                            <div class="form-group add_bottom_30 add_top_20">
                                                <label>Upload Resume<br><small>(Files accepted: .pdf(only) - Max file
                                                        size: 2MB limit)</small></label>
                                                <div class="fileupload">
                                                    <input type="file" name="book_file"
                                                        accept=".pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                                        class="required">
                                                </div>
                                            </div>
                                            <span class="checkmark"></span>

                                        </label>
                                        <br>
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
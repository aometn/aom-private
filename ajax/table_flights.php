<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Tables</a></li>
        <li class="active">Flights</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Flights table <small> - detailed text overview of your flights</small></h1>
    <!-- end page-header -->
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin table detail picker -->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-4 control-label">Custom Values</label>
                    <div class="col-md-8">
                        <input type="text" id="customValue_rangeSlider" name="default_rangeSlider" value="" />
                    </div>
                </div>
            </div>
            <!-- end table detail picker -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Flights table - overview</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                            <thead>
                            <tr>

                                <?php

                                include_once "../php/database.class.php";
                                $db = new Database();
                                $columns = $db->columns("main_table_etn");
                                $data = $db->select("main_table_etn", "*", "company_code='134'", "booking_date");

                                //print_r($data);

                                /*CREATE TABLE HEADER*/
                                foreach($columns as $key => $value){
                                   echo '<th>'.$value["Field"].'</th>';
                                }

                                /*TABLE BODY*/
                                echo '
                                    </tr>
                                    </thead>
                                    <tbody>
                                ';

                                /*TABLE CONTENT*/
                                foreach($data as $key => $value){
                                    echo '<tr class="odd gradeX">';
                                    foreach($columns as $key2 => $value2) {
                                        echo '<td>' . $value[$value2["Field"]] . '</td>';
                                    }
                                    echo '</tr>';
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    App.restartGlobalFunction();
    App.setPageTitle('Color Admin | Managed Tables - TableTools');

    $.getScript('assets/js/table-manage-tabletools.demo.min.js').done(function() {
        TableManageTableTools.init();
    });
</script>
<!-- ================== END PAGE LEVEL JS ================== -->
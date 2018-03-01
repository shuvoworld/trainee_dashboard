
<?php
include('connection.php');
mysqli_query ($conn, "set character_set_client='utf8'"); 
 mysqli_query ($conn, "set character_set_results='utf8'"); 

include('common.php');

$sql = "SELECT * FROM institution;";
$institutions = mysqli_query($conn, $sql);

$sql = "SELECT * FROM project_info;";
$projects = mysqli_query($conn, $sql);

$sql = "SELECT * FROM trade_info;";
$trades = mysqli_query($conn, $sql);

$sql = "SELECT count(*) as total_student FROM training_student_info;";
$result = mysqli_query($conn, $sql);
$data=mysqli_fetch_assoc($result);

$sql = "SELECT count(*) as total_training_center FROM training_center;";
$result = mysqli_query($conn, $sql);
$training_center=mysqli_fetch_assoc($result);

$sql = "SELECT count(*) as total_project_info FROM project_info;";
$result = mysqli_query($conn, $sql);
$project_info=mysqli_fetch_assoc($result);

$project_sql = "SELECT
    pr.project_name AS 'project',
  COUNT(*) as 'total'
FROM
    `training_student_info` AS s
LEFT JOIN training_center AS t ON s.tcid = t.tcid
RIGHT JOIN district AS d ON t.district = d.id
LEFT JOIN trade_info AS tr ON s.trade_name = tr.trade_id
LEFT JOIN project_info AS pr ON s.project_id = pr.project_id
LEFT JOIN institution as ins ON ins.ins_id  = pr.ins_id
GROUP BY pr.project_id";

$project_result = mysqli_query($conn, $project_sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>প্রশিক্ষণার্থী’র তথ্য</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

       <?php include ('left_menu.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                &nbsp;
            </div>
            <div class="row">


                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo convertEnglishDigitToBengali($project_info['total_project_info']); ?></div>
                                    <div>প্রকল্প এবং কর্মসূচী</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo convertEnglishDigitToBengali($training_center['total_training_center']); ?></div>
                                    <div>ট্রেইনিং সেন্টার</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo convertEnglishDigitToBengali($data['total_student']); ?></div>
                                    <div>প্রশিক্ষণার্থী</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">প্রশিক্ষণার্থী’র তথ্য</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            মন্ত্রণালয় এবং দপ্তর/সংস্থা থেকে অনলাইন এ সংগৃহীত তথ্য থেকে প্রাপ্ত প্রশিক্ষণার্থী’র তথ্য
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="data">
                                <thead>
                                <tr>
                                <th>
                                <select name="institution" id="institution" class="form-control">
                                    <option value="">দপ্তর/সংস্থা</option>
                                    <?php 
                                    while($row = mysqli_fetch_array($institutions))
                                {
                                    echo '<option value="'.$row["ins_id"].'">'.$row["institution_name"].'</option>';
                                }
                                ?>
                                </select>
                                </th>
                                <th>প্রকল্প/ কর্মসুচি</th>
                                <th>ট্রেড</th>
                                <th>জেলা</th>
                                <th>সেন্টার</th>
                                <th>প্রশিক্ষণার্থী</th>
                                <th>পিতা</th>
                                <th>মাতা</th>
                                <th>মোবাইল</th>
                                </tr>
                                </thead>
                            </table>
 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 load_data();

 function load_data(is_agency)
 {
  var dataTable = $('#data').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "ajax":{
    url:"data.php",
    type:"POST",
    data:{is_agency:is_agency}
   },
   "columnDefs":[
    {
     "targets":[0],
     "orderable":false,
    },
   ],
  });
 }

 $(document).on('change', '#institution', function(){
  var agency = $(this).val();
  $('#data').DataTable().destroy();
  if(agency != '')
  {
   load_data(agency);
  }
  else
  {
   load_data();
  }
 });
});
</script>

</body>

</html>

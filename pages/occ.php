<?php
 include('common.php');
    $sql = "SELECT
    d.name as 'name_EN',
    d.name_BN AS 'district',
 d.longitude as 'longitude',
d.latitude as 'latitude',
COUNT(*) as 'total'
FROM
    `training_student_info` AS s
LEFT JOIN training_center AS t ON s.tcid = t.tcid
RIGHT JOIN district AS d ON t.district = d.id
LEFT JOIN trade_info AS tr ON s.trade_name = tr.trade_id
LEFT JOIN project_info AS pr ON s.project_id = pr.project_id
LEFT JOIN institution as ins ON ins.ins_id  = pr.ins_id
GROUP BY d.id";
$district_count = mysqli_query ($conn, $sql); 

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service provided by the 60 One-Stop Crisis Cell (OCC)</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('left_menu.php'); ?>

        <div id="page-wrapper">
                 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Service provided by the 60 One-Stop Crisis Cell (OCC)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <canvas id="myChart"></canvas>

                <!-- হেল্পঃ http://tobiasahlin.com/blog/chartjs-charts-to-get-you-started -->
            </div>
        <!-- /#page-wrapper -->
<div style="font-size: 12px; text-decoration: none;">
    <a href="http://www.mspvaw.gov.bd" target="_blank"> Information Source </a>
</div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

    <script>
var ctx = document.getElementById("myChart");
var data = {
        labels: ["2013", "2014", "2015", "2016", "2017"],
        datasets: [{
                    label: "Physical Assault",
                    backgroundColor: "#FFE0E6",
                    data: [3282,6290,4639,7348,5818]
                }, {
                    label: "Sexual Assault",
                    backgroundColor: "#FFECD9",
                    data: [706,555,613,800,842]
                },
                {
                    label: "Burn",
                    backgroundColor: "#FFF5DD",
                    data: [27,31,34,53,27]
                },
                {
                    label: "Acid Burn",
                    backgroundColor: "#DBF2F2",
                    data: [6,16,13,60,17]
                },
                {
                    label: "Mentally Abuse",
                    backgroundColor: "#D7ECFB",
                    data: [347,511,690,831,831]
                },
                {
                    label: "Others",
                    backgroundColor: "#EBE0FF",
                    data: [23,37,27,289,225]
                }]
            };

var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data
});

</script>
   

</body>

</html>

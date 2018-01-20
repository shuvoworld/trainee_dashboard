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
                    <h1 class="page-header">National Helpline Centre for Violence Against Women and Children  -Total Number of Calls</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <canvas id="myChart"></canvas>
            </div>
            <div style="font-size: 12px; text-decoration: none;">
    <a href="http://www.mspvaw.gov.bd/index.php?option=com_content&view=article&id=191&Itemid=143&act_id=0&cmp=1" target="_blank"> Information Source </a>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

    <script>
var ctx = document.getElementById("myChart");
var data = {
        labels: ["June to Dec-12","2013", "2014", "2015", "2016", "2017"],
        datasets: [{
                    label: "Medical Facilities",
                    backgroundColor: "#3e95cd",
                    data: [103,  101, 394, 356, 312, 352, 1618]
                }, {
                    label: "Counseling",
                    backgroundColor: "#8e5ea2",
                    data: [174,  156, 760, 453, 1124, 1416, 4083]
                },
                {
                    label: "Police assistance",
                    backgroundColor: "#FFF5DD",
                    data: [263,  257, 713, 1471,    4108,    4116,    10928]
                },
                {
                    label: "Legal Help",
                    backgroundColor: "#3cba9f",
                    data: [1615, 1420,    2726,    3163,    8761,    10864,   28549]
                },
                {
                    label: "Information",
                    backgroundColor: "#e8c3b9",
                    data: [1784, 9039,    36927,   67228,   94803,   320226,  530007]
                },
                {
                    label: "Others",
                    backgroundColor: "#EBE0FF",
                    data: [885,  1604,    2965,    3308,    4650,    3082,    16494]
                }]
            };

var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data
});

</script>
   

</body>

</html>

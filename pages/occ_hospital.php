<?php
 include('common.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>One-Stop Crisis Cell Total Services in District Sadar Hospital and Upazila Health Complex </title>

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
                    <h1 class="page-header">One-Stop Crisis Cell Total Services in District Sadar Hospital and Upazila Health Complex </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <canvas id="pie-chart" width="800" height="450"></canvas>
<div style="font-size: 12px; text-decoration: none;">
    <a href="http://www.mspvaw.gov.bd/index.php" target="_blank"> Information Source </a>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

    <script>
new Chart(document.getElementById("pie-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Psycho-social Counseling", "Legal Assistance", "Legal Aid", "Police Assistance", "Medical care", "Protect child Marriage", "Arbitration", "Empowerment activities", "Vocational Training", "Others"],
      datasets: [{
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#405952","#ACF0F2","#ACF0F2","#EB7F00","#F7E967"],
        data: [12650,3832,4201,4901,6885,169,2180,51,43,76]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'One-Stop Crisis Cell Total Services in District Sadar Hospital and Upazila Health Complex'
      }
    }
});


</script>
   

</body>

</html>

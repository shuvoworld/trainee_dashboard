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



$sqld = "SELECT
    d.name as 'name_EN',
    d.name_BN AS 'district',
    d.division_name as 'division',
COUNT(*) as 'total'
FROM
    `training_student_info` AS s
LEFT JOIN training_center AS t ON s.tcid = t.tcid
RIGHT JOIN district AS d ON t.district = d.id
LEFT JOIN trade_info AS tr ON s.trade_name = tr.trade_id
LEFT JOIN project_info AS pr ON s.project_id = pr.project_id
LEFT JOIN institution as ins ON ins.ins_id  = pr.ins_id
GROUP BY d.id";
$district_count_d = mysqli_query ($conn, $sqld); 
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
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
    <!-- Awesome marker Help: 
    https://github.com/lvoogdt/Leaflet.awesome-markers;
    http://jsfiddle.net/VPzu4/92;
    -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="../leaflet/leaflet.css" />
    <link rel="stylesheet" href="../awesome-markers/dist/leaflet.awesome-markers.css">
   <style type="text/css">
       #map { 
        height: 700px;
        width: 100%;
       }
   </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('left_menu.php'); ?>

        <div id="page-wrapper">
           <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">জিআইএস এ প্রশিক্ষণার্থীর তথ্য </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">

            
            <div id="map"></div>
            
<div class="panel panel-default">

            <div class="panel-heading">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <th>District</th>
                        <th>District</th>
                         <th>Total</th>
                    </thead>
                    <?php foreach($district_count_d as $table){?>
                    <tr>
                        <td><?= $table['division'] ?></td>
                        <td><?= $table['name_EN'] ?></td>
                        <td><?= $table['total'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
                
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

<script src="https://use.fontawesome.com/043d3adcee.js"></script>

<script src="../leaflet/leaflet.js"></script>
<script src="../awesome-markers/dist/leaflet.awesome-markers.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
  // var map = L.map('map').setView([23.754256,90.400235], 7);

   var map = L.map('map').setView([23.91597, 90.197754], 7);
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'

        }).addTo(map);
        map.scrollWheelZoom.disable();

<?php
 while($row = mysqli_fetch_assoc($district_count))
 {
        $markerColor = 'red';
        $markerIcon = 'star';
        $AwesomeMarkerPrefix = 'fa';
        $AwesomeMarkerSpin = '';
    
    if($row['total'] >= 10 && $row['total'] < 100){
        $markerColor = 'purple';
        $markerIcon = 'star';
        $AwesomeMarkerPrefix = 'glyphicon';
        $AwesomeMarkerSpin = 'true';
    }

    if($row['total'] >= 100){
        $markerColor = 'green';
        $markerIcon = 'star';
        $AwesomeMarkerPrefix = 'glyphicon';
        $AwesomeMarkerSpin = 'true';
    }

?>
   L.marker([<?php echo $row['latitude']?>,<?php echo $row['longitude']?>], {icon: L.AwesomeMarkers.icon({icon: '<?=$markerIcon?>', markerColor: '<?=$markerColor?>', prefix: '<?=$AwesomeMarkerPrefix?>', spin:'<?=$AwesomeMarkerSpin?>'}) }).addTo(map).bindPopup("District: <?php echo $row['name_EN']?><br/> Total Student: <?php echo $row['total']?>").openPopup();
<?php
    }
?>
</script> 
</body>

</html>

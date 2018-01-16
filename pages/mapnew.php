<?php
 include('connection.php');
  mysqli_query ($conn, "set collation_connection='utf8_general_ci'"); 
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="../leaflet/leaflet.css" />
   <style type="text/css">
       #map { height: 1000px;}
   </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('left_menu.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                &nbsp;
            </div>
            <div class="row">


             
            <div id="map"></div>
                
            
            
            
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


<script src="../leaflet/leaflet.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
   
<script>
   var map = L.map('map').setView([23.754256,90.400235], 7);
   //var map = L.marker([23.754256,90.400235]).addTo(map);
   L.tileLayer( 'https://api.mapbox.com/styles/v1/mapbox/streets-v10/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2h1dm93b3JsZCIsImEiOiJjaWxzMjI1NHMwOHIydjZseWx3aDQza2Z3In0.DeFUTd81Tnf9iAcKkubnig', {
   maxZoom: 18,
   attribution: 'Map data &copy; <a href="http://openstreetmap.org/"> OpenStreetMap </a> contributors, ' +
   '<a href="http://creativecommons.org/"> CC-BY-SA </a>, ' +
   'Imagery © <a href="http://mapbox.com">Mapbox</a>',
   id: 'examples.map-i875mjb7'
   }).addTo(map);

<?php
 while($row = mysqli_fetch_assoc($district_count))
 {
?>
   L.marker([<?php echo $row['latitude']?>,<?php echo $row['longitude']?>]).addTo(map).bindPopup("District: <?php echo $row['name_EN']?><br/> Total Student: <?php echo $row['total']?>").openPopup();
<?php
    }
?>
</script> 
</body>

</html>

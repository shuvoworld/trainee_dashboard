<?php
 header('Content-Type: application/json');
 include('connection.php');
 $institution = $_REQUEST['institution'];
 $project = $_REQUEST['project'];
 $trade = $_REQUEST['trade'];
 mysqli_query ($conn, "set character_set_client='utf8'"); 
 mysqli_query ($conn, "set character_set_results='utf8'"); 

 mysqli_query ($conn, "set collation_connection='utf8_general_ci'"); 
    $sql = "SELECT
    d.name_BN AS 'district',
COUNT(*) as 'total'
FROM
    `training_student_info` AS s
LEFT JOIN training_center AS t ON s.tcid = t.tcid
LEFT JOIN district AS d ON t.district = d.id
LEFT JOIN trade_info AS tr ON s.trade_name = tr.trade_id
LEFT JOIN project_info AS pr ON s.project_id = pr.project_id
LEFT JOIN institution as ins ON ins.ins_id  = pr.ins_id
GROUP BY d.id";

$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$data[] = $rows;
}
echo json_encode($data);
?>
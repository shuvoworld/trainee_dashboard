<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "probatayon";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query ($conn, "set character_set_client='utf8'"); 
 mysqli_query ($conn, "set character_set_results='utf8'"); 

 mysqli_query ($conn, "set collation_connection='utf8_general_ci'"); 
	$sql = "SELECT
    ins.institution_name as 'agency',
	pr.project_name as 'project',
	tr.trade_name AS 'trade',
	s.student_name_bangla 'student_name_bangla',
	s.father_name as 'father_name',
	s.mother_name as 'mother_name',
	s.mobile_number as 'mobile_number',
	t.`name` AS 'training_center',
	d.name_BN AS 'district'
FROM
	`training_student_info` AS s
LEFT JOIN training_center AS t ON s.tcid = t.tcid
LEFT JOIN district AS d ON t.district = d.id
LEFT JOIN trade_info AS tr ON s.trade_name = tr.trade_id
LEFT JOIN project_info AS pr ON s.project_id = pr.project_id
LEFT JOIN institution as ins ON ins.ins_id  = pr.ins_id";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$data[] = $rows;
}
$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"aaData"=>$data);
echo json_encode($results);
?>
<?php
 include('connection.php');
 mysqli_query ($conn, "set character_set_client='utf8'"); 
 mysqli_query ($conn, "set character_set_results='utf8'"); 
 mysqli_query ($conn, "set collation_connection='utf8_general_ci'"); 

	$columns = array('agency', 'project', 'trade', 'district', 'training_center', 'student_name_bangla', 'father_name', 'mother_name', 'mobile_number');	
	
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
	training_student_info AS s
LEFT JOIN training_center AS t ON s.tcid = t.tcid
LEFT JOIN district AS d ON t.district = d.id
LEFT JOIN trade_info AS tr ON s.trade_name = tr.trade_id
LEFT JOIN project_info AS pr ON s.project_id = pr.project_id
LEFT JOIN institution as ins ON ins.ins_id  = pr.ins_id WHERE 1  ";

// $sql .= " WHERE ";
if(isset($_POST["is_agency"]))
{
 $sql = $sql . " AND ins.ins_id = ". $_POST["is_agency"];
}

// if($institution != '')
// {
// 	$sql = $sql . " AND ins.ins_id = ". $institution;
// }

// if($project != '')
// {
// 	$sql = $sql . " AND pr.project_name LIKE '%" . $project ."%'";
// }

// if($trade != '')
// {
// 	$sql = $sql . " AND tr.trade_id = ". $trade;
// }

if(isset($_POST["search"]["value"]))
{
 $sql .= '
  AND (mobile_number LIKE "%'.$_POST["search"]["value"].'%"
  OR pr.project_name LIKE "%'.$_POST["search"]["value"].'%"
  )';
}

if(isset($_POST["order"]))
{
 $sql .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $sql .= ' ORDER BY agency DESC ';
}

$query1 = '';

if($_POST["length"] != 1)
{
 $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

//echo $sql; die();
$number_filter_row = mysqli_num_rows(mysqli_query($conn, $sql));

$result = mysqli_query($conn, $sql.$query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["agency"];
 $sub_array[] = $row["project"];
 $sub_array[] = $row["trade"];
 $sub_array[] = $row["district"];
 $sub_array[] = $row["training_center"];
 $sub_array[] = $row["student_name_bangla"];
 $sub_array[] = $row["father_name"];
 $sub_array[] = $row["mother_name"];
 $sub_array[] = $row["mobile_number"];
 $data[] = $sub_array;
}

function get_all_data($conn)
{
 $query = "SELECT
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

 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);
?>
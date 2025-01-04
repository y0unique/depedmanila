<?php 
include "../../database/connection.php";

$output= array();
$sql = "SELECT * FROM transparencyFilesvw";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

//Data Table
$columns = array(
	0 => 'id',
	1 => 'title',
	2 => 'date',
	3 => 'publish_date',
	4 => 'closing_date',
	5 => 'awarded_to',
	6 => 'reference_number',
	7 => 'procurement_mode',
	8 => 'status'
);

//Search
if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE title like '%".$search_value."%'";
	$sql .= " OR date like '%".$search_value."%'";
	$sql .= " OR publish_date like '%".$search_value."%'";
	$sql .= " OR closing_date like '%".$search_value."%'";
	$sql .= " OR awarded_to like '%".$search_value."%'";
	$sql .= " OR reference_number like '%".$search_value."%'";
	$sql .= " OR procurement_mode like '%".$search_value."%'";
}

//Order
if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id asc";
    
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start .", ".$length;
}	

//displaying of table data
$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['date'];
	$sub_array[] = $row['publish_date'];
	$sub_array[] = $row['closing_date'];
	$sub_array[] = $row['awarded_to'];
	$sub_array[] = $row['reference_number'];
	$sub_array[] = $row['procurement_mode'];
	$sub_array[] = '<a href="'.$row['link'].'" target="_blank">'.$row['title'].'</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

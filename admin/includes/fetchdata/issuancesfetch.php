<?php 
include "../../database/connection.php";

$output= array();
$sql = "SELECT * FROM issuancestbl";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

//Data Table
$columns = array(
	0 => 'issuances_id',
	1 => 'tracking_number',
	2 => 'issuances_title',
	3 => 'issuances_number',
	4 => 'issuances_date',
	5 => 'issuances_type',
	6 => 'issuances_status',
);

//Search
if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE tracking_number like '%".$search_value."%'";
	$sql .= " OR issuances_title like '%".$search_value."%'";
	$sql .= " OR issuances_number like '%".$search_value."%'";
	$sql .= " OR issuances_date like '%".$search_value."%'";
	$sql .= " OR issuances_type like '%".$search_value."%'";
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
	$sql .= " ORDER BY issuances_status asc, issuances_id desc";
    
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
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['issuances_id'].'" class="btn btn-info btn-sm editissuancebtn" ><i class="fas fa-edit"></i></a>  
					<a href="javascript:void();" data-id="'.$row['issuances_id'].'" class="btn btn-danger btn-sm deleteissuancebtn" ><i class="fas fa-trash"></i></a>';
	$sub_array[] = $row['issuances_id'];
	$sub_array[] = $row['tracking_number'];
	$sub_array[] = $row['issuances_number'];
	$sub_array[] = strtolower($row['issuances_type']);
	$sub_array[] = $row['issuances_date'];
	$sub_array[] = '<a href="'.$row['issuances_link'].'" target="_blank">'.$row['issuances_title'].'</a>';
	$sub_array[] = $row['issuances_status'];
    
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
?>
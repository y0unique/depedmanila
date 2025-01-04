<?php 
include "../../database/connection.php";

$output= array();
$sql = "SELECT * FROM userstbl";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

//Data Table
$columns = array(
	0 => 'user_id',
	1 => 'user_username',
	2 => 'user_email',
	3 => 'user_type',
	4 => 'user_department',
	5 => 'user_profile',
	6 => 'user_status'
);

//Search
if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE user_username like '%".$search_value."%'";
	$sql .= " OR user_email like '%".$search_value."%'";
	$sql .= " OR user_type like '%".$search_value."%'";
	$sql .= " OR user_status like '%".$search_value."%'";
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
	$sql .= " ORDER BY user_status asc, user_id asc";
    
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
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['user_id'].'" class="btn btn-info btn-sm edituserbtn" ><i class="fas fa-edit"></i></a>  
					<a href="javascript:void();" data-id="'.$row['user_id'].'" class="btn btn-danger btn-sm deleteuserBtn" ><i class="fas fa-trash"></i></a>';
	$sub_array[] = $row['user_id'];
	$sub_array[] = $row['user_username'];
	$sub_array[] = $row['user_email'];
	$sub_array[] = $row['user_type'];
	$sub_array[] = $row['user_department'];
	$sub_array[] = $row['user_profile'];
	$sub_array[] = $row['user_status'];
    
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

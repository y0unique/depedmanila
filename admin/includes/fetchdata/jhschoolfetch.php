<?php 
include "../../database/connection.php";

$output= array();
$sql = "SELECT * FROM jhsschoolsvw";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

//Data Table
$columns = array(
	0 => 'id',
	1 => 'name',
	2 => 'address',
	3 => 'principal',
	4 => 'contact',
	5 => 'link',
	6 => 'email',
	7 => 'district'
);

//Search
if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE name like '%".$search_value."%'";
	$sql .= " OR address like '%".$search_value."%'";
	$sql .= " OR principal like '%".$search_value."%'";
	$sql .= " OR contact like '%".$search_value."%'";
	$sql .= " OR link like '%".$search_value."%'";
	$sql .= " OR email like '%".$search_value."%'";
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
	$sql .= " ORDER BY district asc";
    
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
	$sub_array[] = $row['district'];
	$sub_array[] = $row['name'];
	$sub_array[] = $row['address'];
	$sub_array[] = $row['principal'];
	$sub_array[] = $row['contact'];
	$sub_array[] = $row['link'];
	$sub_array[] = $row['email'];
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

<?php 
include "../../database/connection.php";

$output= array();
$sql = "SELECT * FROM schoolsvw";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

//Data Table
$columns = array(
	0 => 'school_id',
	1 => 'id',
	2 => 'district',
	3 => 'name',
	4 => 'address',
	5 => 'principal',
	6 => 'contact',
	7 => 'link',
	8 => 'email',
	9 => 'type',
	10 => 'shs_availability',
	11 => 'sped_availability'
);
//Search
if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE id like '%".$search_value."%'";
	$sql .= " OR name like '%".$search_value."%'";
	$sql .= " OR address like '%".$search_value."%'";
	$sql .= " OR principal like '%".$search_value."%'";
	$sql .= " OR contact like '%".$search_value."%'";
	$sql .= " OR link like '%".$search_value."%'";
	$sql .= " OR email like '%".$search_value."%'";
	$sql .= " OR type like '%".$search_value."%'";
	$sql .= " OR shs_availability like '%".$search_value."%'";
	$sql .= " OR sped_availability like '%".$search_value."%'";
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
	$sql .= " ORDER BY id AND type asc";
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
    $sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-info btn-sm editschoolbtn" ><i class="fas fa-edit"></i></a>  
					<a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-danger btn-sm deleteBtn_school" ><i class="fas fa-trash"></i></a>';
	$sub_array[] = $row['school_id'];
	$sub_array[] = $row['id'];
	$sub_array[] = $row['district'];
	$sub_array[] = $row['name'];
	$sub_array[] = $row['address'];
	$sub_array[] = $row['principal'];
	$sub_array[] = $row['contact'];
	$sub_array[] = $row['link'];
	$sub_array[] = $row['email'];
	$sub_array[] = $row['type'];
	$sub_array[] = $row['shs_availability'];
	$sub_array[] = $row['sped_availability'];
	$data[] = $sub_array;
}
$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

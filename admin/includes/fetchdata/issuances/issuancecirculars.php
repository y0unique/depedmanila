<?php 
include "../../../database/connection.php";

$output= array();
$sql = "SELECT * FROM issuancesvw";
$sql .= " WHERE type = 'DIVISION CIRCULARS'";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

//Data Table
$columns = array(
    0 => 'id',
    1 => 'tracking_number',
    2 => 'title',
    3 => 'link',
    4 => 'number',
    5 => 'date',
    6 => 'type',
    7 => 'status'
);

//Search
if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " AND (tracking_number LIKE '%".$search_value."%' OR title LIKE '%".$search_value."%' OR number LIKE '%".$search_value."%' OR date LIKE '%".$search_value."%' OR type LIKE '%".$search_value."%')";
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
	$sql .= " ORDER BY id desc, date desc";
    
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
	$sub_array[] = $row['date'];
	$sub_array[] = $row['number'];
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
?>
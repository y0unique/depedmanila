<?php 
include "../../database/connection.php";

// Your SQL query to fetch data from the database
$sql = "SELECT issuances_type, COUNT(*) AS count FROM issuancestbl GROUP BY issuances_type";

// Execute the query
$query = mysqli_query($con, $sql);

// Initialize arrays to store data
$labels = array();
$chartData = array();
$backgroundColors = array();
$hoverBackgroundColors = array();

// Fetch data and populate arrays
while ($row = mysqli_fetch_assoc($query)) {
    $labels[] = $row['issuances_type']; // Fetch labels from database
    $chartData[] = $row['count']; // Fetch count as chart data
    // Define colors as needed
    $backgroundColors[] = '#' . substr(md5(mt_rand()), 0, 6); // Generate random background color
    $hoverBackgroundColors[] = '#' . substr(md5(mt_rand()), 0, 6); // Generate random hover background color
}

// Prepare your data for JSON response
$data = array(
  'labels' => $labels,
  'chartData' => $chartData,
  'backgroundColors' => $backgroundColors,
  'hoverBackgroundColors' => $hoverBackgroundColors
);

// Send JSON response
echo json_encode($data);
?>

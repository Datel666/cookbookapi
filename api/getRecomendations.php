<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 

 
// get all products from products table
$result = mysqli_query($bd,"SELECT * FROM recomendations") or die(mysqli_error());
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["recomendations"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $recomendations = array();
        $recomendations["idrec"] = $row["idrec"];
        $recomendations["goal"] = $row["goal"];
        $recomendations["status"] = $row["status"];
        $recomendations["rectext"] = $row["rectext"];
        
        
 
        // push single product into final response array
        array_push($response["recomendations"], $recomendations);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response, JSON_UNESCAPED_UNICODE );
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No recomendations found";
 
    // echo no users JSON
    echo json_encode( $response, JSON_UNESCAPED_UNICODE );
}
?>
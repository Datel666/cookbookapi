<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 

 
// get all products from products table
$result = mysqli_query($bd,"SELECT * FROM versions WHERE idversion = (SELECT MAX(idversion) FROM versions)") or die(mysqli_error());
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["versions"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $version= array();
        $version["idversion"] = $row["idversion"];
        $version["date"] = $row["date"];
        
 
        // push single product into final response array
        array_push($response["versions"], $version);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode( $response, JSON_UNESCAPED_UNICODE );
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No version found";
 
    // echo no users JSON
    echo json_encode( $response, JSON_UNESCAPED_UNICODE );
}
?>

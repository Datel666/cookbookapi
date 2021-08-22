<?php
 

 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 

 

$result = mysqli_query($bd,"SELECT * FROM categories") or die(mysqli_error());
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    
    $response["categories"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $category = array();
        $category["idCategory"] = $row["idCategory"];
        $category["strCategory"] = $row["strCategory"];
        $category["strCategoryThumb"] = $row["strCategoryThumb"];
        $category["strCategoryDescription"] = $row["strCategoryDescription"];
 
        // push single 
        array_push($response["categories"], $category);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode( $response, JSON_UNESCAPED_UNICODE );
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No categories found";
 
    // echo no users JSON
    echo json_encode( $response, JSON_UNESCAPED_UNICODE );
}
?>
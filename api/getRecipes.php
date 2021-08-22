<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 

 
// get all products from products table
$result = mysqli_query($bd,"SELECT * FROM meals") or die(mysqli_error());
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["meals"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $meal = array();
        $meal["idMeal"] = $row["idMeal"];
        $meal["strMeal"] = $row["strMeal"];
        $meal["strCategory"] = $row["strCategory"];
        $meal["strArea"] = $row["strArea"];
        $meal["strInstructions"] = $row["strInstructions"];
        $meal["strMealThumb"] = $row["strMealThumb"];
        $meal["strTags"] = $row["strTags"];
        $meal["strIngredients"] = $row["strIngredients"];
        $meal["strMeasures"] = $row["strMeasures"];
        $meal["strMealInfo"] = $row["strMealInfo"];
        $meal["strCookTime"] = $row["strCookTime"];
 
        // push single product into final response array
        array_push($response["meals"], $meal);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response, JSON_UNESCAPED_UNICODE );
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No meals found";
 
    // echo no users JSON
    echo json_encode( $response, JSON_UNESCAPED_UNICODE );
}
?>
<?php

if(!isset($_GET['id']) || empty($_GET['id'])){
    echo json_encode(
        array(
            "error" => array(
                "code"=>"404",
                "message"=>"No Id found to fetch reord"
                )
            )
        );

}

$callSid = $_GET['id'];

$file = "public/data/sentiments.json";
$json_data = file_get_contents($file);
$data = json_decode($json_data, true);

$data_for_display = $data[$callSid];

//check we have all the details available
//only return success if all the keys are persent
if ( 
    isset($data_for_display) && 
    !empty($data_for_display) &&
    array_key_exists('Transcript', $data_for_display) &&
    array_key_exists('Summary', $data_for_display) &&
    array_key_exists('Sentiment', $data_for_display)
){
    echo json_encode($data_for_display);
} else {
    echo json_encode(
        array(
            "error" => array(
                "code"=>"404",
                "message"=>"No record found matching to the Id"
                )
            )
        );
}


?>

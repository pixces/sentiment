<?php
header("Content-Type: application/json;charset=utf-8");
header('Accept: application/json');
header("Accept: */*");

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

require_once ROOT . DS . 'library' . DS . 'config.php';
require_once ROOT . DS . 'library' . DS . 'api.php';

$webhookData = file_get_contents("php://input");   

$headers =  getallheaders();
$head = array();
foreach($headers as $key=>$val){
   $head[$key] = $val;
}

// Read the incoming JSON data from the webhook
try{
    $webhookData = file_get_contents("php://input");   
    $decodedData = json_decode($webhookData, true);

    //there is no success block
    //return 4xx
    if (!$decodedData && $decodedData['success']){
        //if no success
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(['error' => 'Invalid webhook data.']);
        exit;
    }

    //get the payload and then the Id
    //else return 4xx
    $payloadData = $decodedData['payload'];

    //for transcripts there is a task array
    //for sentiment there is a job array
    if(isset($payloadData['job'])){
        $payload = $payloadData['job'];
        $id = $payload['id'];    
    } else if (isset($payloadData['task'])){
        $payload = $payloadData['task'];
        $id = $payload['id'];
    } else {
        //if no payload data
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(['error' => 'Invalid webhook data.']);
        exit;
    }

    //add good continue
    //read map file to get the corresponding SID
    $mapData = file_get_contents("public/data/keymap.json");
    $map = json_decode($mapData,true);
    $callSid = $map[$id];
    
    //get the sentiments file data to update
    $fileContent = file_get_contents("public/data/sentiments.json");
    $sentimentData = json_decode($fileContent,true);
    
    $insights = explode("\n\n",$payload['result']);

    /*
    foreach($insights as $item){
        if($item){
            //check if there is a ":" in the text
            if (strpos($item, ':') !== false) { 
                $t = explode(":",$item);
                $sentimentData[$callSid][$t[0]] = $t[1];
            } else {
                $sentimentData[$callSid]['Transcript'] = $item;
            }        
        }           
    }*/

    foreach($insights as $item){
        if($item){
            //check if there is a ":" in the text
            if (strpos($item, ':') !== false) { 
                $t = explode(":",$item);
                //check if this is for summary/sentiment or anything else
                if(in_array($t[0],array('Sentiment','Summary'))){
                    $sentimentData[$callSid][$t[0]] = $t[1];                
                } else {
                    $sentimentData[$callSid]['Transcript'] = $payload['result'];
                } 
            } else {
                $sentimentData[$callSid]['Transcript'] = $item;
            }        
        }   
    }


    //print_r($sentimentData);
    //rewrite the data into the file
    file_put_contents("public/data/sentiments.json", json_encode($sentimentData));
    
    //return 200 OK as response    
    header("HTTP/1.1 200 OK");
    echo json_encode(['Status' => 'Success']);
    exit;

} catch(Exception $e){
    file_put_contents("log/callback_log.txt", $e->getTrace());
    exit;
}


//$events = json_decode($webhookData, true);

/*
foreach ($events as $key=>$event) {
    // Here, you now have each event and can process them how you like
    $data[$key]=$event;
}
//if the webhook is not a post request thourgh 400
if (!$_Post){
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['error' => 'Invalid webhook data.']);
} */   
    
//$webhookData= '{"success": true, "reason": "", "payload": {"task": {"id": "b6218cf5-2b36-4fac-890c-5aafde776128", "result": "So the thing is that I am not able to login into my account here.\n\n", "metadata": null}}}';
//all good do the processing
/*
if ($decodedData && isset($decodedData['id'])) {
    // Assuming the API endpoint is the same for both the API and webhook
    $api_url = API_BASE_URL . $decodedData['id'];

    // Fetch updated data from the API
    $updatedData = fetchDataFromAPI($api_url);

    if ($updatedData && isset($updatedData['id'])) {
        // Return the updated data as JSON
        header('Content-Type: application/json');
        echo json_encode($updatedData);
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(['error' => 'Error fetching updated data from the API.']);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['error' => 'Invalid webhook data.']);
}*/

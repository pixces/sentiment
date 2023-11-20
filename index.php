<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

require_once ROOT . DS . 'library' . DS . 'config.php';
require_once ROOT . DS . 'library' . DS . 'api.php';

//include Guzzle
include 'vendor/autoload.php';

use GuzzleHttp\Client;

//prepare the URL to be triggred;
//$id = rand(1,10);
//$api_url = API_BASE_URL . $id;


//fetch the URL data with get API
$httpClient = new Client();
$api = new Api();

//set call data to be null;
$callData = null;

if (isset($_GET['id']) && !empty($_GET['id'])){
    $callSid = $_GET['id'];
    //$callSid = '8d23bf758ec43bbd4210ba68530c17bc';
    //define calling URL
    //$getCallDetailsURL = $url . $callSid . ".json";    
    $callData = $api->getCallDetails($callSid);

   /*  try{
        //make the request to get call details
        $response = $httpClient->request('GET',$getCallDetailsURL,['auth' => [API_KEY, API_TOKEN]]);

        if ($response->getStatusCode() == "200"){
            $data = json_decode($response->getBody()->getContents(),true);
            $callData = $data['Call'];            
            $callRecordingUrl = $callData['RecordingUrl'];            
            //make the request for the AI part


            $exomind_api_payload = array(
                "job" => "summarization_with_sentiment", 
                "callback_url" => "<call_back_url>", 
                "callback_per_transcript" => true, 
                "tasks" => array(
                    array(
                        "mime_type" => "audio/mp3",
                        "data" => array(
                            "event_payload"=>"<URL>",
                            "event_time"=>"<start_time>",
                        )
                    )
                )
            );

            $exomin_api_auth = array(
                'auth'=> array("thenga","manga")
            );

            if(isset($callRecordingUrl)) && (!empty($callRecordingUrl)){
                $response = httpClient->request(
                    'POST',
                    "http://api.exomind.exotel.com/v1/jobs",
                    $exomind_api_payload,
                    $exomin_api_auth
                );
            }
            //capture the response and save it as a key in file as a map for future refrence
        }

    } catch ( Exception $e){
        print 'Caught exception: ',  $e->getMessage(), "\n";
        print_r($e->getTrace());
    }     */
}

require_once ROOT . DS . 'views' . DS . 'material.php';
//require_once ROOT . DS . 'views' . DS . 'tmp.html';

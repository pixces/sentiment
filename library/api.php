<?php

//API to fetch data
use GuzzleHttp\Client;

require_once ROOT . DS . 'library' . DS . 'config.php';

class API {
    public $httpClient;
    public $exoCallApi;
    public $taskerJobApi;
    public $sid;
    public $map_file = "public/data/keymap.json";
    public $call_end_time;
    public $call_recording_url;
    
    function __construct(){
        //initialize the guzzle client
        $this->httpClient = new Client();         
    }

    /**
     * prepare basic authentication for http client
     */
    function prepareBasicAuth($username, $pass){
        return
            array(
                "auth" => array(
                    $username,$pass
                )
            );
    }

    function prepareExoAPiUrl($sid){
        return API_BASE_URL . ACCOUNT_SID . '/Calls/' . $sid . ".json";
    }

    function prepareTaskerJobUrl(){
        return TASKER_JOB_URL;
    }

    function prepareTaskerJobBody(){

        $body = array(
            "job" => "summarization_with_sentiment", 
            "callback_url" => CALLBACK_URL, 
            "callback_per_transcript" => true, 
            "tasks" => array(
                array(
                    "mime_type" => "audio/mp3",
                    "data" => array(
                        "event_payload"=>$this->call_recording_url,
                        "event_time"=>$this->call_end_time
                    )
                )
            )
        );
        return json_encode($body);
    }

    function getCallDetails($sid){

        $this->sid = $sid;

        $response = $this->httpClient->request(
            'GET',
            $this->prepareExoAPiUrl($sid),
            $this->prepareBasicAuth(API_KEY,API_TOKEN)
        );
            
        if ($response->getStatusCode() != "200"){
            return false;
        }

        $data = json_decode($response->getBody()->getContents(),true);
        
        //send call recording for further processing
        $this->call_recording_url = $data['Call']['RecordingUrl'];            
        $this->call_end_time = $data['Call']['EndTime'];            

        $this->postforInsights();

        //return call details
        return $data['Call'];    
    }

    function postforInsights(){
        if (
            !isset($this->call_recording_url) || 
            empty($this->call_recording_url)
            ){
            return false;            
        }
        
        //prepare job
        $jobPayload = $this->prepareTaskerJobBody();
        
        $options= array(
            'auth' => array(TASKER_KEY,TASKER_TOKEN),
            'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'body' => $jobPayload,
            "debug" => false
          );


        //request for data
        try{
            $response = $this->httpClient->request(
                'POST',
                $this->prepareTaskerJobUrl(),
                $options
            );
     
            if ($response->getStatusCode() == "201")  {
                $data = json_decode($response->getBody()->getContents(),true);       

                //task Ids
                $map = array(
                    $data['payload']['id'] => $this->sid,
                    $data['payload']['tasks'][0] => $this->sid
                );

                //update this to the maps file
                $this->updateToFile($map);
            }        
        } catch (Exception $e){
            print_r($e->getTrace());
        } 
    }

    function updateToFile($map){
        //read the json file
        //append the map to the json data
        //rewrtite the content to the file
        $fileContent = file_get_contents($this->map_file);
        $data = json_decode($fileContent,true);
        
        //update the map to the file data
        foreach($map as $key => $value){
            $data[$key] = $value;
        }
        
        //write this back to the file
        $myfile = fopen($this->map_file, "w") or die("Unable to open file!");
        fwrite($myfile, json_encode($data));
        fclose($myfile);
    }

    function prepareCallDetailsURl(){
        return API_BASE_URL . ACCOUNT_SID . '/Calls/';
        //return 'https://' . API_KEY . ':' . API_TOKEN . '@' . SUB_DOMAIN . '/v1/Accounts/' . ACCOUNT_SID . '/Calls/';
    }
    
    function prepareHeaders(){
        // GET with basic auth
        return $headers = [
            'Content-type'  => 'application/json; charset=utf-8',
            'Accept'        => 'application/json',
            'Authorization' => 'Basic ' . API_KEY . ':' . API_TOKEN
        ];
    }

    function fetchDataFromAPI($url) {
        // Add any necessary headers or authentication here
        $data = json_decode(file_get_contents($url), true);
        return $data;
    }
 
}



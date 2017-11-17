<?php
require __DIR__ .  '/../vendor/autoload.php';

class RestHandler
{
    
    function __construct()
    {
        echo "RestHandler class has been initialized.";
    }
    
    function __destruct()
    {
        echo "RestHandler class has finished. Thanks for Stopping by!";
    }
    
    public $limit = 1;
    public $hostName = 'http://localhost:8080';
    public $endPoint = '/api/content/query/';
    public $formatType = "json";
    public $luceneQuery = "+live:true";
    
    public $headers = array(
        'Content-Type' => 'application/json'
    );

    public $options = array(
        'auth' => array(
            'admin@dotcms.com',
            'admin'
        )
    );
    
    public function setHostName($newVal)
    {
        $this->hostName = $newVal;
    }
    
    public function getHostName()
    {
        return $this->hostName;
    }
    
    public function getEndpoint()
    {
        return $this->endPoint;
    }
    
    public function setEndpoint($newVal)
    {
        $this->endPoint = $newVal;
    }
    
    public function setLuceneQuery($newval)
    {
        $this->luceneQuery = $newval;
    }
    
    public function getLuceneQuery()
    {
        return $this->luceneQuery;
    }
    
    public function setFormatTypeProperty($newval)
    {
        $this->formatType = $newval;
    }
    
    public function getFormatTypeProperty()
    {
        return $this->formatType;
    }

    public function setHeadersProperty($newVal)
    {
        $this->headers = $newVal;
    }

    public function getHeadersProperty()
    {
        return $this->headers;
    }

    public function setOptionsProperty($newVal)
    {
        $authValues = array(
            'auth' => (explode(":",$newVal))
        );
        
        $this->options = $authValues;
    }
    
    public function getOptionsProperty()
    {
        return $this->options;
    }
    
    public function setLimit($newVal)
    {
        $this->limit = $newVal;
    }
    
    public function getLimit()
    {
        return $this->limit;
    }
    
    public function getRestCall()
    {
        return $this->getHostName() . $this->getEndpoint()
        . $this->luceneQuery
        . "/limit/" . $this->getLimit()
        . "/type/" . $this->getFormatTypeProperty();
    }
    
    public function endsWith($str, $substring) {
        $len = strlen($substring);
        if ($len === 0) {
            return true;
        }
        
        return (substr($str, -$len) === $substring);
    }
    
    public function initializeFromFormSubmission()
    {
        
        $hostName = $_POST["hostname"];
        if($hostName != null) {
            if($this->endsWith($hostName,"/")){
                $hostName = substr($hostName, 0, -1);
            }
            $this->setHostName($hostName);
        }else {
            $this->setHostName("http://localhost:8080");
        }
        
        $getOperationType = $_POST["get_type"];
        switch ($getOperationType){ 
            case "query":
                $this->setEndpoint("/api/content/query/");
                break;
            case "inode":
                $this->setEndpoint("/api/content/inode/");
                break;
            case "id":
                $this->setEndpoint("/api/content/id/");
                break;
            default:
                $this->setEndpoint("/api/content/query/");
                break;
        }

            
        $limit = $_POST["limit"];
        if($limit != null) {
            $this->setLimit($limit);
        }else {
            $this->setLimit(10);
        }
        
        $formatType = $_POST["type"];
        switch($formatType):
        case 'xml':
            $this->setFormatTypeProperty("xml");
            break;
        case 'json':
            $this->setFormatTypeProperty("json");
            break;
        default:
            $this->setFormatTypeProperty("json");
        endswitch;
        
        $query = $_POST["query"];
        if($query != null || $query != "") {
            $this->setLuceneQuery($query);
        }else {
            $this->setLuceneQuery("+live:true");
        }
        
        $authDetails = $_POST["auth"];
        if($authDetails != null || $authDetails != "") {
            $this->setOptionsProperty($authDetails);
        }else {
            $this->setOptionsProperty("admin@dotcms.com:admin");
        }
        
    }

    public function populateArray($x)
    {
        return array(
            'languageId' => '1',
            'stName' => 'webPageContent',
            'title' => 'Script for Content Number ' . $x,
            'contentHost' => 'demo.dotcms.com',
            'body' => 'Test Body Goes Here ' . $x
        );
    }

    public function arrayToJSON($arr)
    {
        return json_encode($arr);
    }

    public function makeGETCall()
    {
        $request = Requests::get($this->getRestCall(), $this->getHeadersProperty(), $this->getOptionsProperty());
        
        if ($request->status_code == 200) {
            if($this->formatType == "json"){
                $output = json_decode($request->body);
                $results = $output->contentlets;
            } else {
                $results = simplexml_load_string($request->body);
            }
        } else {
            echo "Failure! Content was not pulled <br><br> Status code is: " . $request->status_code . "<br><br>";
        }
        return $results;
    }

    public function makePOSTCall()
    {
        for ($x = 1; $x <= $this->getLimit(); $x ++) {
            $dataAsArray = $this->populateArray($x);
            $dataAsJSON = $this->arrayToJSON($dataAsArray);
            
            $request = Requests::post($this->getHostName() . $this->getEndpoint(), $this->getHeadersProperty(), $dataAsJSON, $this->getOptionsProperty());
            
            if ($request->status_code == 200) {
                echo "Success! Content was Created <br><br>";
                echo "Content Created is: " . $dataAsJSON . "<br><br>";
            } else {
                echo "Failure! Content was not created - Status code is: " . $request->status_code . "<br><br>";
            }
        }
    }
}
?>
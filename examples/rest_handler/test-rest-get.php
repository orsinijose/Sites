<?php
require_once '../../lib/requests/library/Requests.php';

$urlToPost = 'https://demo.dotcms.com/api/content/query/+ContentType:Blog/limit/2';

$headers = array(
    'Content-Type' => 'application/json'
);
$options = array(
    'auth' => array(
        'admin@dotcms.com',
        'admin'
    )
);

Requests::register_autoloader();

$count = 2;

for($x = 1; $x <= $count ; $x++){
    $dataArray = array(
        'languageId' => '1',
        'stInode' => '2a3e91e4-fbbf-4876-8c5b-2233c1739b05',
        'title' => 'Script for Content Number ' . $x,
        'contentHost' => 'demo.dotcms.com',
        'body' => 'Test Body Goes Here ' . $x
    );
    
    $dataAsJson = json_encode($dataArray);
    echo $dataAsJson . "<br><br>";
    
    $request = Requests::post($urlToPost, $headers, $dataAsJson, $options);
    
    if ($request->status_code == 200) {
        echo "Success! Content was Created <br><br>";
        var_dump($request->body);
    }
}


?>
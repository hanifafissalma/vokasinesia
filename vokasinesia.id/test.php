<?php
    require_once 'vendor/autoload.php';
    session_start();
    $email = 'vokasianalytic@vokasinesia.iam.gserviceaccount.com';    
    $key_file = 'vokasinesia-94d1a396ad05.p12';
    $gaID = '183937397';

    $client = new Google_Client();      
    $client->setApplicationName("Lab-Informatika");
    $key = file_get_contents($key_file);    

    $scopes ="https://www.googleapis.com/auth/analytics.readonly";
    $credential = new Google_Auth_AssertionCredentials($email, array($scopes), $key);

    $client->setAssertionCredentials($credential);
    if($client->getAuth()->isAccessTokenExpired()) {        
        $client->getAuth()->refreshTokenWithAssertion($credential);     
    }

    $service = new Google_Service_Analytics($client);
    $params = array('dimensions' => 'ga:date');
    $data = $service->data_ga->get("ga:{$gaID}", date('Y-m-d', strtotime('today - 20 days')), date("Y-m-d"), "ga:sessions,ga:pageviews", $params);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart Google Analystic</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<table border="1">   
    <tr>     
    <?php foreach($data->getColumnHeaders() as $header) : ?>
        <td colspan="3">
            <b><?php echo $header['name'] ?></b>
        </td>
    <?php endforeach ?>
    </tr>       
    <?php foreach ($data->getRows() as $row) : ?>
    <tr>
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
    </tr> 
    <?php endforeach ?>
    <tr>
        <td colspan="3">
            Rows Returned <?php echo $data->getTotalResults() ?>
        </td>
    </tr>    
</table>
</body>
</html>
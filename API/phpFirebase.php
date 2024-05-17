<?php

//$title=$_POST['title'];
//$body=$_POST['body'];
$title='ahmad';
$body='2022-06-05 11:33:34';
define('API_ACCESS_KEY','AAAASDgUrco:APA91bGlpKsUThJhA32jbQSqB6W_X38313btxI_jmB-Q6TGV8QJxvv5JWFiah8-afesRwKyfBki8qxdILusnpjR3IO6eXCplGyHEO8n6-vBD4rfPuLJRcFDY9lXPn7TIy8OKW3HNNPcb');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

     $notification = [
	 
            'title' =>$title,
            'body' => $body,
            'icon' =>'myIcon', 
            'sound' => 'mySound',
     
        ];
        

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
           'to' => "/topics/moh",
            'data' => $notification,
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];
  
  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        echo $result;

        ?>
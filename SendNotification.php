<?php 

class SendNotification {    

    // Server Key from FCM
    private static $API_SERVER_KEY = 'AAAAzCdp3i4:APA91bGxc68scu568AnrohyaTSzdhqZWSVyXS9o8nFy3wY2laBXxZPhQbH4v_esyvqdKzWZO_5SxrcUTUdPNFLAQ2cS1ueEWMhx2AxJTNge66hCaxlUkmoPTEaeLlcZ7RuVPtsYudA-E';

    public function __construct() {     
     
    }

    public function sendPushNotificationToFCMSever($token, $message) {
        
        $url        = 'https://fcm.googleapis.com/fcm/send';
        
        // This data should be converted into json format while sending curl post fields
        $fields     = array (
            
            'to' => $token, 
            'notification' => array (
                
                    'title' => 'Hi PEXit', 
                    'body' => 'testing', 
                    'priority' => 'high', 
                    'sound'=>'Default'
                    )
            );
        
        // Here Authorization key is Server Key or FCM Token as per this http://pushtry.com/ this site test cases
        $headers    = array(
            
            'Authorization: key=' . self::$API_SERVER_KEY, 
            'Content-Type: application/json'
            );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Optional code
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); // Optional code
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
        $result = curl_exec($ch);
        if ($result === false) {
            
            die('Curl failed: ' . curl_error($ch));
        }
        
        curl_close($ch);
        return $result;
    }
 }
?>
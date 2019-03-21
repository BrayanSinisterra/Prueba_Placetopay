<?php 
require_once '../../vendor/autoload.php';
require_once '../config.php';

use Placetopay\model\PlacetopayModel;

class PlacetopayController {
     
  
    public function Payload(){
        
        $config = new Config(); 
        $placeModel = new PlacetopayModel(
                        $_POST['name'],
                        $_POST['surname'],
                        $_POST['email'],
                        $_POST['documentType'],
                        $_POST['document'],
                        $_POST['street'],
                        $_POST['city'],
                        $_POST['country'],
                        $_POST['reference'],
                        $_POST['description'],
                        $_POST['currency'],
                        $_POST['total']);
	    $seed  =  date('c');
	    $expiration = date('c', strtotime('+1 day'));
	    
    	if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
    	$nonceBase64 = base64_encode($nonce);
    	$tranKey = base64_encode(sha1($nonce . $seed . $config->secretKey, true));

        $auth = array(
            'login'     => $config->login,
            'seed'      => $seed,
            'nonce'     => $nonceBase64,
            'tranKey'   => $tranKey
        );
        
        $address = array(
            'street'            => $placeModel->Street(),
            'city'              => $placeModel->City(),
            'country'           => $placeModel->Country()
        );
        $buyer = array(
            'document'          => $placeModel->Document(),
            'documentType'      => $placeModel->DocumentType(),
            'name'              => $placeModel->Name(),
            'surname'           => $placeModel->Surname(),
            'email'             => $placeModel->Email(),
            'address'           => $address
         );
        
        $amount = array(
            'currency'          => $placeModel->Currency(),
            'total'             => $placeModel->Total()
        );

        $payment = array(
            'reference'         => $placeModel->Reference(),
            'description'       => $placeModel->Description(),
            'amount'            => $amount
        );
   
        $payload = json_encode(array(
            "auth"          => $auth,
            "locale"        => "es_CO", 
            "buyer"         =>  $buyer,
            "payment"       =>  $payment,
            "allowPartial"  =>  false,
            "expiration"    =>  $expiration,
            "returnUrl"     =>  "http://localhost:8080/placetopay/",
            "userAgent"     => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, likeGecko) Chrome/52.0.2743.82 Safari/537.36",
           "ipAddress"      =>  "127.0.0.1"

         ));

        return $payload;
    }

    public function Curl(){
       
    	$url = 'https://test.placetopay.com/redirection/api/session/';
    	$ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->Payload());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        if (! isset($result->processUrl)){
            echo  $result->status->message;
        }
        
        return $result->processUrl;
    }
   
}

$placecontroller = new PlacetopayController();
header('Location: '.$placecontroller->Curl());
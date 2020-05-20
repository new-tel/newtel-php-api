<?php

/**
 * Description of Client
 *
 * @author Дом
 */
class NewtelAPI {

    
    const API_BASE_PATH = 'https://api.new-tel.net/';    
    const API_KEY = '';    
    const API_SIGNATURE = '';    
    
    /**
     *   @var string for save token
     */
    private $authToken;
    
    /**
     *   @var string for save request data in json fromat
     */
    
    private $requestBody;

   /**
   * Construct the Newtel Client.
   *
   * @param array $config
   */
   
    private function setRequestBody($requestBody) {
        $this->requestBody = json_encode($requestBody);        
    }
    
    
    private function setAuthToken( $requestMethod ) {
        $this->authToken =  self::API_KEY . time() . hash('sha256',
            $requestMethod . "\n" .    
            time() . "\n" .
            self::API_KEY . "\n" .
            $this->requestBody . "\n" .
            self::API_SIGNATURE);
    }
    
    public function makeRequest($requestMethod , $requestBody ) {
        $this->setRequestBody($requestBody);
        $this->setAuthToken($requestMethod);
        
        $resId = curl_init();
        curl_setopt_array($resId, [
                CURLINFO_HEADER_OUT => true,
                CURLOPT_HEADER => 0,
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $this->authToken,
                    'Content-Type: application/json',
                ],
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_URL => self::API_BASE_PATH.$requestMethod,
                CURLOPT_POSTFIELDS => $this->requestBody,
                ]);
        return curl_exec($resId);
    }
    
}

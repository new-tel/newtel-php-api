# New-tel php API library 

Welcome to the developer pages for the New-tel php library API. 

## Features 

* CallPassword (Flash call).
* Request a call.
* Autodial call.    

## Requirements
* PHP >= 5.4
* curl libs

## Install

Please use git clone command.

## Basic usage of Newtel-php-api client

For obtaining the API_KEY and API_SIGNATURE please register in our service https://my.new-tel.net/register

```php
<?php
require_once './NewtelAPI.php';

$client = new NewtelApi(
    'API_KEY',
    'API_SIGNATURE'
);

// Execute request to API;
$response = $client->makeRequest( METHOD_NAME , DATA_ARRAY  );
echo $response;
```

## Documentation

Documentation could be found at:    
[RUS documentation]: (https://web.new-tel.net/public/New-Tel%20API%20reference.pdf)    




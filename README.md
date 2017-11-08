# WorkWave
WorkWave API SDK
Documentation of the API https://wwrm.workwave.com/api/

# Create client connection

```php
use SilverSite\WorkWave\Common\Service\AuthenticationHeader;
use SilverSite\WorkWave\Common\ValueObject\AuthKey;
use SilverSite\WorkWave\Common\Service\Client;
use SilverSite\WorkWave\Common\Service\HttpClientFactory;

$authKey = new AuthKey('YOUR API KEY IN UUID FORMAT');
$authHeader = new AuthenticationHeader($authKey);
$httpClientFactory = new HttpClientFactory($authHeader);
$client = new Client($httpClientFactory);
```

# Get Callback URL
```php
$callbackUrl = new GetCallbackUrl($client);
echo $callbackUrl->url();
```

<?php
/**
 * Created by IntelliJ IDEA.
 * User: icovn
 * Date: 08/12/2017
 * Time: 15:21
 */

require __DIR__.'/../vendor/autoload.php';

$httpClient = new net\friend\HttpClient();

$headers = array(
    'key' => 'vcIXD3cK8LchElyTWPq96fIOOwkfnK'
);

$query = array(
    'contact_id' => 20160513857396
);

$result = $httpClient->get(
    'http://market.topicanative.edu.vn/api/useProductAPI/getHistoryUsed',
    'admin', 'admin', $headers, $query
);

print $result->getStatusCode()."\n\n";
print $result->getBody()."\n\n";
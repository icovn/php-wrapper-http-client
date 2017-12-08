<?php
/**
 * Created by IntelliJ IDEA.
 * User: icovn
 * Date: 08/12/2017
 * Time: 15:21
 */

require __DIR__.'/../vendor/autoload.php';

$httpClient = new net\friend\HttpClient();

$headers = null;

$query = array(
    'page' => 2
);

$result = $httpClient->get(
    'https://reqres.in/api/users',
    null, null, $headers, $query
);

print $result->getStatusCode()."\n\n";
print $result->getBody()."\n\n";
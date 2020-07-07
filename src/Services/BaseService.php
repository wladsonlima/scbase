<?php

namespace Crediok\Scbase\Services;

use Crediok\Scbase\Entity\LoginEntity;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;

use function GuzzleHttp\json_decode;

abstract class BaseService
{
    protected  $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => $_ENV["SCBASE_URL"],
            'timeout' => 2.0,
        ]);
    }


    public function login()
    {
        $loginEntity = new LoginEntity($_ENV["SCBASE_USERNAME"], $_ENV["SCBASE_PASSWORD"]);
        $client = $this->httpClient;
        return $this->normalize($client->post('/auth/login', [RequestOptions::JSON => $loginEntity->jsonSerialize()]));
    }


    public function normalize(Response $response)
    {
        $res =  $response->getBody()->getContents();
        if($res != ""){
            return json_decode($res);
        }
        return [];
    }
}

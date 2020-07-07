<?php

namespace Crediok\Scbase\Services;

use Crediok\Scbase\Entity\LoginEntity;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;

use function GuzzleHttp\json_decode;

abstract class BaseService
{


    protected Client $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => "https://ok-api.crediok.com.br",
            'timeout' => 2.0,
        ]);
    }


    public function login()
    {
        $loginEntity = new LoginEntity('marcos', 'Xu@$gDKi9Vn%Jt3I');
        $client = $this->httpClient;
        try {
            return $this->normalize($client->post('/auth/login', [RequestOptions::JSON => $loginEntity->jsonSerialize()]));
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
    }


    public function normalize(Response $response)
    {
        return json_decode($response->getBody()->getContents());
    }
}

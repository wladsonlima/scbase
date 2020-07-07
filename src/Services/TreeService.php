<?php

namespace Crediok\Scbase\Services;

use Crediok\Scbase\Entity\TreeResultEntity;
use GuzzleHttp\RequestOptions;

class TreeService extends BaseService
{
    public function getTreeResultData(string $cpf, $datetime)
    {
        $login = $this->login();

        if (!isset($login->token)) {
            $login = $this->login();
        }

        $treeResult = new TreeResultEntity($cpf, $datetime);

        $res = $this->httpClient->post(
            '/tree/client/data',
            [
                'headers' =>
                    [
                        'Authorization' => "Bearer {$login->token}"
                    ],
                RequestOptions::JSON => $treeResult->jsonSerialize()
            ]
        );
        $data = $this->normalize($res);

        return $data->data->treeResult;
    }
}

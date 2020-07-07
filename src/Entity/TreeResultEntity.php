<?php

namespace Crediok\Scbase\Entity;

use DateTime;

class TreeResultEntity implements \JsonSerializable
{
    private string $Cpf;
    private string $Datetime;

    /**
     * TreeResultEntity constructor.
     * @param string $Cpf
     * @param string $Datetime
     */
    public function __construct(
        string $Cpf,
        string $Datetime
    ) {
        $this->Cpf = $Cpf;
        $this->Datetime = $Datetime;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->Cpf;
    }

    /**
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->Datetime;
    }





    public function jsonSerialize()
    {
        return [
            "Cpf" => $this->getCpf(),
            "Datetime" => $this->getDatetime()
        ];
    }
}

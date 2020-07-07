<?php

namespace Crediok\Scbase\Entity;

class LoginEntity implements \JsonSerializable
{

    private string $Username;
    private string $Password;

    /**
     * LoginEntity constructor.
     * @param $Username
     * @param $Password
     */
    public function __construct($Username, $Password)
    {
        $this->Username = $Username;
        $this->Password = $Password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->Username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->Password;
    }



    public function jsonSerialize()
    {
        return [
            'Username' => $this->getUsername(),
            'Password' => $this->getPassword()
        ];
    }
}

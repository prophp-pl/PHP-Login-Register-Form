<?php

namespace App\Entity;

use Zend\Stdlib\ArraySerializableInterface;

class UserEntity
{
    protected $id;
    protected $email;
    protected $password;
    protected $registrationDate;
    
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }
    
    /**
     * @param array $array
     */
    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                if ($key === 'password') {
                    $value = password_hash($value, PASSWORD_DEFAULT);
                }
                $this->$key = $value;
            }
        }
    }
    /**
     * @return array
     */
    public function getArrayCopy()
    {
        $data = [];
        foreach (get_object_vars($this) as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }
}
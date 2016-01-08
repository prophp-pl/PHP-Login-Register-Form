<?php

namespace App\Db;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\TableIdentifier;
use App\Entity\UserEntity;

class UserTableGateway extends TableGateway
{

    public function __construct(AdapterInterface $adapter)
    {
        $table = new TableIdentifier('users');
        parent::__construct($table, $adapter);
    }
    
    /**
     * Fetch user by id
     * 
     * @param int $id
     * @return array|\ArrayObject|null
     */
    public function fetchById($id)
    {
        return $this->select(['id' => $id])->current();
    }
    
    /**
     * Fetch user by email
     * 
     * @param string $email
     * @return array|\ArrayObject|null
     */
    public function fetchByEmail($email)
    {
        return $this->select(['email' => $email])->current();
    }
    
    /**
     * Check if email address is registered
     * 
     * @param string $email
     * @return boolean
     */
    public function checkEmailIsRegistered($email)
    {
        $result = $this->select(['email' => $email]);
        return ($result->count() > 0) ? true : false;
    }
    
    /**
     * Insert new user
     * 
     * @param UserEntity $user
     * @return int
     */
    public function insertUser(UserEntity $user)
    {
        $data = $user->getArrayCopy();
        unset($data['id'], $data['registrationDate']);
        return $this->insert($data);
    }

}
<?php
require_once dirname(__FILE__).'/BaseDao.Class.php';

class UsersDao extends BaseDao
{
    public function getUserByUsername($username)
    {
        return $this->query("SELECT * FROM users WHERE username = :username", ["username" => $username]);
    }
}
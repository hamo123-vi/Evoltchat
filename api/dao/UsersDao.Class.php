<?php
require_once dirname(__FILE__).'/BaseDao.Class.php';

class UsersDao extends BaseDao
{
    public function getUserByUsername($username)
    {
        return $this->queryUnique("SELECT * FROM users WHERE username = :username LIMIT 1 OFFSET 0", ["username" => $username]);
    }

    public function getUserById($id)
    {
        return $this->queryUnique("SELECT * FROM users WHERE id = :id LIMIT 1 OFFSET 0", ["id" => $id]);
    }

    public function getActiveUsers()
    {
        return $this->query("SELECT * FROM users
				WHERE active = true", []);
    }

    public function insertUser($user)
    {
        $this->insert("users", $user);
    }

    public function updateActivity($username, $user)
    {
        $this->update("users", $username, $user, $id_column = "username");
    }

    public function updateNoveltyStatus($id, $user)
    {
        $this->update("users", $id, $user, $id_column = "id");
    }
}
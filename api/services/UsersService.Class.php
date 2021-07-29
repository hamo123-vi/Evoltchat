<?php 
    require_once dirname(__FILE__)."/../dao/UsersDao.Class.php";
    require_once dirname(__FILE__)."/../UsernameGenerator.Class.php";
    require_once dirname(__FILE__)."/../Config.Class.php";
    use \Firebase\JWT\JWT;
    class UsersService 
    {
        
        private $dao;
        public function __construct()
        {
            $this->dao=new UsersDao();
        }

        public function loadActiveUsers()
        {
            return $this->dao->getActiveUsers();
        }

        public function register($user)
        {
            $generator=new UsernameGenerator();
            $user=[
                    "username" => 'user_' . $generator->generateRandomString(),
                    "password" => sha1($user['password']),
                ];
            $this->dao->insertUser($user);
            $db_user=$this->dao->getUserByUsername($user['username']);
            $this->dao->updateActivity($db_user['username'], ['active' => $db_user['active']+1]);
            $db_user=$this->dao->getUserByUsername($user['username']);
            $jwt = JWT::encode(["id" => $db_user["id"], "username" => $db_user["username"]], Config::JWT_SECRET);
            return ['jwt' => $jwt, 'id' => $db_user['id'], 'username' => $db_user['username']];
        }

        public function login($user)
        {
            $db_user=$this->dao->getUserByUsername($user['username']);
            if(!isset($db_user['id'])) throw new Exception("Pogrešna kombinacija korisničkog imena i lozinke", 400);
            if($db_user['password'] != sha1($user['password'])) throw new Exception("Pogrešna kombinacija korisničkog imena i lozinke", 400);
            $this->dao->updateActivity($db_user['username'], ['active' => $db_user['active']+1]);
            $db_user=$this->dao->getUserByUsername($user['username']);
            $jwt = JWT::encode(["id" => $db_user["id"], "username" => $db_user["username"]], Config::JWT_SECRET);
            return ['jwt' => $jwt, 'id' => $db_user['id'], 'username' => $db_user['username']];
        }

        public function logout($user)
        {
            $db_user=$this->dao->getUserByUsername($user['username']);
            $this->dao->updateActivity($db_user['username'], ["active" => $db_user['active']-1]);
        }

       
    }
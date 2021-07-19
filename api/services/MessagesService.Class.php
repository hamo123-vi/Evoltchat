<?php 
    require_once dirname(__FILE__)."/../dao/MessagesDao.Class.php";
    #use \Firebase\JWT\JWT;
    class MessagesService 
    {
        
        private $dao;
        public function __construct()
        {
            $this->dao=new MessagesDao();
        }

        public function loadMessages()
        {
            return $this->dao->getMessages();
        }

        public function sendMessage($message)
        {
            $this->dao->sendMessage($message);
        }

       
    }
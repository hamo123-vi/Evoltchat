<?php
require_once dirname(__FILE__).'/BaseDao.Class.php';

class MessagesDao extends BaseDao
{
    public function getMessages()
    {
        return $this->query("SELECT * FROM messages", []);
    }

    public function sendMessage($message)
    {
        $this->insert("messages", $message);
    }
}
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/BaseDao.Class.php";

$basedao=new BaseDao();
try{
$basedao->insert("users", ['username' => 'test002','password' => 'inserted123']);
echo "Inserted succesfully";
}
catch (Exception $e)
{
    echo $e->getMessage();
}
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/BaseDao.Class.php";

$basedao=new BaseDao();
try{
$basedao->update("users", 1, ['password' => 'updated123']);
echo "Updated succesfully";
}
catch (Exception $e)
{
    echo $e->getMessage();
}
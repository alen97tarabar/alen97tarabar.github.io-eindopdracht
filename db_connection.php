<?php

//Development Connection
//$dsn = 'mysql:dbname=cv_website;host=localhost';
//$user = 'root';
//$password = '';

//$db = new PDO($dsn, $user, $password);

//remote connection

try {
    $dsn = 'mysql:dbname=HINVquFDbs;host=remotemysql.com';
    $user = 'HINVquFDbs';
    $password = 'BTySh59Ugr';

    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

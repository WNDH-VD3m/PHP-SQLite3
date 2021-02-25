<?php

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('demo4.db');
    }
}

$db = new MyDB();

if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Opened database successfully\n";
}

$sql1 =<<<EOF

CREATE TABLE login 
(  
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    confirm VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
    
);
EOF;

$ret = $db->exec($sql1);

if(!$ret){
    echo $db->lastErrorMsg();
} else {
    echo "Table created successfully\n";
}


$db->close();

?>






























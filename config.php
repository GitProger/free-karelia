<?php
/**!!! database must have default UTF8 encoding
[client]
default-character-set = utf8

[mysqld]
character-set-server = utf8
collation-server = utf8_unicode_ci

[mysql]
default-character-set = utf8
-------------
ALTER DATABASE databasename CHARACTER SET utf8 COLLATE utf8_unicode_ci;
*/

$conf = [
    "server" => "127.0.0.1",
    "user" => "user",
    "password" => "pass",
    "dbname" => "free_karelia"
];

?>
# xampp - ポート変更

[参考](https://itsakura.com/xampp-port)

## MySQLのポート番号を変更する

MySQLのConfigボタンをクリックし、my.iniをクリックします。

```
[client]
# password       = your_password 
#port=3306 <- ここを下のように書き換え
port=3309
socket="D:/xampp/mysql/mysql.sock"
```

```
# The MySQL server
default-character-set=utf8mb4
[mysqld]
#port=3306 <- ここを下のように書き換え
port=3309
socket="D:/xampp/mysql/mysql.sock"
```


### phpMyAdminに接続する場合

`\xampp\phpMyAdmin\config.inc.php`ファイルにアクセス

```
/* Bind to the localhost ipv4 address and tcp */
/* $cfg['Servers'][$i]['host'] = '127.0.0.1'; */　<- ここを下のように書き換え
$cfg['Servers'][$i]['host'] = '127.0.0.1:3309';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
```

## phpからphpMyAdminに接続

`DSN`変数の`localhost:3309`のほうで接続

```php
class DB
{
    public const DSN = "mysql:host=localhost:3309; dbname=support; charset=utf8mb4";
    // public const DSN = "mysql:host=localhost; dbname=support; charset=utf8mb4";
    public const USER = "root";
    public const PASS = "";
    public $error_message = [];
    protected $pdo;
```

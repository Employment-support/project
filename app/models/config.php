<?php
// root以外で
// DB接続

class DB
{
    public const DSN = "mysql:host=localhost:3306; dbname=support; charset=utf8mb4";
    // public const DSN = "mysql:host=employment-support.cluster-cn3srovxz5ja.ap-northeast-1.rds.amazonaws.com; post=3306; dbname=support2; charset=utf8mb4";
    // public const USER = "admin";
    // public const PASS = "T5p3zcjw";
    public const USER = "root";
    public const PASS = "";
    public $error_message = [];
    protected $pdo;
    # データベース接続
    function __construct()
    {
        try {
            $this->pdo = new PDO(self::DSN, self::USER, self::PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // echo '接続に成功しました。';
            // return $this->pdo;
        } catch (PDOException $e) {
            return false;
        }
    }

    // 単一
    function select($id, $sql)
    {
        /*
        $id: id
        $sql: 各クラス内のsql文
        */
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(1, $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            return false;
        }
    }

    // 一覧表示
    function selectAll($sql)
    {
        /*
        $sql: 各クラス内のsql文
        */
        try{
            $stmt = $this->pdo->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            return false;
        }
    }

    // 削除時間
    function deleteTime($id, $sql)
    {
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(1, $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // 削除Boole値
    function deleteBoole(int $id, $value, bool $draft_flag, $sql)
    {
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(1, $value);
            $stmt -> bindValue(2, $draft_flag);
            $stmt -> bindValue(3, $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

}
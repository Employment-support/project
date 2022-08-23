<?php

// 登録    
function create(){

}
// 変更
function update(){

}
// 削除
function delete(){

}
// 単一
function select(){

}
// 一覧表示
function selectAll(){

}


// root以外で
// DB接続
class DB
{
    // public const DSN = "mysql:host=localhost:3309; dbname=support; charset=utf8mb4";
    public const DSN = "mysql:host=localhost; dbname=support; charset=utf8mb4";
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

// ホーム画面表示


// 企業説明会まとめ
// ファイル名を保存するカラムを作ってフォルダに保存されるファイル名をかぶらないようにする
// もしくはファイル名の日付と時間をくっつける
class Briefings extends DB
{
    public const sqlSelect = "SELECT * FROM briefings WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM briefings";
    public const sqlDeleteTime = "UPDATE briefings SET delete_at = NOW() WHERE id = ?";
    // 登録    
    function create(string $corporate, string $contents, string $corporate_url, string $info, string $img_path, int $corporation_id, int $user_id)
    /*
    $corporate:string型 型企業名
    $contents:string型 型内容
    $corporate_url:string型 型企業URL
    $info:string型 型企業情報
    $img_path:string型 型画像
    $corporation_id:int型 企業ジャンル一覧ID
    $user_id:int型 ユーザID
    */
    {

        $sql = "INSERT INTO briefings(
                    corporate,
                    contents,
                    corporate_url,
                    info,
                    img_path,
                    corporation_id,
                    user_id,
                    created_at,
                    update_at
                VALUES (
                    :corporate,
                    :contents,
                    :corporate_url,
                    :info,
                    :img_path,
                    :corporation_id,
                    :user_id,
                    NOW(),
                    NOW())";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(":corporate", $corporate, PDO::PARAM_STR);
            $stmt -> bindValue(":contents", $contents, PDO::PARAM_STR);
            $stmt -> bindValue(":corporate_url", $corporate_url, PDO::PARAM_STR);
            $stmt -> bindValue(":info", $info, PDO::PARAM_STR);
            $stmt -> bindValue(":img_path", $img_path, PDO::PARAM_STR);
            $stmt -> bindValue(":corporation_id", $corporation_id, PDO::PARAM_INT);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    // 変更
    function update(int $id, string $corporate, string $contents, string $corporate_url, string $info, string $img_path, int $corporation_id, int $user_id)
    {
        /*
        $id:int型 コンテンツID
        $corporate:string型 企業名
        $contents:string型 内容
        $corporate_url:string型 企業URL
        $info:string型 企業情報
        $img_path:string型 画像
        $corporation_id:int型 企業ジャンル一覧ID
        $user_id:int型 ユーザID
        */

        $sql = "UPDATE briefings 
                    SET corporate=:corporate,
                        contents=:contents,
                        corporate_url=:corporate_url,
                        info=:info,
                        img_path=:img_path,
                        corporation_id=:corporation_id,
                        update_at=NOW()
                    WHERE id=:id AND user_id=:user_id";


        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(":id", $id, PDO::PARAM_INT);
            $stmt -> bindValue(":corporate", $corporate, PDO::PARAM_STR);
            $stmt -> bindValue(":contents", $contents, PDO::PARAM_STR);
            $stmt -> bindValue(":corporate_url", $corporate_url, PDO::PARAM_STR);
            $stmt -> bindValue(":info", $info, PDO::PARAM_STR);
            $stmt -> bindValue(":img_path", $img_path, PDO::PARAM_STR);
            $stmt -> bindValue(":corporation_id", $corporation_id, PDO::PARAM_INT);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            echo '変更完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


}


// 担任情報共有 ファイルパス
class Shares extends DB
{
    public const sqlSelect = "SELECT * FROM shares WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM shares";
    public const sqlDeleteTime = "UPDATE shares SET delete_at = NOW() WHERE id = ?";

    // 登録    
    function create(string $title, string $contents, int $user_id, $file_path)
    {
        /*
        $title:string型 タイトル
        $contents:string型 内容
        $user_id:int型 ユーザID
        */
        $sql = "INSERT INTO shares(
                                title, 
                                contents, 
                                user_id, 
                                created_at, 
                                update_at)
                            VALUES (
                                :title,
                                :contents,
                                :user_id,
                                NOW(), 
                                NOW()
                            )";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(":title", $title, PDO::PARAM_STR);
            $stmt -> bindValue(":contents", $contents, PDO::PARAM_STR);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_STR);
            $stmt->execute();
            echo '登録完了'; // テスト用
        } catch (PDOException $e) {
            return false;
        }

        // 最後にINSERTした数字の取得
        $share_id = $this->pdo->lastInsertId();

        // ファイルの保存
        $sql = "INSERT INTO files(
                                file_path, 
                                share_id)
                            VALUES (
                                :file_path
                                :share_id)";

        try {
            $stmt = $this->pdo->prepare($sql);
            // ファイルが複数の処理を考える　
            // ファイル名を保存するカラムを作ってフォルダに保存されるファイル名をかぶらないようにする
            // foreach ($file_path as $file_path) {}
            $stmt -> bindValue(":file_path", $file_path, PDO::PARAM_STR);
            $stmt -> bindValue(":share_id", $share_id, PDO::PARAM_INT);
            $stmt->execute();
            echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }
    // 変更
    function update($title, $contents, $id, $user_id)
    {
        /*
        $title:string タイトル
        $contents:string 内容
        $id:int コンテンツid
        $user_id:int ユーザID
        */
        $sql = "UPDATE shares
                    SET title=:title,
                        contents=:contents,
                        update_at=NOW()
                    WHERE id=:id, AND user_id=:user_id";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(":title", $title, PDO::PARAM_STR);
            $stmt -> bindValue(":contents", $contents, PDO::PARAM_STR);
            $stmt -> bindValue(":id", $id, PDO::PARAM_INT);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            echo '変更完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

}

// 学歴
class Historys extends DB
{
    // 登録    
    function create()
    {

    }
    // 変更
    function update()
    {

    }
}

// スキルセットアイテム一覧_履歴書 中間テーブル
class SkillItemsResumes extends DB
{
    // 登録    
    function create()
    {

    }
    // 変更
    function update()
    {

    }
}

// ユーザ資格免許一覧
class UserAbilites extends DB
{
    // 登録    
    function create()
    {

    }
    // 変更
    function update()
    {

    }
}

// 履歴書作成、保存、PDF出力
class Resumes extends DB
{
    // 登録    
    function create($year, $month, $day, 
    $postal_code, $address, $address_furigana, 
    $home_tel, $mobile_tel, $email, 
    $address2, $address2_furigana, $tel, 
    $station_line, $station, $img_path, 
    $hope, $desire, $pr, 
    $personality, $hobby, $other, int $user_id,
    array $historys, array $abilites, array $skillItems)
    {
        /*
        $year:string 年
        $month:string 月
        $day:string 日
        $postal_code:string 郵便番号
        $address:string 住所
        $address_furigana:string 住所ふりがな
        $home_tel:string 自宅電話
        $mobile_tel:string 携帯電話
        $email:string メール
        $address2:string 住所2
        $address2_furigana:string 住所ふりがな2
        $tel:string 電話
        $station_line:string 最寄駅(線)
        $station:string 最寄駅(駅)
        $img_path:string 宣材写真
        $hope:string 希望職種
        $desire:string 志望動機
        $pr: 自string己PR
        $personality:string 性格
        $hobby:string 趣味
        $other:string その他
        $user_id:string ユーザID
        $historys:array 学歴リスト
        $abilites:array 資格リスト
        $skillItems:array スキルリスト
        */
        $sql = "INSERT INTO `resumes`(
                                    year, month, day,
                                    postal_code, address, address_furigana,
                                    home_tel, mobile_tel, email,
                                    address2, address2_furigana, tel,
                                    station_line, station, img_path,
                                    hope, desire, pr,
                                    personality, hobby, other,
                                    user_id, created_at, update_at)
                                VALUES (
                                    :year, :month, :day,
                                    :postal_code, :address, :address_furigana,
                                    :home_tel, :mobile_tel, :email,
                                    :address2, :address2_furigana, :tel,
                                    :station_line, :station, :img_path,
                                    :hope,:desire,:pr,
                                    :personality, :hobby, :other,
                                    :user_id, NOW(), NOW()
                                )";
        // 履歴書
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(":year", $year, PDO::PARAM_STR);
            $stmt -> bindValue(":month", $month, PDO::PARAM_STR);
            $stmt -> bindValue(":day", $day, PDO::PARAM_STR);
            $stmt -> bindValue(":postal_code", $postal_code, PDO::PARAM_STR);
            $stmt -> bindValue(":address", $address, PDO::PARAM_STR);
            $stmt -> bindValue(":address_furigana", $address_furigana, PDO::PARAM_STR);
            $stmt -> bindValue(":home_tel", $home_tel, PDO::PARAM_STR);
            $stmt -> bindValue(":mobile_tel", $mobile_tel, PDO::PARAM_STR);
            $stmt -> bindValue(":email", $email, PDO::PARAM_STR);
            $stmt -> bindValue(":address2", $address2, PDO::PARAM_STR);
            $stmt -> bindValue(":address2_furigana", $address2_furigana, PDO::PARAM_STR);
            $stmt -> bindValue(":tel", $tel, PDO::PARAM_STR);
            $stmt -> bindValue(":station_line", $station_line, PDO::PARAM_STR);
            $stmt -> bindValue(":station", $station, PDO::PARAM_STR);
            $stmt -> bindValue(":img_path", $img_path, PDO::PARAM_STR);
            $stmt -> bindValue(":hope", $hope, PDO::PARAM_STR);
            $stmt -> bindValue(":desire", $desire, PDO::PARAM_STR);
            $stmt -> bindValue(":pr", $pr, PDO::PARAM_STR);
            $stmt -> bindValue(":personality", $personality, PDO::PARAM_STR);
            $stmt -> bindValue(":hobby", $hobby, PDO::PARAM_STR);
            $stmt -> bindValue(":other", $other, PDO::PARAM_STR);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            echo '変更完了'; // テスト用

            // 最後に登録されたIDの取得
            $id = $this->pdo->lastInsertId();
            // 学歴があれば処理がされる
            if (empty($historys)){
                $history_lists = new Historys();
            }
            
            // 資格があれば処理がされる
            if (empty($abilites)){
                $abilites_lists = new UserAbilites();
            }
            
            // スキルセットがあれば処理がされる
            if (empty($skillItems)){
                $skillItems_lists = new SkillItemsResumes();
            }

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    // 変更
    function update(int $id, $year, $month, $day, 
    $postal_code, $address, $address_furigana, 
    $home_tel, $mobile_tel, $email, 
    $address2, $address2_furigana, $tel, 
    $station_line, $station, $img_path, 
    $hope, $desire, $pr, 
    $personality, $hobby, $other, int $user_id)
    {
        /*
        $id : コンテンツid
        */
        $sql = "UPDATE `resumes`
                    SET year = :year,
                        month = :month,
                        day = :day,
                        postal_code = :postal_code,
                        address = :address,
                        address_furigana = :address_furigana,
                        home_tel = :home_tel,
                        mobile_tel = :mobile_tel,
                        email = :email,
                        address2 = :address2,
                        address2_furigana = :address2_furigana,
                        tel = :tel,
                        station_line = :station_line,
                        station = :station,
                        img_path = :img_path,
                        hope = :hope,
                        desire = :desire,
                        pr = :pr,
                        personality = :personality,
                        hobby = :hobby,
                        other = :other,
                        update_at = NOW()
                    WHERE id = :id ADD user_id = :user_id";
        // 履歴書
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(":year", $year, PDO::PARAM_STR);
            $stmt -> bindValue(":month", $month, PDO::PARAM_STR);
            $stmt -> bindValue(":day", $day, PDO::PARAM_STR);
            $stmt -> bindValue(":postal_code", $postal_code, PDO::PARAM_STR);
            $stmt -> bindValue(":address", $address, PDO::PARAM_STR);
            $stmt -> bindValue(":address_furigana", $address_furigana, PDO::PARAM_STR);
            $stmt -> bindValue(":home_tel", $home_tel, PDO::PARAM_STR);
            $stmt -> bindValue(":mobile_tel", $mobile_tel, PDO::PARAM_STR);
            $stmt -> bindValue(":email", $email, PDO::PARAM_STR);
            $stmt -> bindValue(":address2", $address2, PDO::PARAM_STR);
            $stmt -> bindValue(":address2_furigana", $address2_furigana, PDO::PARAM_STR);
            $stmt -> bindValue(":tel", $tel, PDO::PARAM_STR);
            $stmt -> bindValue(":station_line", $station_line, PDO::PARAM_STR);
            $stmt -> bindValue(":station", $station, PDO::PARAM_STR);
            $stmt -> bindValue(":img_path", $img_path, PDO::PARAM_STR);
            $stmt -> bindValue(":hope", $hope, PDO::PARAM_STR);
            $stmt -> bindValue(":desire", $desire, PDO::PARAM_STR);
            $stmt -> bindValue(":pr", $pr, PDO::PARAM_STR);
            $stmt -> bindValue(":personality", $personality, PDO::PARAM_STR);
            $stmt -> bindValue(":hobby", $hobby, PDO::PARAM_STR);
            $stmt -> bindValue(":other", $other, PDO::PARAM_STR);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt -> bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            echo '変更完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

// ポートフォリオ
class Portfolio extends DB
{
    // 登録    
    function create($title, $contents, $item_url, $img_path, $user_id)
    {
        /*
        $title: タイトル
        $contents: 内容
        $item_url: URL
        $img_path: 画像
        $user_id: ユーザID
        */
        $sql = "INSERT INTO portfolio(
                            title,
                            contents,
                            item_url,
                            img_path,
                            user_id,
                            created_at,
                            update_at)
                        VALUES (
                            :title,
                            :contents,
                            :item_url,
                            :img_path,
                            :user_id,
                            NOW(),
                            NOW()
                        )";

        try {
            $stmt = $this->pdo->prepare($sql);
            // ファイルが複数の処理を考える
            // foreach ($file_path as $file_path) {}
            $stmt -> bindValue(":title", $title, PDO::PARAM_STR);
            $stmt -> bindValue(":contents", $contents, PDO::PARAM_STR);
            $stmt -> bindValue(":item_url", $item_url, PDO::PARAM_STR);
            $stmt -> bindValue(":img_path", $img_path, PDO::PARAM_STR);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    // 変更
    function update($id, $title, $contents, $item_url, $img_path, $user_id)
    {
        $sql = "UPDATE portfolio 
                    SET title = :title,
                        contents = :contents,
                        item_url = :item_url,
                        img_path = :img_path,
                        update_at = NOW()
                    WHERE id = :id ADD user_id = :user_id";

        try {
            $stmt = $this->pdo->prepare($sql);
            // ファイルが複数の処理を考える
            // foreach ($file_path as $file_path) {}
            $stmt -> bindValue(":title", $title, PDO::PARAM_STR);
            $stmt -> bindValue(":contents", $contents, PDO::PARAM_STR);
            $stmt -> bindValue(":item_url", $item_url, PDO::PARAM_STR);
            $stmt -> bindValue(":img_path", $img_path, PDO::PARAM_STR);
            $stmt -> bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt -> bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

// 口コミ
class Reviews extends DB
{
    // 登録    
    function create()
    {

    }
    // 変更
    function update()
    {

    }

}






<?php

require_once __DIR__ . '/config.php';

// エラー処理を書く
// sqlが違うだけで処理が同じだから一緒できる
// 所属
class Belongs extends DB
{
    public const sqlSelect = "SELECT * FROM belongs WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM belongs ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE belongs SET type = ?, draft_flag = ? WHERE id = ?";

    // 登録
    function create($value)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO belongs(type) VALUES (?)");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }

    // 更新
    function update($id, $value)
    {
        /*
        $id: コンテンツID
        */
        try {
            $stmt = $this->pdo->prepare("UPDATE belongs SET type = ? WHERE id = ?");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }
}

// 学科一覧
class Departments extends DB
{
    public const sqlSelect = "SELECT * FROM departments WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM departments ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE departments SET department = ?, draft_flag = ? WHERE id = ?";

    // 登録
    function create($value)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO departments(department) VALUES (?)");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }

    // 更新
    function update($id, $value)
    {
        /*
        $id: コンテンツID
        */
        try {
            $stmt = $this->pdo->prepare("UPDATE departments SET department = ? WHERE id = ?");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }
}

// 専攻一覧
class Majors extends DB
{
    public const sqlSelect = "SELECT * FROM majors WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM majors ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE majors SET major = ?, draft_flag = ? WHERE id = ?";

    // 登録
    function create($value)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO majors(major) VALUES (?)");
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }

    // 更新
    function update($id, $value)
    {
        /*
        $id: コンテンツID
        */
        try {
            $stmt = $this->pdo->prepare("UPDATE majors SET major = ? WHERE id = ?");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }
}

// 資格一覧
class Abilites extends DB
{
    public const sqlSelect = "SELECT * FROM abilites WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM abilites ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE abilites SET ability = ?, draft_flag = ? WHERE id = ?";

    // 登録
    function create($value)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO abilites(ability) VALUES (?)");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }

    // 更新
    function update($id, $value)
    {
        /*
        $id: コンテンツID
        */
        try {
            $stmt = $this->pdo->prepare("UPDATE abilites SET ability = ? WHERE id = ?");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }
}

// スキルセット区別一覧
class SkillSortings extends DB
{
    public const sqlSelect = "SELECT * FROM skill_sortings WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM skill_sortings ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE skill_sortings SET sorting_name = ?, draft_flag = ? WHERE id = ?";

    // 登録
    function create($value)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO skill_sortings(sorting_name) VALUES (?)");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }

    // 更新
    function update($id, $value)
    {
        /*
        $id: コンテンツID
        */
        try {
            $stmt = $this->pdo->prepare("UPDATE skill_sortings SET sorting_name = ? WHERE id = ?");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }
}

// スキルセットアイテム一覧
class SkillItems extends DB
{
    public const sqlSelect = "SELECT * FROM skill_items WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM skill_items ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE skill_items SET sorting_name = ?, draft_flag = ? WHERE id = ?";

    // 登録
    function create($value, $skill_sortings_id)
    {
        /*
        $skill_sortings_id: skill_sortingsテーブルのID
        */
        try {
            $stmt = $this->pdo->prepare("INSERT INTO skill_items(name, skill_sortings_id) VALUES (?, ?)");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $skill_sortings_id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }

    // 更新
    function update($id, $value, $skill_sortings_id)
    {
        /*
        $id: コンテンツID
        $skill_sortings_id: skill_sortingsテーブルのID
        */
        try {
            $stmt = $this->pdo->prepare("UPDATE skill_items SET name = ?, skill_sortings_id = ? WHERE id = ?");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $skill_sortings_id, PDO::PARAM_INT);
            $stmt -> bindValue(3, $id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }
}

// 企業ジャンル一覧
class Corporations extends DB
{
    public const sqlSelect = "SELECT * FROM corporations WHERE id = ?";
    public const sqlSelectAll = "SELECT * FROM corporations ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE corporations SET genre = ?, draft_flag = ? WHERE id = ?";

    // 登録
    function create($value)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO corporations(genre) VALUES (?)");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }

    // 更新
    function update($id, $value)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE corporations SET genre = ? WHERE id = ?");
        
            $stmt -> bindValue(1, $value, PDO::PARAM_STR);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            // echo '登録完了'; // テスト用
            return true;
        } catch (PDOException $e) {
            return $e->getMessage;
        }
    }
}
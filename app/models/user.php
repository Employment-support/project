<?php
// include "model.php";

// ユーザーに関するもの
class User extends DB
{
    public const sqlSelect = "SELECT * FROM users WHERE id = ?";
    public const sqlSelect2 = "SELECT * FROM users 
                INNER JOIN belongs ON users.type_id = belongs.id 
                INNER JOIN departments ON users.department_id = departments.id 
                INNER JOIN majors ON users.major_id = majors.id 
                WHERE users.id = ?";

    public const sqlSelectAll = "SELECT * FROM users ORDER BY id ASC";
    public const sqlDeleteBoole = "UPDATE users SET type = ?, draft_flag = ? WHERE id = ?";
    // 登録
    function create(string $email, string $name, string $name_hiragana, string $password, int $gender, string $student_number, int $department_id, int $major_id, int $type_id)
    {
        // 同じメールアドレスのチェックが必要
        // if ($student_number == ""){
        //     array_push($error_message, '番号がありません');
        // }

        if ($password == "") {
            array_push($error_message, 'パスワードがありません');
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        
        if (empty($error_message)){

            $sql = "INSERT INTO users(
                        email, name, name_hiragana,
                        password, gender, student_number,
                        department_id, major_id, type_id,
                        admin, created_at, delete_at)
                    VALUES (
                        :email, :name, :name_hiragana, 
                        :password, :gender, :student_number,
                        :department_id, :major_id, :type_id,
                        :admin, NOW(), NOW())";

            try {
                $stmt = $this->pdo->prepare($sql);

                $stmt -> bindValue(":email", $email, PDO::PARAM_STR);
                $stmt -> bindValue(":name", $name, PDO::PARAM_STR);
                $stmt -> bindValue(":name_hiragana", $name_hiragana, PDO::PARAM_STR);
                $stmt -> bindValue(":gender", $gender, PDO::PARAM_STR);
                $stmt -> bindValue(":department_id", $department_id, PDO::PARAM_INT);
                $stmt -> bindValue(":major_id", $major_id, PDO::PARAM_INT);
                $stmt -> bindValue(":type_id", $type_id, PDO::PARAM_INT);
                $stmt -> bindValue(":student_number", $student_number, PDO::PARAM_STR);
                $stmt -> bindValue(":password", $password, PDO::PARAM_STR);
                $stmt -> bindValue(":admin", FALSE, PDO::PARAM_BOOL);
                $stmt->execute();
                echo '登録完了';
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        } else {
            return $error_message;
        }

    }

    // 情報更新
    function update()
    {
       
    }

    // ユーザー削除
    function delete($student_number)
    {
        $sql = "UPDATE users SET delete_at = NOW() WHERE student_number = ?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(1, $student_number);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    // ユーザー情報取得
    // function inf($student_number)
    // {
    //     try{
    //         $stmt = $this->pdo->prepare("SELECT * FROM users WHERE student_number = ?");
    //         $stmt -> bindValue(1, $student_number);
    //         $stmt->execute();
    //         $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //         return $data;
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }

}
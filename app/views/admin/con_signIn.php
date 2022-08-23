<form method="post">
    <table>
        <tr>
            <label>
                <th>メール</th>
                <td><input type="email" name="email" required></td>
            </label>
        </tr>
        <tr>
            <label>
                <th>氏名</th>
                <td><input type="text" name="last_name" required></td>
            </label>
        </tr>
        <tr>
            <label>
                <th>名前</th>
                <td><input type="text" name="first_name" required></td>
            </label>
        </tr>
        <tr>
            <label>
                <th>氏名(ひらがな)</th>
                <td><input type="text" name="last_name_hiragana" pattern="(?=.*?[\u3041-\u309F])[\u3041-\u309F\s]*" required="ひらがな以外が入っている"></td>
            </label>
        </tr>
        <tr>
            <label>
                <th>名前(ひらがな)</th>
                <td><input type="text" name="first_name_hiragana" pattern="(?=.*?[\u3041-\u309F])[\u3041-\u309F\s]*" required="ひらがな以外が入っている"></td>
            </label>
        </tr>
        <tr>
            <label>
                <th>学生番号/担任番号</th>
                <td><input type="number" name="student_number" required='番号の入力'></td>
            </label>
        </tr>
        <tr>
            <th>性別</th>
            <td colspan="2">
                <label>男<input type="radio" name="gender" value="1" required></label>
                <label>女<input type="radio" name="gender" value="2" required></label>
            </td>
        </tr>
        <tr>
            <th>学科</th>
            <?php foreach ($department_lists as $department_list):?>
                <td>
                    <label>
                        <input type="radio" name="department" value="<?= $department_list["id"]?>" required><?= $department_list["department"]?>
                    </label>
                </td>
            <?php endforeach;?>
        </tr>
        <tr>
            <th>専攻</th>
            <?php foreach ($major_lists as $major_list):?>
                <td>
                    <label>
                        <input type="radio" name="major" value="<?= $major_list["id"]?>" required><?= $major_list["major"]?>
                    </label>
                </td>
            <?php endforeach;?>
        </tr>
        <tr>
            <th>タイプ</th>
            <?php foreach ($belong_lists as $belong_list):?>
                <td>
                <label>
                    <input type="radio" name="type" value="<?= $belong_list["id"]?>" required><?= $belong_list["type"]?>
                </label>
                </td>
            <?php endforeach;?>
        </tr>
        <tr>
            <label>
                <th>パスワード</th>
                <td><input type="password" name="password" required></td>
            </label>
        </tr>
        <tr>
            <label>
                <th>管理者権限</th>
                <td><input type="checkbox" name="admin"></td>
            <label>
        </tr>
        <tr>
            <td>
            <input type="submit" value="send">
            </td>
        </tr>
    </table>
</form>

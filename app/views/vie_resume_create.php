<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>履歴書</title>
    <link rel="stylesheet" href="../static/css/resume.css">
</head>
<body>
    <form action="" method="POST">
        <table>
            <td colspan="2" class="td85"><input type="date" name="creation" required></td>
            <td></td>
        </table>
        <table border="1">
            <tr>
                <th rowspan="2"><p>氏名</p></th>
                <td class="td15"><p>ふりがな</p></td>
                <td class="lightgrey">
                    <!-- データベースから表示 -->
                    <p>なんば むった</p>
                    <!--  -->
                </td>
                <td class="td5 lightgrey">
                    <!-- データベースから表示 -->
                    <p>男</p>
                    <!--  -->

                    <!-- <label for="male"><input type="radio" name="gender" value="male" id="male" required>男</label>
                    <label for="female"><input type="radio" name="gender" value="female" id="female">女</label> -->
                </td>
                <td rowspan="3" class="td15">
                    <img src="https://koyamachuya.com/wp-content/uploads/2016/11/character-mutta-1.png">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="lightgrey">
                    <!-- データベースから表示 -->
                    <p><h1>南波 六太</h1></p>
                    <!--  -->
                </td>
            </tr>
            <tr>
                <th><p>生年月日</p></th>
                <td colspan="3"><p><input type="date" name="birthday" required>（満○○歳）</p></td>
                <!-- <td colspan="3">
                    <p>
                        <select name="birthday_year" required>
                            <option value="1900">1900</option>
                            <option value="3000">3000</option>
                        </select>年
                        <select name="birthday_month" required>
                            <option value="01">01</option>
                            <option value="06">06</option>
                            <option value="12">12</option>
                        </select>月
                        <select name="birthday_day" required>
                            <option value="01">01</option>
                            <option value="15">15</option>
                            <option value="31">31</option>
                        </select>日
                        （満○○歳）
                    </p>
                </td> -->
            </tr>
        </table>
        <table border="1">
            <tr>
                <th rowspan="3"><p>現住所</p></th>
                <td>
                    <p>〒<input type="number" placeholder="1002100" name="postalcode" id="postalcode" required><input type="button" value="住所検索"></p>
                    <!-- データベースから表示 -->
                    <p><input type="text" placeholder="ふりがな" name="address_furigana" required></p>
                    <p><input type="text" name="address" required></p>
                    <!--  -->
                </td>
                <th><p>最寄り駅</p></th>
                <td>
                    <p><input type="text" placeholder="四つ橋" name="nearest_line" required>線</p>
                    <p><input type="text" placeholder="四つ橋" name="nearest_station" required>駅</p>
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    <p><input type="text"></p>
                </td>
                <th><p>電話</p></th>
                <td>
                    <p>自宅<input type="tel" placeholder="0123456789" name="tel_home" required></p>
                    <p>携帯<input type="tel" placeholder="01012345678" name="tel_mobile" required></p>
                </td>
            </tr>
            <tr>     
                <th><p>メール</p></th>
                <td>
                    <p><input type="email" name="email" required></p>
                </td>
            </tr>
            <tr>
                <th><p>緊急連絡先</p></th>
                <td>
                    <p><input type="text" placeholder="ふりがな" name="emergency_address_furigana" required></p>
                    <p><input type="text" name="emergency_address" required></p>
                </td>
                <th><p>電話</p></th>
                <td>
                    <p><input type="tel" name="emergency_tel" required></p>
                </td>
            </tr>
        </table>
        <br>
        <table border="1">
            <tr><th colspan="2"><p>学歴</p></th></tr>
            <tr>
                <td class="td20"><p><input type="month" name="academic_month[]"></p></td>
                <td><p><input type="text" name="academic[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="academic_month[]"></p></td>
                <td><p><input type="text" name="academic[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="academic_month[]"></p></td>
                <td><p><input type="text" name="academic[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="academic_month[]"></p></td>
                <td><p><input type="text" name="academic[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="academic_month[]"></p></td>
                <td><p><input type="text" name="academic[]"></p></td>
            </tr>
            <tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>
        </table>
        <br>
        <table border="1">
            <tr><th colspan="2"><p>職歴</p></th></tr>
            <tr>
                <td class="td20"><p><input type="month" name="career_month[]"></p></td>
                <td><p><input type="text" placeholder="JAXA宇宙飛行士" name="career[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="career_month[]"></p></td>
                <td><p><input type="text" name="career[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="career_month[]"></p></td>
                <td><p><input type="text" name="career[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="career_month[]"></p></td>
                <td><p><input type="text" name="career[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="career_month[]"></p></td>
                <td><p><input type="text" name="career[]"></p></td>
            </tr>
            <tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>
        </table>
        <br>
        <table border="1">
            <tr><th colspan="2"><p>資格・免許</p></th></tr>
            <tr>
                <td class="td20"><p><input type="month" name="qualification_month[]"></p></td>
                <td><p><input type="text" name="qualification[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="qualification_month[]"></p></td>
                <td><p><input type="text" name="qualification[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="qualification_month[]"></p></td>
                <td><p><input type="text" name="qualification[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="qualification_month[]"></p></td>
                <td><p><input type="text" name="qualification[]"></p></td>
            </tr>
            <tr>
                <td><p><input type="month" name="qualification_month[]"></p></td>
                <td><p><input type="text" name="qualification[]"></p></td>
            </tr>
            <tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>
        </table>
        <br>
        <table border="1">
            <tr><th colspan="6"><p>希望職種</p></th></tr>
            <tr>
                <td colspan="6"><p><input type="text" name="desired" required></p></td>
            </tr>
            
            <tr>
                <th><p>OCA大阪デザイン&テクノロジー専門学校</p></th>
                <th rowspan="3"><p>氏名</p></th>
                <td class="td15"><p>ふりがな</p></td>
                <td class="lightgrey">
                    <!-- データベースから表示 -->
                    <p>なんば むった</p>
                    <!--  -->
                </td>
            </tr>
            <tr>
                <td class="td50 lightgrey">
                    <!-- データベースから表示 -->
                    <p>宇宙学科</p>
                    <!--  -->
                </td>
                <td colspan="2" rowspan="2" class="lightgrey">
                    <!-- データベースから表示 -->
                    <p><h1>南波 六太</h1></p>
                    <!--  -->
                </td>

            </tr>
            <tr>
                <td class="lightgrey">
                    <!-- データベースから表示 -->
                    <p>宇宙専攻</p>
                    <!--  -->
                </td>
            </tr>
        </table>
        <table border="1">
            <tr><th colspan="2"><p>志望動機</p></th></tr>
            <tr>
                <td colspan="2"><p><textarea rows="10" name="motivation" required></textarea></p></td>
            </tr>
            <tr><th colspan="2"><p>自己PR</p></th></tr>
            <tr>
                <td colspan="2"><p><textarea rows="10" name="publicity" required></textarea></p></td>
            </tr>
            <tr>
                <th><p>性格</p></th>
                <th><p>趣味</p></th>
            </tr>
            <tr>
                <td><p><textarea rows="10" name="character" required></textarea></p></td>
                <td><p><textarea rows="10" name="hobby" required></textarea></p></td>
            </tr>
        </table>
        <table border="1">
            <tr><th colspan="2"><p>スキルセット</p></th></tr>
            <tr>
                <td class="td15"><p>OS</p></td>
                <td><p><input type="text" name="os" required></p></td>
            </tr>
            <tr>
                <td><p>言語</p></td>
                <td><p><input type="text" name="language" required></p></td>
            </tr>
            <tr>
                <td><p>DB</p></td>
                <td><p><input type="text" name="db" required></p></td>
            </tr>
            <tr>
                <td><p>Office</p></td>
                <td><p><input type="text" name="office" required></p></td>
            </tr>
            <tr>
                <td><p>ネットワーク</p></td>
                <td><p><input type="text" name="network" required></p></td>
            </tr>
            <tr>
                <td><p>その他</p></td>
                <td><p><textarea rows="10" name="other" required></textarea></p></td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td50"><p><input type="button" value="PDF保存"></p></td>
                <td><p><input type="submit" value="保存"></p></td>
            </tr>
        </table>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生就職サポート</title>
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    <link rel="stylesheet" href="../app/static/css/resume.css">
    <!--<link rel="stylesheet" href="../app/static/css/style.create_editp.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/log.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/navi.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/footer.css"> -->
    <!--<link rel="stylesheet" href="../app/static/css/butto.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/back.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/base.css">-->
</head>
<body>
    <?php include ( __DIR__ . "/../template/navi.php"); ?>
    <h1 class="text-align-center">履歴書</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php if(!$is_cookie):?>
            <p>ログインすると記入内容を保存ができます</p>
        <?php endif; ?>

        <table>
            <td colspan="2" class="td85"><input type="date" name="creation" value="<?= $now_date ?>"></td>
            <td></td>
        </table>
        <table border="1">
            <tr>
                <th rowspan="2"><p>氏名</p></th>
                <td class="td15"><p>ふりがな</p></td>
                <td class="lightgrey">
                    <!-- データベースから表示 -->
                    <?php if ($is_cookie):?>
                        <p><?= $_COOKIE['user_name_hiragana'] ?></p>
                    <?php else: ?>
                        <input type="text" placeholder="ふりがな" name="name_furigana1" id="name_furigana1" onkeyup="inp_writing('name_furigana1', 'name_furigana2')">
                    <?php endif ?>
                    <!--  -->
                </td>
                <td class="td5 lightgrey">
                    <!-- データベースから表示 -->
                    <?php if ($is_cookie):?>
                        <p><?= $cookie_gender ?></p>
                    <?php else: ?>
                        <label for="male"><input type="radio" name="gender" value="male" id="male" checked>男</label>
                        <label for="female"><input type="radio" name="gender" value="female" id="female">女</label>
                    <?php endif ?>
                </td>
                <td rowspan="3" class="td15">
                    <!-- <img src="https://koyamachuya.com/wp-content/uploads/2016/11/character-mutta-1.png"> -->
                    <input type="file" name="ver-img" id="ver-img">
                    <p>学校名 学科・専攻 氏名を写真の裏面に記入
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="lightgrey">
                    <!-- データベースから表示 -->
                    <?php if ($is_cookie):?>
                        <p><h1><?= $_COOKIE['user_name']?></h1></p>
                    <?php else: ?>
                        <p><h1><input type="text" name="name1" id="name1" onkeyup="inp_writing('name1', 'name2')"></h1></p>
                    <?php endif ?>
                    <!--  -->
                </td>
            </tr>
            <tr>
                <th><p>生年月日</p></th>
                <?php if($is_resume):?>
                <td colspan="3">
                    <p>
                        <input type="date" name="birthday" id="birthday"  value="<?= $resume_list['year']. '-'. $resume_list['month']. '-'. $resume_list['day'] ?>" required>
                        <samp id="age">（満○○歳）</samp>
                    </p>
                </td>
                <?php else: ?>
                <td colspan="3"><p><input type="date" name="birthday" id="birthday" required><samp id="age">（満○○歳）</samp></p></td>
                <?php endif ?>
            </tr>
        </table>
        <table border="1">
            <tr>
                <th rowspan="3"><p>現住所</p></th>
                <td>
                    <p>〒
                    <?php if($is_resume):?>
                        <input type="number" placeholder="1002100" name="postalcode" id="postalcode" value="<?= $resume_list['postal_code']?>">
                    <?php else: ?>
                        <input type="number" placeholder="1002100" name="postalcode" id="postalcode">
                    <?php endif ?>
                    <input type="button" name="but-postalcode" id="but-postalcode" value="住所検索">
                    </p>
                    <!-- データベースから表示 -->
                    <p>
                        <?php if($is_resume):?>
                            <input type="text" placeholder="ふりがな" name="address_furigana" id="address_furigana" value="<?= $resume_list['address_furigana'] ?>">
                        <?php else: ?>
                            <input type="text" placeholder="ふりがな" name="address_furigana" id="address_furigana">
                        <?php endif ?>
                    </p>
                    <p>
                        <?php if($is_resume):?>
                            <input type="text" name="address" id="address" placeholder="大阪府大阪市西区北堀江2－4ー6" value="<?= $resume_list['address'] ?>">
                        <?php else: ?>
                            <input type="text" name="address" id="address" placeholder="大阪府大阪市西区北堀江2－4ー6">
                        <?php endif ?>
                    </p>
                    <!--  -->
                </td>
                <th><p>最寄り駅</p></th>
                <td>
                    <p>
                        <?php if($is_resume):?>
                            <input type="text" placeholder="大阪メトロ長堀橋見緑地" name="nearest_line" value="<?= $resume_list['station_line'] ?>">線
                        <?php else: ?>
                            <input type="text" placeholder="大阪メトロ長堀橋見緑地" name="nearest_line">線
                        <?php endif ?>
                    </p>
                    <p>
                        <?php if($is_resume):?>
                            <input type="text" placeholder="西大橋" name="nearest_station" value="<?= $resume_list['station'] ?>">駅
                        <?php else: ?>
                            <input type="text" placeholder="西大橋" name="nearest_station">駅
                        <?php endif ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    <p><input type="text"></p>
                </td>
                <th><p>電話</p></th>
                <td>
                    <?php if($is_resume):?>
                        <p>自宅<input type="tel" placeholder="0123456789" name="tel_home" placeholder="012345678902" value="<?= $resume_list['home_tel'] ?>"></p>
                    <?php else: ?>
                        <p>自宅<input type="tel" placeholder="0123456789" name="tel_home" placeholder="012345678902"></p>
                    <?php endif ?>
                    <?php if($is_resume):?>
                        <p>携帯<input type="tel" placeholder="01012345678" name="tel_mobile" placeholder="012345678902" value="<?= $resume_list['mobile_tel'] ?>"></p>
                    <?php else: ?>
                        <p>携帯<input type="tel" placeholder="01012345678" name="tel_mobile" placeholder="012345678902"></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr>     
                <th><p>メール</p></th>
                <td>
                <?php if($is_resume):?>
                    <p><input type="email" name="email" placeholder="xxxx@gmail.com" value="<?= $resume_list['email'] ?>"></p>
                <?php else: ?>
                    <p><input type="email" name="email" placeholder="xxxx@gmail.com"></p>
                <?php endif ?>
                </td>
            </tr>
            <tr>
                <th><p>緊急連絡先</p></th>
                <td>
                    <?php if($is_resume):?>
                        <p><input type="text" placeholder="ふりがな" name="emergency_address_furigana" value="<?= $resume_list['address2'] ?>"></p>
                    <?php else: ?>
                        <p><input type="text" placeholder="ふりがな" name="emergency_address_furigana" ></p>
                    <?php endif ?>

                    <?php if($is_resume):?>
                        <p><input type="text" name="emergency_address" value="<?= $resume_list['address2'] ?>"></p>
                    <?php else: ?>
                        <p><input type="text" name="emergency_address" ></p>
                    <?php endif ?>
                </td>
                <th><p>電話</p></th>
                <td>
                <?php if($is_resume):?>
                    <p><input type="tel" name="emergency_tel" placeholder="012345678902" value="<?= $resume_list['tel'] ?>"></p>
                <?php else: ?>
                    <p><input type="tel" name="emergency_tel" placeholder="012345678902"></p>
                <?php endif ?>

                </td>
            </tr>
        </table>
        <br>
        <table border="1" id="career_academic">
            <tr><th colspan="2"><p>学歴</p></th></tr>
            <?php if($is_resume):?>
                <?php foreach($historys_list as $value): ?>
                    <tr>
                        <td class="td20"><p><input type="month" name="academic_month[]" value="<?= $value['year']. '-'. $value['month'] ?>"></p></td>
                        <td><p><input type="text" name="academic[]" value="<?= $value['history']?>"></p></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td class="td20"><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]" placeholder="○○○○中学校卒業"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]" placeholder="○○○○高等学校卒業"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]" placeholder="OCA大阪デザイン＆IT専門学校　スーパーゲームIT科　ホワイトハッカー専攻　入学"></p></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td class="td20" ><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]" placeholder="○○○○中学校卒業"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]" placeholder="○○○○高等学校卒業"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]" placeholder="OCA大阪デザイン＆IT専門学校　スーパーゲームIT科　ホワイトハッカー専攻　入学"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="academic_month[]"></p></td>
                    <td><p><input type="text" name="academic[]"></p></td>
                </tr>
            <?php endif ?>
                <!--<tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>-->
        </table>
        <p><input type="button" value="行を追加" onclick="newTd(1)"></p>
        <br>
        <table border="1" id="career_month">
            <tr><th colspan="2"><p>職歴</p></th></tr>
            <?php if($is_resume):?>
                <?php foreach($career_list as $value): ?>
                    <tr>
                        <td class="td20"><p><input type="month" name="career_month[]" value="<?= $value['year']. '-'. $value['month'] ?>"></p></td>
                        <td><p><input type="text" placeholder="なし" name="career[]" value="<?= $value['history']?>"></p></td>
                    </tr>
                <?php endforeach ?>
                    <tr>
                        <td class="td20"><p><input type="month" name="career_month[]"></p></td>
                        <td><p><input type="text" placeholder="なし" name="career[]"></p></td>
                    </tr>
            <?php else: ?>
                <tr>
                    <td class="td20"><p><input type="month" name="career_month[]"></p></td>
                    <td><p><input type="text" placeholder="なし" name="career[]"></p></td>
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
            <?php endif ?>
            <!--<tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>-->
        </table>
        <p><input type="button" value="行を追加" onclick="newTd(2)"></p>
        <br>
        <table border="1" id="career_qualification">
            <tr><th colspan="2"><p>資格・免許</p></th></tr>
            <?php if($is_resume):?>
                <?php foreach($userAbilites_list as $value): ?>
                    <tr>
                        <td class="td20"><p><input type="month" name="qualification_month[]" value="<?= $value['year']. '-'. $value['month'] ?>"></p></td>
                        <td><p><input type="text" name="qualification[]" value="<?= $value['ability']?>"></p></td>
                    </tr>
                    <?php endforeach ?>
                <tr>
                    <td class="td20"><p><input type="month" name="qualification_month[]"></p></td>
                    <td><p><input type="text" name="qualification[]" placeholder="ITパスポート"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="qualification_month[]"></p></td>
                    <td><p><input type="text" name="qualification[]" placeholder="基本情報"></p></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td class="td20"><p><input type="month" name="qualification_month[]"></p></td>
                    <td><p><input type="text" name="qualification[]" placeholder="ITパスポート"></p></td>
                </tr>
                <tr>
                    <td><p><input type="month" name="qualification_month[]"></p></td>
                    <td><p><input type="text" name="qualification[]" placeholder="基本情報"></p></td>
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
            <?php endif ?>
            <!--<tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>-->
        </table>
        <p><input type="button" value="行を追加" onclick="newTd(3)"></p>
        <br>
        <table border="1">
            <tr><th colspan="6"><p>希望職種</p></th></tr>
            <tr>
                <td colspan="6">
                    <?php if($is_resume):?>
                        <p><input type="text" name="desired" placeholder="インフラエンジニア・セキュリティエンジニア" value="<?= $resume_list['hope']?>"></p>
                    <?php else: ?>
                        <p><input type="text" name="desired" placeholder="インフラエンジニア・セキュリティエンジニア"></p>
                    <?php endif ?>
                </td>
            </tr>
            
            <tr>
                <th><p>OCA大阪デザイン&テクノロジー専門学校</p></th>
                <th rowspan="3"><p>氏名</p></th>
                <td class="td15"><p>ふりがな</p></td>
                <td class="lightgrey">
                    <!-- データベースから表示 -->
                    <?php if ($is_cookie):?>
                        <p><?= $_COOKIE['user_name_hiragana'] ?></p>
                    <?php else: ?>
                        <p type="text" placeholder="ふりがな" name="name_furigana2" id="name_furigana2" >自動入力</p>
                    <?php endif ?>
                    <!--  -->
                </td>
            </tr>
            <tr>
                <td class="td50 lightgrey">
                    <!-- データベースから表示 -->
                    <?php if ($is_cookie):?>
                        <p><?= $_COOKIE['user_department'] ?></p>
                    <?php else: ?>
                        <p><input type="text" name="department" id="department" placeholder="スーパーゲームゲームIT科"></p>
                    <?php endif ?>
                    <!--  -->
                </td>
                <td colspan="2" rowspan="2" class="lightgrey">
                    <!-- データベースから表示 -->
                    <?php if ($is_cookie):?>
                        <p name="name2" id="name2"><h1><?= $_COOKIE['user_name']?></h1></p>
                    <?php else: ?>
                        <p><h1 name="name2" id="name2">自動入力</h1></p>
                    <?php endif ?>
                    <!--  -->
                </td>

            </tr>
            <tr>
                <td class="lightgrey">
                    <!-- データベースから表示 -->
                    <?php if ($is_cookie):?>
                        <p><?= $_COOKIE['user_major'] ?></p>
                    <?php else: ?>
                        <p><input type="text" name="major" id="major" placeholder="ホワイトハッカー専攻"></p>
                    <?php endif ?>
                    <!--  -->
                </td>
            </tr>
        </table>
        <table border="1">
            <tr><th colspan="2"><p>志望動機</p></th></tr>
            <tr>
                <td colspan="2">
                    <?php if($is_resume):?>
                        <p><textarea rows="10" name="motivation" placeholder="" ><?= $resume_list['desire']?></textarea></p>
                    <?php else: ?>
                        <p><textarea rows="10" name="motivation" placeholder=""></textarea></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr><th colspan="2"><p>自己PR</p></th></tr>
            <tr>
                <td colspan="2">
                    <?php if($is_resume):?>
                        <p><textarea rows="10" name="publicity" placeholder=""><?= $resume_list['pr']?></textarea></p>
                    <?php else: ?>
                        <p><textarea rows="10" name="publicity" placeholder=""></textarea></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <th><p>性格</p></th>
                <th><p>趣味</p></th>
            </tr>
            <tr>
                <td>
                    <?php if($is_resume):?>
                        <p><textarea rows="10" name="character"><?= $resume_list['personality']?></textarea></p>
                    <?php else: ?>
                        <p><textarea rows="10" name="character"></textarea></p>
                    <?php endif ?>
                </td>
                <td>
                <?php if($is_resume):?>
                    <p><textarea rows="10" name="hobby"><?= $resume_list['hobby']?></textarea></p>
                <?php else: ?>
                    <p><textarea rows="10" name="hobby"></textarea></p>
                <?php endif ?>
                </td>
            </tr>
        </table>
        <table border="1">
            <tr><th colspan="2"><p>スキルセット</p></th></tr>
            <tr>
                <td class="td15"><p>OS</p></td>
                <td>
                    <?php if($is_resume):?>
                        <p><input type="text" name="os" placeholder="" value="<?= $resume_list['os']?>"></p>
                    <?php else: ?>
                        <p><input type="text" name="os" placeholder=""></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td><p>言語</p></td>
                <td>
                    <?php if($is_resume):?>
                        <p><input type="text" name="language" placeholder="" value="<?= $resume_list['lang']?>"></p>
                    <?php else: ?>
                        <p><input type="text" name="language" placeholder=""></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td><p>DB</p></td>
                <td>
                    <?php if($is_resume):?>
                        <p><input type="text" name="db" placeholder="" value="<?= $resume_list['db']?>"></p>
                    <?php else: ?>
                        <p><input type="text" name="db" placeholder=""></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td><p>Office</p></td>
                <td>
                    <?php if($is_resume):?>
                        <p><input type="text" name="office" placeholder="" value="<?= $resume_list['office']?>"></p>
                    <?php else: ?>
                        <p><input type="text" name="office" placeholder=""></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td><p>ネットワーク</p></td>
                <td>
                    <?php if($is_resume):?>
                        <p><input type="text" name="network" placeholder="" value="<?= $resume_list['net']?>"></p>
                    <?php else: ?>
                        <p><input type="text" name="network" placeholder=""></p>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td><p>その他</p></td>
                <td>
                    <?php if($is_resume):?>
                        <p><textarea rows="10" name="other" ><?= $resume_list['other']?></textarea></p>
                    <?php else: ?>
                        <p><textarea rows="10" name="other" ></textarea></p>
                    <?php endif ?>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td50"><p><input class="but-color-yellow" type="submit" name="pdf" value="PDF保存"></p></td>
                <td><p><input class="but-color-blue" type="submit" name="save" value="保存"></p></td>
            </tr>
        </table>
    </form>
    <?php include (__DIR__ . "/../template/footer.html"); ?>
    <script src="../app/static/js/resume.js"></script>
</body>
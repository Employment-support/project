<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>履歴書</title>
    <link rel="stylesheet" href="../app/static/css/log.css">
    <link rel="stylesheet" href="../app/static/css/navi.css">
    <link rel="stylesheet" href="../app/static/css/footer.css"> 
    <link rel="stylesheet" href="../app/static/css/resume.css">
    <link rel="stylesheet" href="../app/static/css/butto.css">
    <link rel="stylesheet" href="../app/static/css/back.css">
</head>
<body>
    <?php include ( __DIR__ . "/../template/navi.php"); ?>
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
        <table border="1">
            <tr><th colspan="2"><p>学歴</p></th></tr>
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
            <tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>
        </table>
        <br>
        <table border="1">
            <tr><th colspan="2"><p>資格・免許</p></th></tr>
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
            <tr><td colspan="2"><p><input type="button" value="行を追加"></p></td></tr>
        </table>
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
                <td class="td50"><p><input class="yellow" type="submit" name="pdf" value="PDF保存"></p></td>
                <td><p><input class="blue" type="submit" name="save" value="保存"></p></td>
            </tr>
        </table>
    </form>
    <?php include (__DIR__ . "/../template/footer.html"); ?>

    <script>
    
        // 現在の年齢
        let birthday = document.getElementById('birthday');
        birthday.onchange = function (){
            /* 
            現在の年齢取得関数
            */

            // 今日
            let today = new Date();

            // html type:date　を扱いやすくする
            let regex = /-/;
            let result = birthday.value.split(regex);
            // console.log(result);

            //今年の誕生日
            let thisYearsBirthday = new Date(today.getFullYear(), Number(result[1]) - 1, Number(result[2]));
            // console.log(thisYearsBirthday);

            // 年齢
            let age = today.getFullYear() - Number(result[0]);

            if(today < thisYearsBirthday){
                //今年まだ誕生日が来ていない
                age--;
            };

            // console.log(age);

            // 書き換え
            document.querySelector('#age').textContent = '（満' + age + '歳）';

        };
        
        // 名前の書き込み
        function inp_writing(id, change_id){
            console.log(id);
            let inp = document.getElementById(id).value;
            document.getElementById(change_id).textContent = inp;

        };


        let button = document.getElementById('but-postalcode');

        // ボタンがクリックされた時の処理
        button.addEventListener('click', function() {
            // 住所APIのURL
            let url = "https://zipcloud.ibsnet.co.jp/api/search?zipcode="
            
            // 入力された郵便番号のidから取得
            let number = document.getElementById("postalcode").value;
            // url変数に入植されたnumberを結合
            url += number;
            // console.log(url); // 確認用
            
            // 入力するinputタグのidの所得
            let element_address =  document.getElementById("address");
            let element_hiragana =  document.getElementById("address_furigana");
            
            // https://cheat.co.jp/blog/archives/2691
            // urlが存在するか fetch
            fetch(url).then(function(response) {
                console.log('存在しない');
                return response.text();
            }).then(function(text) {
                // 取得したデータをjson型に変換
                let text_json = JSON.parse(text)
                console.log(text_json.results); // 確認用

                // テスト用表示
                // https://www.weed.nagoya/entry/2016/05/11/105145
                let kana = ""; // カタカナの連結
                let address = ""; // 住所の連結

                for (var i = 0; i < text_json.results.length; i++) {

                console.log(text_json.results[i]); // 確認用

                //
                for (let key in text_json.results[i]) {

                    // addressとkanaを文字列連結をする
                    if (key.match(/address/)) {
                    address += text_json.results[i][key];
                    } else if (key.match(/kana/)) {
                    kana += text_json.results[i][key];
                    }

                    console.log(key + ': ' + text_json.results[i][key]); // 確認用
                }
                }
                
                console.log(address); // 確認用
                console.log(replaceKanaToHira(hankakuToZenkaku(kana))); // 確認用

                // タグに入力
                if (text_json.results !== null) {
                element_hiragana.value = replaceKanaToHira(hankakuToZenkaku(kana));
                element_address.value = address;
                } else {
                element.textContent = "エラー";
                }

            });
        });

        // カタカナ半角からカタカナ全角
        function hankakuToZenkaku(str) {
            let kanaMap = {
                'ｶﾞ': 'ガ', 'ｷﾞ': 'ギ', 'ｸﾞ': 'グ', 'ｹﾞ': 'ゲ', 'ｺﾞ': 'ゴ',
                'ｻﾞ': 'ザ', 'ｼﾞ': 'ジ', 'ｽﾞ': 'ズ', 'ｾﾞ': 'ゼ', 'ｿﾞ': 'ゾ',
                'ﾀﾞ': 'ダ', 'ﾁﾞ': 'ヂ', 'ﾂﾞ': 'ヅ', 'ﾃﾞ': 'デ', 'ﾄﾞ': 'ド',
                'ﾊﾞ': 'バ', 'ﾋﾞ': 'ビ', 'ﾌﾞ': 'ブ', 'ﾍﾞ': 'ベ', 'ﾎﾞ': 'ボ',
                'ﾊﾟ': 'パ', 'ﾋﾟ': 'ピ', 'ﾌﾟ': 'プ', 'ﾍﾟ': 'ペ', 'ﾎﾟ': 'ポ',
                'ｳﾞ': 'ヴ', 'ﾜﾞ': 'ヷ', 'ｦﾞ': 'ヺ',
                'ｱ': 'ア', 'ｲ': 'イ', 'ｳ': 'ウ', 'ｴ': 'エ', 'ｵ': 'オ',
                'ｶ': 'カ', 'ｷ': 'キ', 'ｸ': 'ク', 'ｹ': 'ケ', 'ｺ': 'コ',
                'ｻ': 'サ', 'ｼ': 'シ', 'ｽ': 'ス', 'ｾ': 'セ', 'ｿ': 'ソ',
                'ﾀ': 'タ', 'ﾁ': 'チ', 'ﾂ': 'ツ', 'ﾃ': 'テ', 'ﾄ': 'ト',
                'ﾅ': 'ナ', 'ﾆ': 'ニ', 'ﾇ': 'ヌ', 'ﾈ': 'ネ', 'ﾉ': 'ノ',
                'ﾊ': 'ハ', 'ﾋ': 'ヒ', 'ﾌ': 'フ', 'ﾍ': 'ヘ', 'ﾎ': 'ホ',
                'ﾏ': 'マ', 'ﾐ': 'ミ', 'ﾑ': 'ム', 'ﾒ': 'メ', 'ﾓ': 'モ',
                'ﾔ': 'ヤ', 'ﾕ': 'ユ', 'ﾖ': 'ヨ',
                'ﾗ': 'ラ', 'ﾘ': 'リ', 'ﾙ': 'ル', 'ﾚ': 'レ', 'ﾛ': 'ロ',
                'ﾜ': 'ワ', 'ｦ': 'ヲ', 'ﾝ': 'ン',
                'ｧ': 'ァ', 'ｨ': 'ィ', 'ｩ': 'ゥ', 'ｪ': 'ェ', 'ｫ': 'ォ',
                'ｯ': 'ッ', 'ｬ': 'ャ', 'ｭ': 'ュ', 'ｮ': 'ョ',
                '｡': '。', '､': '、', 'ｰ': 'ー', '｢': '「', '｣': '」', '･': '・'
            };
        
        let reg = new RegExp('(' + Object.keys(kanaMap).join('|') + ')', 'g');
            
            return str
                    .replace(reg, function (match) {
                        return kanaMap[match];
                    })
                    .replace(/゛/g, 'ﾞ')
                    .replace(/゜/g, 'ﾟ');
        
        };

        // カタカナからひらがな
        function replaceKanaToHira(str){
            return str.replace(/[\u30a1-\u30f6]/g, function(s){
                return String.fromCharCode(s.charCodeAt(0) - 0x60);
            });
        };

    </script>
</body>

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


function newTd(num) {
    // テーブルのid取得
    let table;
    if (num == 1) {
        table = document.getElementById("career_academic");
    } else if (num == 2) {
        table = document.getElementById("career_month");
    } else if (num == 3) {
        table = document.getElementById("career_qualification");
    } 
    // let table = document.getElementById("career");
    let rows = table.rows.length;
    // console.log(rows);
    // 行を行末に追加
    let row = table.insertRow();
    
    // セルの挿入
    var cell1 = row.insertCell(-1);
    var cell2 = row.insertCell(-1);
    
    // 日付と入力 HTML
    let yd;
    let inp;
    if (num == 1) {
        yd = '<p><input type="month" name="academic_month[]"></p>'
        inp = '<p><input type="text" name="academic[]"></p>'
    } else if (num == 2) {
        yd = '<p><input type="month" name="career_month[]"></p>'
        inp = '<p><input type="text" name="career[]"></p>'
    } else if (num == 3) {
        yd = '<p><input type="month" name="qualification[]"></p>'
        inp = '<p><input type="text" name="qualification_month[]"></p>'
    } 
    // 行数取得
    var row_len = table.rows.length;

    // セルの内容入力
    cell1.innerHTML = yd;
    cell2.innerHTML = inp;
};
<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";
// http://tcpdf.penlabo.net/method/m/MultiCell.html
// MultiCell

// https://phpjavascriptroom.com/?t=php&p=fpdf_manual
// http://www.t-net.ne.jp/~cyfis/tcpdf/tcpdf/SetFont.html

// use setasign\Fpdi\Fpdi;

// or for usage with TCPDF:
use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once __DIR__ . '/./../../vendor/autoload.php';


// $user = new User(); // ユーザー
// $departments = new Departments(); // 学科
// $majors = new Majors(); // 専攻

// 写真処理の追加する
function pdf($img, $name, $name_frigana, $creation, $birthday, $gender, $postalcode, $address, $address_furigana, $nearest_line, $nearest_station, $tel_home, $tel_mobile, $email, $emergency_address, $emergency_address_furigana, $emergency_tel, $desired, $department, $major, $motivatio, $publicity, $character, $hobby, $os, $language, $db, $office, $network, $other, $career_academic, $qualification){
    /*
    $img: 画像
    $name:名前
    $name_frigana:名前ひらがな
    $creation:作成日
    $birthday:生年月日
    $gender:性別
    $postalcode:郵便番号
    $address:住所1
    $address_furigana:住所1ふりがな
    $nearest_line:線
    $nearest_station:駅
    $tel_home:自宅電話
    $tel_mobile:携帯電話
    $email:メール
    $emergency_address:緊急連絡先住所
    $emergency_address_furigana:緊急連絡先住所ひらがな
    $emergency_tel:緊急連絡先住所電話
    $desired:希望職種
    $department:学科
    $major:専攻
    $motivatio:志望動機
    $publicity:自己PR
    $character:性格
    $hobby:趣味
    $os:
    $language:
    $db:
    $office:
    $network:
    $other:
    $academic_academic:学歴 職歴
    $qualification:資格免許
    */
    
    /* モデルの読み込み */
    $pdf = new Fpdi();
    
    
    /* 初期設定 */
    // line削除
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    
    /* 履歴書 */
    
    /* 設定 */
    // ページの追加
    $pdf->AddPage();
    
    // テンプレートPDFセット
    $pdf->setSourceFile(__DIR__ . "/../static/pdf/mast履歴書フォーマットA.pdf");
    // $pdf->setSourceFile("mast履歴書フォーマットA_merged.pdf");
    
    // import page 1
    $tplId = $pdf->importPage(1);
    
    // テンプレートの読み込み
    $pdf->useTemplate($tplId);
    
    // フォントの設定 - デフォルト
    $default_font_size = 10;
    $default_font_style = 'kozminproregular';
    
    $pdf->SetFont($default_font_style, '', $default_font_size);
    
    
    /* 処理 */

    // 年
    $y = date("Y");
    $pdf->Text(91, 32, $creation[0]);
    // 月
    $m = date("m");
    $pdf->Text(109, 32, $creation[1]);
    // 日
    $d = date("d");
    $pdf->Text(121, 32, $creation[2]);

    
    
    /* 氏名 */
    // ふりがな
    // $pdf->Text(65, 38, 'やまむら　ゆうこ');
    $pdf->SetXY(28, 38);
    // $pdf->MultiCell(111, 6, "やまむら　ゆうこ", 0, "C");
    $pdf->MultiCell(111, 6, $name_frigana, 0, "C");
    
    // 漢字
    $pdf->SetFontSize(17);
    // $pdf->Text(65, 46, '山村　悠子');
    $pdf->SetXY(28, 45);
    // $pdf->MultiCell(111, 10, "山村　悠子", 0, "C");
    $pdf->MultiCell(111, 10, $name, 0, "C");
    
    
    /* 性別 */
    $pdf->SetFont($default_font_style, 'B', 17);
    if ($gender == 'male') {
        // 男
        $pdf->Text(125.3, 36, '○');
    } else {
        // 女
        $pdf->Text(130.5, 36, '○');
    }
    
    
    
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // 生年月日
    $pdf->SetFontSize(10);
    // 年
    // $pdf->Text(51, 59, "1974");
    $pdf->SetXY(51, 58.5);
    $pdf->MultiCell(12, 8, $birthday[0], 0, "C");
    
    // 月
    // $pdf->Text(70, 59, "3");
    $pdf->SetXY(69.7, 58.5);
    $pdf->MultiCell(12, 8, $birthday[1], 0, "C");
    
    // 日
    // $pdf->Text(85, 59, "22");
    $pdf->SetXY(85, 58.5);
    $pdf->MultiCell(10, 8, $birthday[2], 0, "C");
    
    // 満歳
    // 生年月日から満歳を出す
    $birthdays = $birthday[0] . $birthday[1]. $birthday[2];
    $today = date('Ymd');
    $bir = floor(($today - $birthdays) / 10000);
    // $pdf->Text(108, 59, "22");
    $pdf->SetXY(106, 58.6);
    $pdf->MultiCell(10, 8, $bir, 0, "C");
    
    // 証明写真
    if(isset($img)) {
        // (画像, 左から(x), 上から(y), 幅(w), 高さ(h))
        // $pdf->Image(__DIR__ . "/../static/imgs/syoumeisyashin_man.png", 147.7, 22.3, 36);
        $pdf->Image($img, 147.7, 22.3, 36);
        // $pdf->Image("dog_akitainu.png", 147.7, 22.3, 36);
        // $pdf->Image("450-20141213165644240364.jpg", 147.7, 22.3, 36);
    }
    
    
    /* 現在住所 */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // ふりがな
    $pdf->SetFontSize(8);
    $pdf->Text(40, 68, $address_furigana);
    
    // 郵便番号
    $pdf->SetFontSize(10);
    // $pdf->Text(35, 73, '981-4329');
    $pdf->Text(35, 73, substr($postalcode, 0, 3) . '-'. substr($postalcode, 3));
    
    // 住所
    $pdf->SetFontSize(11);
    // $pdf->SetFontSize(12);
    // $pdf->Text(29, 79, '宮城県加美郡加美町鶴喰2-6-4');
    $pdf->SetXY(29, 79);
    $pdf->MultiCell(96, 10, $address, 0, "L");
    
    // 住所2
    $pdf->SetFontSize(8);
    $pdf->Text(29, 89, '');
    
    $pdf->SetFontSize(11);
    // $pdf->SetFontSize(12);
    $pdf->Text(29, 95, '');
    // $pdf->SetXY(29, 95);
    // $pdf->MultiCell(96, 10, "宮城県加美郡加美町鶴喰2-6-4", 1, "L");
    
    
    /* 最寄り駅 */
    $pdf->SetFont($default_font_style, '', 8);
    // 線
    $pdf->Text(140, 68, $nearest_line);
    
    // 駅
    $pdf->Text(155, 74, $nearest_station);
    
    
    /* 電話 */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // 自宅
    // $pdf->Text(148.5, 80, "229");
    $pdf->SetXY(146, 80);
    $pdf->MultiCell(12, 8, substr($tel_home, 0, 3), 0, "C");
    
    // $pdf->Text(160, 80, "2290");
    $pdf->SetXY(159, 80);
    $pdf->MultiCell(12, 8, substr($tel_home, 3, 4), 0, "C");
    
    // $pdf->Text(175, 80, "2290");
    $pdf->SetXY(174, 80);
    $pdf->MultiCell(12, 8, substr($tel_home, 7), 0, "C");
    
    // 携帯
    // $pdf->Text(148.5, 87, "090");
    $pdf->SetXY(146, 87);
    $pdf->MultiCell(12, 8, substr($tel_mobile, 0, 3), 0, "C");
    
    // $pdf->Text(160, 87, "7414");
    $pdf->SetXY(159, 87);
    $pdf->MultiCell(12, 8, substr($tel_mobile, 3, 4), 0, "C");
    
    // $pdf->Text(175, 87, "6218");
    $pdf->SetXY(174, 87);
    $pdf->MultiCell(12, 8, substr($tel_mobile, 7), 0, "C");
    
    
    // メール
    $pdf->Text(142, 95, $email);
    
    /* 緊急連絡先 */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    
    // 住所
    $pdf->SetFontSize(8);
    $pdf->Text(40, 103, '');
    
    $pdf->SetFontSize(9);
    // $pdf->SetFontSize(12);
    // $pdf->Text(29, 110, '同上');
    $pdf->SetXY(29, 109);
    $pdf->MultiCell(96, 10, $emergency_address, 0, "L");
    
    
    // 電話
    // $pdf->Text(148.5, 104, "229");
    $pdf->SetXY(146, 104);
    $pdf->MultiCell(12, 8, substr($emergency_tel, 0, 3), 0, "C");
    
    // $pdf->Text(160, 104, "2290");
    $pdf->SetXY(159, 104);
    $pdf->MultiCell(12, 8, substr($emergency_tel, 3, 4), 0, "C");
    
    // $pdf->Text(175, 104, "2290");
    $pdf->SetXY(174, 104);
    $pdf->MultiCell(12, 8, substr($emergency_tel, 7), 0, "C");
    
    // 誰か
    // $pdf->Text(160, 110.5, "母");
    $pdf->SetXY(157, 110.5);
    $pdf->MultiCell(12, 8, "", 0, "C");
    
    /* 学歴(職歴) */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // foreachで回す
    $cou = 0;
    $coordinate_t = 123;
    foreach ($career_academic as $value) {
        if ($cou <= 1) {
            $coordinate_t += 7.5;
        }
        // 年
        // $pdf->Text(21, 130.5, "2021");
        $pdf->SetXY(19.5, $coordinate_t);
        $pdf->MultiCell(13.5, 5, $value['year'], 0, "C");
        
        // 月
        // $pdf->Text(34, 130.5, "12");
        $pdf->SetXY(33.2, $coordinate_t);
        $pdf->MultiCell(7.5, 5, $value['month'], 0, "C");
        
        // 学歴(職歴)
        $pdf->Text(43, $coordinate_t, $value['data']);
        
    // // +7.5
    // // 年
    // // $pdf->Text(21, 138, "2021");
    // $pdf->SetXY(19.5, 138);
    // $pdf->MultiCell(13.5, 5, "2021", 0, "C");
    
    // // 月
    // // $pdf->Text(34, 138, "12");
    // $pdf->SetXY(33.2, 138);
    // $pdf->MultiCell(7.5, 5, "12", 0, "C");
    
    // // // 学歴(職歴)
    // $pdf->Text(43, 138, "○○○○高等学校卒業");
    }
    
    /* 資格・免許 */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    
    $cou = 0;
    $coordinate_t = 205.5;
    if (!empty($qualification)) {
        foreach ($qualification as $value) {
            if ($cou <= 1) {
                $coordinate_t += 7.5;
            }
            // 年
            // $pdf->Text(21, 130.5, "2021");
            $pdf->SetXY(19.5, $coordinate_t);
            $pdf->MultiCell(13.5, 5, $value['year'], 0, "C");
            
            // 月
            // $pdf->Text(34, 130.5, "12");
            $pdf->SetXY(33.2, $coordinate_t);
            $pdf->MultiCell(7.5, 5, $value['month'], 0, "C");
            
            // 資格・免許
            $pdf->Text(43, $coordinate_t, $value['data']);
            // 年
            // // $pdf->Text(21, 213, "2021");
            // $pdf->SetXY(19.5, 213);
            // $pdf->MultiCell(13.5, 5, "2021", 0, "C");
            
            // // 月
            // // $pdf->Text(34, 213, "12");
            // $pdf->SetXY(33.2, 213);
            // $pdf->MultiCell(7.5, 5, "12", 0, "C");
            
            // // 資格・免許
            // $pdf->Text(43, 213, "ITパスポート取得");
            
            // // +7.5
            // // $pdf->Text(21, 213, "2021");
            // $pdf->SetXY(19.5, 220.5);
            // $pdf->MultiCell(13.5, 5, "2021", 0, "C");
            
            // // 月
            // // $pdf->Text(34, 213, "12");
            // $pdf->SetXY(33.2, 220.5);
            // $pdf->MultiCell(7.5, 5, "12", 0, "C");
            
            // // 資格・免許
            // $pdf->Text(43, 220.5, "基本情報技術者　取得");
        }
    }
    
    
    
    
    /* 自己紹介書 */
    
    /* 設定 */
    // ページの追加
    $pdf->AddPage();
    
    // テンプレートPDFセット
    $pdf->setSourceFile(__DIR__ . "/../static/pdf/mast履歴書フォーマットB.pdf");
    
    
    // import page 1
    $tplId = $pdf->importPage(1);
    
    // テンプレートの読み込み
    $pdf->useTemplate($tplId);
    
    
    /* 処理 */
    
    /* 希望職種 */
    
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // $pdf->Text(115, 30, 'インフラエンジニア・セキュリティエンジニア');
    $pdf->SetFontSize(12);
    // $pdf->SetXY(82, 28.5);
    $pdf->SetXY(82, 30);
    $pdf->MultiCell(106, 8.5, $desired, 0, "C");
    
    
    
    /* 学校情報 */
    // 学校名
    $pdf->SetFontSize(8);
    // $pdf->Text(17.8, 38, 'ＯＣＡ大阪デザイン＆ＩＴテクノロジー専門学校');
    $pdf->SetXY(16, 38);
    // $pdf->MultiCell(66, 17, "ＯＣＡ大阪デザイン＆ＩＴテクノロジー専門学校\n スーパーゲームゲームIT科 \nホワイトハッカー専攻", 0, "R");
    $pdf->MultiCell(66, 17, "ＯＣＡ大阪デザイン＆ＩＴテクノロジー専門学校", 0, "R");
    // 学科
    // $pdf->Text(17.8, 44, 'スーパーゲームゲームIT科');
    $pdf->SetXY(16, 44);
    $pdf->MultiCell(66, 17, $department, 0, "R");
    // 専攻
    // $pdf->Text(17.8, 49, 'ホワイトハッカー専攻');
    $pdf->SetXY(16, 49);
    $pdf->MultiCell(66, 17, $major, 0, "R");
    
    
    /* 氏名 */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // ふりがな
    // $pdf->Text(125, 38, 'やまむら　ゆうこ');
    $pdf->SetXY(101, 38);
    $pdf->MultiCell(87, 10, $name_frigana, 0, "C");
    
    // 漢字
    $pdf->SetFontSize(17);
    // $pdf->Text(125, 46, '山村　悠子');
    $pdf->SetXY(101, 46);
    $pdf->MultiCell(87, 10, $name, 0, "C");
    
    /* 志望動機 */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // $pdf->Text(17.8, 63, 'ここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキスト');
    $pdf->SetFontSize(8);
    $pdf->SetXY(18.5, 62);
    // 649字
    // $pdf->MultiCell(170, 40, "ここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストこにテキス", 0);
    $pdf->MultiCell(170, 40, $motivatio, 0);
    
    /* 自己PR */
    $pdf->SetFontSize(8);
    $pdf->SetXY(18.5, 108);
    // 590字
    // $pdf->MultiCell(170, 40, "ここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストこにテキスここにテ", 0);
    $pdf->MultiCell(170, 40, $publicity, 0);
    
    /* 性格 */
    $pdf->SetFontSize(8);
    $pdf->SetXY(18.5, 152);
    // 310字
    // $pdf->MultiCell(90, 40, "ここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストこにテキスここにテキストここにテキストここにテキストここにテキストここにテキストトストここにテキストト", 0);
    $pdf->MultiCell(90, 40, $character, 0);
    
    /* 趣味 */
    $pdf->SetFontSize(8);
    $pdf->SetXY(107.5, 152);
    // 280字
    // $pdf->MultiCell(82, 40, "ここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストこにテキスここにテキストここにテキストここ", 0);
    $pdf->MultiCell(82, 40, $hobby, 0);
    
    
    /* スキルセット */
    $pdf->SetFont($default_font_style, '', $default_font_size);
    // OS
    $pdf->SetFontSize(8);
    $pdf->Text(40, 198, $os);
    
    // 言語
    // $pdf->SetFont($default_font_style, '', $default_font_size);
    $pdf->SetFontSize(8);
    $pdf->SetXY(40, 204.5);
    // 280字
    // $pdf->MultiCell(147, 14, "python PHP HTML CSS JavaScript Go", 0, "L");
    $pdf->MultiCell(147, 14, $language, 0, "L");
    
    // DB
    $pdf->SetFontSize(8);
    // $pdf->Text(40, 221.5, 'MySQL');
    $pdf->Text(40, 221.5, $db);
    
    // Office
    $pdf->SetFontSize(8);
    // $pdf->Text(40, 229, 'Excel Word');
    $pdf->Text(40, 229, $office);
    
    // ネットワーク
    $pdf->SetFontSize(8);
    // $pdf->Text(40, 236.5, 'Cisco Catalyst XXXXX(L2スイッチ)');
    $pdf->Text(40, 236.5, $network);
    
    // その他
    $pdf->SetFontSize(8);
    $pdf->SetXY(40, 243);
    // 280字
    // $pdf->MultiCell(147, 20, "開発ツール：Visual Studio/Git hub 仮想化ツール：Oracle VM VirtualBox/VMware Workstation クラウドサービス：Amazon Web Services/Microsoft Azure マルウェア解析および調査ツール：Stirling/Process Monitor/Wireshark AIツール：IBM Watson/tersonflow", 0, "L");
    $pdf->MultiCell(147, 20, $other, 0, "L");
    
    /*  */
    ob_end_clean();
    $pdf->Output('oca履歴書.pdf');
}

function my_status_normalization($list){
    /*
     * 学歴、職歴、資格を扱いやすくする関数
    */
    $new_list = [];
    foreach ($list as $key => $value) {
        // 年と月を分ける
        // 日付と内容
        if (!empty($value[0]) && !empty($value[1]) ) {
            $ym = explode('-', $value[0]);
            $new_list += array($key => array("year" => $ym[0], "month" => $ym[1], "data" => $value[1]));
        } else if (!empty($value[1])) {
            // 内容だけある処理
            $new_list += array($key => array("year" => '', "month" => '', "data" => $value[1]));
        }
    }
    return $new_list;
};

// 住所2が設定されていない

// ログインしているか
$is_cookie = is_login();
if($is_cookie){
    if ($_COOKIE['user_gender'] == 1) {
        $cookie_gender = "男";
    } else {
        $cookie_gender = "女";
    }
} else {
    $is_cookie = false;
}

function post_check($post){
    
    if (isset($post)) {
        return $post;
    } else {
        return '';
    }
}


// DB登録されたものと入力されたものを比較
// はじめの一件目が消せない
function comparison($db_array, $inp_array, string $db_key, string $inp_key){
    // 分ける
    // echo 'db';
    // print_r($db_array);
    // echo '<br>';
    // echo 'inp';
    // print_r($inp_array);
    // echo '<br>';
    
    // 重複するインデクスを格納する配列
    $drop_index = array();

    // 削除するidを格納する配列
    $drop_index_db = array();

    // keyが存在するか
    if (!empty($inp_array)) {
        // echo 'aru';
        if (!empty($db_array)) {
            // echo 'aru';
            if (array_key_exists($db_key, $db_array[0]) && array_key_exists($inp_key, $inp_array[0])) {
                // データの書き換え
                foreach ($db_array as $db_key_num => $db_value) {
                    // データの書き換え
                    // 入力データがあるか and データベースのデータと入力データが一致するか
                    if (isset($inp_array[$db_key_num]) && $db_array[$db_key_num][$db_key] == $inp_array[$db_key_num][$inp_key]) {
                        $db_array[$db_key_num][$db_key] = $inp_array[$db_key_num][$inp_key];
                        // print_r($db_array[$db_key_num]);
                        // echo '<br>';
                    } else {
                        // echo 'test';
                        array_push($drop_index_db, $db_array[$db_key_num]["id"]);
                    }
                }
        
                foreach ($db_array as $db_key_num => $db_value) {
                    // print_r($db_value);
                    // echo '<br>';
                    foreach ($inp_array as $key => $value) {
                    // 登録している名前が一致していたら配列に追加
                        if (strcmp($db_value[$db_key], $value[$inp_key]) == 0) {
                            // print_r($key);
                            // echo '<br>';
                            array_push($drop_index, $key);
                        }
                    }
                }
    
                // 一致していた名前のインデックスを消去
                foreach ($drop_index as $dr) {
                    unset($inp_array[$dr]);
                }
            }
        }
        // print_r($drop_index_db);
        // dbデータと入力されたデータの連結
        $new_data = array_merge_recursive($db_array, $inp_array);
        // print_r($new_data);
        return array($new_data, $drop_index_db);
    } else {
        // echo 'nai';
        return false;
    }
}

// 二重送信対策
list($session_token, $new_token) = generate_token();

$resumes = new Resumes(); // 履歴書
$historys = new Historys(); // 学歴
$careers_model = new Careers(); // 職歴
$userAbilites = new UserAbilites(); // ユーザ資格免許
$abilite_list = new Abilites(); // 資格一覧
$skillItems_list = new SkillItems(); // スキル

// ログインしていたら保存データ取得
if ($is_cookie) {
    // 履歴書のデータ
    $resume_list = $resumes->select($_COOKIE['user_id'], $resumes::sqlSelect);
    // var_dump($resume_list);
    if ($resume_list) {
        // 資格
        $userAbilites_list = $userAbilites->selectAll($userAbilites::sqlSelectAll. ' WHERE resume_id = '. $resume_list['id']);
        // 学歴
        $historys_list = $historys->selectAll($historys::sqlSelectAll. ' WHERE resume_id = '. $resume_list['id']);
    
        $career_list = $careers_model->selectAll($careers_model::sqlSelectAll. ' WHERE resume_id = '. $resume_list['id']);
        $is_resume = true;
    } else {
        $is_resume = false;
    }
    
} else {
    $resume_list = '';
    $userAbilites_list ='';
    $historys_list = '';
    $is_resume = false;
}



// print_r($resume_list);


// 保存処理
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if ($is_cookie){
        $name_frigana = $_COOKIE['user_name_hiragana'];
    } else {
        $name_frigana = post_check($_POST['name_furigana1']);
    }
    
    if ($is_cookie){
        $name = $_COOKIE['user_name'];
    } else {
        $name = post_check($_POST['name1']);
    }
    
    if (isset($_POST['birthday'])) {
        // 生年月日
        $birthday = explode('-', $_POST['birthday']);
        
    } else {
        $birthday = '';
    }

    if (isset($_POST['creation'])) {
        // 作成日 
        $creation = explode('-', $_POST['creation']);
        
    } else {
        $creation = '';
    }
    
    // 性別
    if ($is_cookie){
        if ($_COOKIE['user_gender'] == 1) {
            $gender = "male";
        } else {
            $gender = "female";
        }
    } else {
        $gender = post_check($_POST['gender']);
    }
    
    // 郵便番号
    $postalcode = post_check($_POST['postalcode']);
    
    // 住所ふりがな
    $address = post_check($_POST['address']);
    
    // 住所_furigana
    $address_furigana = post_check($_POST['address_furigana']);
    
    // 線
    $nearest_line = post_check($_POST['nearest_line']);
    
    // 駅
    $nearest_station = post_check($_POST['nearest_station']);
    
    // 自宅電話station
    $tel_home = post_check($_POST['tel_home']);
    
    // 携帯電話
    $tel_mobile = post_check($_POST['tel_mobile']);
    
    // メールobile
    $email = post_check($_POST['email']);
    
    // 緊急住所ふりがな
    $emergency_address = post_check($_POST['emergency_address']);
    
    // 緊急住所_furigana
    $emergency_address_furigana = post_check($_POST['emergency_address_furigana']);
    
    // 緊急電話
    $emergency_tel = post_check($_POST['emergency_tel']);
    
    // 希望職種
    $desired = post_check($_POST['desired']);
    
    if ($is_cookie){
        $department = $_COOKIE['user_department'];
    } else if (isset($_POST['department'])) {
        // 学科
        $department = $_POST['department'];
    } else {
        $department = '';
    }
    
    if ($is_cookie){
        $major = $_COOKIE['user_major'];
    } else if (isset($_POST['major'])) {
        // 専攻
        $major = $_POST['major'];
    } else {
        $major= '';
    }
    
    // 志望動機
    $motivatio = post_check($_POST['motivation']);
    
    // 自己PRn
    $publicity = post_check($_POST['publicity']);
    
    // 性格
    $character = post_check($_POST['character']);
    
    // 趣味
    $hobby = post_check($_POST['hobby']);
    
    // スキルセット - osbby
    $os = post_check($_POST['os']);
    
    // スキルセット - 言語
    $language = post_check($_POST['language']);
    
    // スキルセット - データベース
    $db = post_check($_POST['db']);
    
    // スキルセット - office
    $office = post_check($_POST['office']);
    
    // スキルセット - ネットワーク
    $network = post_check($_POST['network']);
    
    // スキルセット - その他rk
    $other = post_check($_POST['other']);

    if (isset($_POST['academic_month']) && isset($_POST['academic'])){
        // 配列がからでは無ければ処理
        $academic = array_map(null, $_POST['academic_month'], $_POST['academic']);
        $is_academic = true;
        foreach ($academic as $value) {
            //empty関数の場合空の場合はTRUEになります。
            if (!empty($value[0]) || !empty($value[1])){
                //FALSEになる場合に下記内容を出力します
                // echo '空ではありません';
                $academic = my_status_normalization($academic);
                break;
            } else {
                $is_academic = false;
                //TRUEになる場合に下記内容を出力します
                // echo '空です';
            }
        }

    } else {
        $academic = [];
    }

    if (isset($_POST['career_month']) && isset($_POST['career'])){
        // 配列がからでは無ければ処理
        $career = array_map(null, $_POST['career_month'], $_POST['career']);
        $is_career = true;
        foreach ($career as $value) {
            //empty関数の場合空の場合はTRUEになります。
            if (!empty($value[0]) || !empty($value[1])){
                //FALSEになる場合に下記内容を出力します
                // echo '空ではありません';
                $career = my_status_normalization($career);
                break;
            } else {
                $is_career = false;
                //TRUEになる場合に下記内容を出力します
                // echo '空です';
            }
        }
    } else {
        $career = [];
    }

    if($is_academic && $is_career) {
        echo 'aaa';
        $career_academic = array_map(null, $career, $academic);
    } elseif ($is_academic) {
        $career_academic = $academic;
    } elseif ($is_career) {
        $career_academic = $career;
    } else {
        $career_academic = [];
    }
    
    // 時期資格免許 資格免許
    if (isset($_POST['qualification_month']) && isset($_POST['qualification'])){
        // 配列がからでは無ければ処理
        $qualification = array_map(null, $_POST['qualification_month'], $_POST['qualification']);
        $is_qualification = true;
        foreach ($qualification as $value) {
            //empty関数の場合空の場合はTRUEになります。
            if (!empty($value[0]) || !empty($value[1])){
                //FALSEになる場合に下記内容を出力します
                // echo '空ではありません';
                $qualification = my_status_normalization($qualification);
                break;
            } else {
                $is_qualification = false;
                //TRUEになる場合に下記内容を出力します
                // echo '空です';
            }
        }
        if (!$is_qualification) {
            $qualification = [];
        }
        // if (is_array($_POST['qualification_month']) && is_array($_POST['qualification']) && empty($_POST['qualification_month']) && empty($_POST['qualification'])){
        //     // 時期資格免許 資格免許
        //     echo '資格免許あり';
        //     $qualification = array_map(null, $_POST['qualification_month'], $_POST['qualification']);
        //     $qualification = my_status_normalization($qualification);
        // } else {
        //     $qualification = [];
        // }
    } else {
        $qualification = [];
    }

    $img = [];
    
    if (isset($_FILES['ver-img'])) {
        if (isset($_FILES['ver-img']['name'])) {
            $pdf_img = $_FILES['ver-img']['tmp_name'];
        }
    }
    
    // PDF出力処理
    if(isset($_POST['pdf'])) {
        pdf($pdf_img, $name, $name_frigana, $creation, $birthday, $gender
        , $postalcode, $address, $address_furigana, $nearest_line, $nearest_station
        , $tel_home, $tel_mobile, $email, $emergency_address, $emergency_address_furigana, $emergency_tel
        , $desired, $department, $major, $motivatio, $publicity, $character, $hobby
        , $os, $language, $db, $office, $network, $other
        , $career_academic, $qualification);
    }

    // db登録
    if(isset($_POST['save']) && $is_cookie) {
        $mod = new AwsS3();
        $img_path = $mod->s3_one_upload('imgs', $_FILES['ver-img']);
        
        if (!$is_resume){
            // echo '登録できません';
            // 二重送信対策確認
            // if ( is_token_valid($session_token) ){
                // echo '登録できません';
                // 保存は確認済み
                $resume_id = $resumes->create($birthday[0], $birthday[1], $birthday[2], 
                    $postalcode, $address, $address_furigana, 
                    $tel_home, $tel_mobile, $email, 
                    $emergency_address, $emergency_address_furigana, $emergency_tel, 
                    $nearest_line, $nearest_station, $img_path,
                    $desired, $motivatio, $publicity, $character, $hobby,
                    $other, $_COOKIE['user_id'],
                    $os, $language, $db, $office, $network );
                    
                // echo '登録';
                // var_dump($resume_id);
                // 学歴
                if (empty($academic)) {
                    foreach ($academic as $value) {
                        $historys->create($value['year'], $value['month'], $value['data'], $resume_id);
                    }
                }

                if (empty($career)) {
                    // 職歴
                    foreach ($career as $value) {
                        $historys->create($value['year'], $value['month'], $value['data'], $resume_id);
                    }
                }
                if (empty($academic)) {
                    // 資格
                    foreach ($qualification as $value) {
                        $userAbilites->create($value['year'], $value['month'], $value['data'], $resume_id);
                    }
                }
                
            // }
        } else {
            $resumes->update($resume_list['id'], $birthday[0], $birthday[1], $birthday[2], 
                $postalcode, $address, $address_furigana, 
                $tel_home, $tel_mobile, $email, 
                $emergency_address, $emergency_address_furigana, $emergency_tel, 
                $nearest_line, $nearest_station, $img_path,
                $desired, $motivatio, $publicity, $character, $hobby,
                $other, $_COOKIE['user_id'],
                $os, $language, $db, $office, $network);
            
            

            
            
            // 学歴
            // list($new_academic, $academic_drops_id) = comparison($historys_list, $academic, 'history', 'data');
            $historys->delete($resume_list['id']);
            // // 職歴
            // list($new_career, $career_drops_id) = comparison($career_list, $career, 'job', 'data');
            $careers_model->delete($resume_list['id']);
            
            // // 資格免許
            // list($new_user_abilites, $abilites_drops_id) = comparison($userAbilites_list, $qualification, 'ability', 'data');
            $userAbilites->delete($resume_list['id']);
            
            // ユーザ資格免許あれば処理
            // https://qiita.com/y-encore/items/40ba694a8899ad1e9416
            // ないデータがあれば追加する処理を追加する
            
            // 登録処理
            function create_update($mai_array, string $key_name, $resume_id, $model) {
                /**
                 * $mai_array : 登録データ
                 * $key_name : 登録時のdbのkey名
                 * $resume_id : 履歴書のid
                 * $model : 保存モデル
                 * $drops_id_array : 履歴書内の重複削除
                 */
                if ($mai_array != false || !is_null($mai_array)) {
                    foreach ($mai_array as $value) {
                        if (array_key_exists('id', $value)) {
                            $model->createUpdate($value['id'], $value['year'], $value['month'], $value['data'], $resume_id);
                        } else if (array_key_exists('data', $value)) {
                            // echo "<br>";
                            $model->createUpdate('', $value['year'], $value['month'], $value['data'], $resume_id);
                        } else {
                            // echo 'aru';
                        }
                    }
                } else {
                    // 全削除したら動く
                    echo 'ない';
                    // foreach ($db_datas as $value) {
                    //     $model->delete($value['id']);
                    // }
                }
            }
            
            // 登録処理の変更
            print_r($academic);
            // create_update($new_academic, 'history', $resume_list['id'], $historys, $academic_drops_id, $historys_list);
            // create_update($new_career, 'job', $resume_list['id'], $careers_model, $career_drops_id, $career_list);
            // create_update($new_user_abilites, 'ability', $resume_list['id'], $userAbilites, $abilites_drops_id, $userAbilites_list);
            create_update($academic, 'history', $resume_list['id'], $historys);
            create_update($career, 'job', $resume_list['id'], $careers_model);
            create_update($qualification, 'ability', $resume_list['id'], $userAbilites);

        }
    } else {
        // ①$alertにjavascriptのalert関数を代入する。
        $alert = "<script type='text/javascript'>alert('ログインしてください');</script>";
        
        // ②echoで①を表示する
        echo $alert;
    }
    // phpの確認のとき削除
    // header('Location:/resume');
}

$abilite_list = $abilite_list->selectAll($abilite_list::sqlSelectAll);

$sql_skil = 'SELECT t1.id, t1.name, t1.skill_sortings_id, t2.sorting_name 
FROM skill_items as t1
INNER JOIN skill_sortings as t2
ON t2.id = t1.skill_sortings_id';

$skillItems_list = $skillItems_list->selectAll($sql_skil);

// javaScriptに渡す(オートコンプリート用)
$json_array_abilite = json_encode($abilite_list, JSON_UNESCAPED_UNICODE);
$json_array_skillItems = json_encode($skillItems_list, JSON_UNESCAPED_UNICODE);

// var_dump($json_array_abilite);
// var_dump($json_array_skillItems);

// 現在の日付
$now_date = date('Y-m-d');

require_once __DIR__ . "/../views/vie_resume_create.php";

?>

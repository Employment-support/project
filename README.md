# コーディング規約

## 目的


## プロジェクト構成

```
app
  ├─controller ページのコントロール
  │  └─admin　管理者ページフォルダー
  ├─models データベース系
  ├─static 
  │  ├─css デザイン
  │  ├─imgs ページに使う画像
  │  └─js JavaScriptファイル
  ├─template　繰り返し使うもののテンプレート
  │  └─admin　管理者ページフォルダー
  └─views　ページのデザイン
      └─admin 管理者ページフォルダー
```

## 命名規則

||||
|--|--|--|
|キャメルケース|camelCase|単語の頭文字をを大文字で区切る|
|スネークケース|snake_case|単語の間をアンダーバー(_)で区切る|
|ケバブケース|kebab-case|単語の間をハイフン(-)で区切る|

* `処理のコメントを書く`
* ローマ字は禁止

### ファイル名

[ファイル名命名規則 別マークダウン](ファイル名命名規則.md)


### php 

Class名は頭文字大文字の`キャメルケース`

```:php
CamelCase
{

}
```

Class内関数は`キャメルケース`
```:php
CamelCase
{
    functhon nameFunc() 
    {

    }
}
```

関数名は`スネークケース`

```:php
functhon snake_case() 
{

}
```

変数名は`スネークケース`

### html

レスポンシブはなし

Class名は`ケバブケース`

```
<div class="kebab-case"></div>
```

## コーディングスタイル

### PHP

`?>` 省略する。

echo するだけの文は`<?= ?>`を使う

## 禁止事項


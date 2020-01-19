Wordpress 自作テンプレート開発環境
====

Wordpress の自作テンプレートを開発する環境を構築します。

### ディレクトリ構造
```
.
├── docker （各種Daemon）
│   │
│   ├── apache （Webサーバー）
│   │   ├── conf.d (apacheの設定ファイル)
│   │   └── logs （apacheのログ）
│   └── mysql （DBサーバー）
│   │   ├── conf.d (mysqlの設定ファイル)
│   │   ├── data (mysqlのデータファイル)
│   │   ├── init （mysqlの初期DDL）
│   │   ├── logs （mysqlのログ）
│   │   └── script （mysql関連のスクリプト）
│   └── php （PHP-FRM）
│   │   └── logs （ｐｈｐのログ）
│   └── phpmyadmin （DB管理ツール）
│
├── public （公開ディレクトリ）
├── ｄｃ．ｓｈ （Dockerの起動用スクリプト）
└── ｓｒｃ （自作テンプレート）
```

## Description

## Demo

## VS. 

## Requirement

## Usage

```
# サーバーを起動する
$ ./dc.sh all start

# サーバーを停止する
$ ./dc.sh all stop
```

### データベースを参照する
phpmyadmin でデータベースを管理できます。

http://localhost:8888/

## Install

```
# 初期化してサーバーを起動する（初回のみ）
$ ./dc.sh all init && ./dc.sh all start
```

## Contribution

## Licence

[MIT](https://github.com/isystk/wordpress/LICENCE)

## Author

[isystk](https://github.com/isystk)



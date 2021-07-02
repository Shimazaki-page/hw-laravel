# 宿題管理サービス

## 概要

laravel学習のため、学習塾での使用を想定した生徒の宿題管理システムを作成します。

## 環境

- コンテナ作成(docker-compose.ymlのあるディレクトリで行う)
    - `docker compose up -d --build`
- コンテナに入る
    - `docker compose exec app bash`
- ライブラリインストール(以下コンテナ内で入力)
    - `composer install`
- .envファイル作成
    - `cp .env.example .env`
- app_key作成
    - `php artisan key:generate`
- テーブル作成
    - `php artisan migrate --seed`

- topへアクセス
    - `localhost:8080`でTOP画面にアクセス

## 機能

### 外部機能

- 生徒側
    - 宿題確認  
      生徒はスレッド上で宿題を確認できます。
    - 宿題画像・コメントの投稿  
      スレッド上で宿題の投稿ができます。
    - ログインPWの変更
- 講師側
    - 宿題提出状況の確認
    - 宿題の投稿・削除  
      スレッド上で宿題を投稿できます。
    - 生徒の追加・削除
    
### ワイヤーフレーム  
https://user-images.githubusercontent.com/79960631/124213053-ea3e6880-db2a-11eb-812c-2c0af898a559.png  

### 内部機能

https://user-images.githubusercontent.com/79960631/123511002-bc37cf00-d6b9-11eb-95c5-a07d11a5c204.png



## ER図
https://user-images.githubusercontent.com/79960631/124212843-9e8bbf00-db2a-11eb-9036-9cabac84ee58.png

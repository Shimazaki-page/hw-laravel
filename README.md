# 宿題管理サービス

## 概要

学習塾での使用を想定した生徒の宿題管理システムを作成します。
生徒の宿題管理を本ツールによって一元化することを目的とします。

## 使用技術  
- PHP 8.0.8
- Laravel 8.48.2
- nginx
- MySQL
- Docker/Docker Compose

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
### 内部機能
https://user-images.githubusercontent.com/79960631/124242518-c80f0f80-db57-11eb-9337-80e222ac8b8f.png
    
### ワイヤーフレーム  
https://user-images.githubusercontent.com/79960631/126025577-f0dfeffe-fe00-495b-aee5-69cd4dff0d78.png

### 主要機能  
  講師が生徒の宿題を確認し、承認することで提出状況のステータスが変更されます。  

  ![image](https://user-images.githubusercontent.com/79960631/128823333-da5fd41a-7d7d-4f73-b6f4-3d2df380dd94.gif)

## ER図
![ER](https://user-images.githubusercontent.com/79960631/125723458-c01b61df-efc8-4e28-936f-e56c6f852404.png)

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

##機能
###外部機能
- 生徒側
  - 宿題確認  
    生徒はスレッド上で宿題を確認できます。  
  - 宿題画像・コメントの投稿  
    スレッド上で宿題の投稿ができます。  
  - ログインPWの変更  
- 講師側
  - 宿題提出状況の確認  
    生徒の提出状況が一眼でわかります。
  - 宿題の投稿・削除  
    スレッド上で宿題を投稿できます。
  - 生徒の追加・削除
###内部機能
https://github.com/Shimazaki-page/hw-laravel/files/6719953/-.1.1.pdf

####画面一覧・機能詳細
- トップ画面
  - 科目の表示→科目別生徒一覧へのリンク
  - 生徒一覧表示→生徒一覧へのリンク


- 科目別生徒一覧画面
  - 生徒一覧表示→生徒別スレッドへのリンク
  - （宿題達成状況一覧）
  - 宿題投稿スレッド→宿題投稿スレッドへのリンク


- 生徒別スレッド画面
  - 最新の宿題表示
  - コメントの投稿・閲覧
  - コメントの削除→削除確認画面へのリンク


- コメント削除確認画面
  - コメント削除


- 講師による宿題投稿スレッド
  - 講師による宿題の投稿・削除


- 講師による宿題削除確認画面
  - 宿題の削除


- 生徒一覧画面
  - 生徒一覧表示→各生徒情報へのリンク
  - 生徒追加→生徒追加画面へのリンク


- 生徒情報画面
  - 生徒削除→生徒削除確認画面へのリンク
  - 生徒の受講科目を表示


- 生徒ホーム画面
  - 生徒別スレッド画面へのリンク
  - パスワード変更画面へのリンク

## ER図  
https://user-images.githubusercontent.com/79960631/123510417-5433b980-d6b6-11eb-9e04-d7f16073ecd1.png
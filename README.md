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

### 内部機能

https://user-images.githubusercontent.com/79960631/123511002-bc37cf00-d6b9-11eb-95c5-a07d11a5c204.png

#### 画面一覧・機能詳細

- トップ画面
    - コンテンツ
        - 科目別生徒一覧へのリンク
        - 生徒一覧へのリンク
    - 処理
        - クラス名の表示
            1. classroomsテーブルから取得
        - 教科名の表示
            1. subjectsテーブルから取得

- 生徒一覧画面
    - コンテンツ
        - 生徒一覧(生徒名がその生徒情報画面へのリンク)
        - 生徒追加(生徒追加画面へのリンク)
        - 生徒削除(生徒削除画面へのリンク)
    - 処理
        - 生徒を一覧表示
            1. usersテーブルでclassroom_idから講師以外のレコードを取得

- 生徒追加画面
    - コンテンツ
        - 生徒情報の入力フォーム
    - 処理
        - フォーム内容を登録
            1. usersテーブルに登録

- 生徒情報画面
    - コンテンツ
        - 生徒情報の表示
        - 生徒削除(削除確認画面へのリンク)
    - 処理
        - 生徒情報の表示
            1. usersテーブルで生徒のレコードを取得

- 生徒削除確認画面
    - コンテンツ
        - 該当生徒を削除するか確認
    - 処理
        - usersテーブルから該当生徒を削除

- 科目別生徒一覧画面
    - コンテンツ
        - 生徒一覧（生徒ごとのスレッドへのリンク)
        - 宿題投稿スレッドへのリンク
    - データ処理
        - 生徒を一覧表示
            1. user_subjectテーブルでsubject_idからレコードを指定し、user_idを取得
            2. usersテーブルで、上で得られたuser_idと指定するclassroom_idから生徒のレコードを取得
            3. 最終的に得られた生徒（user）を表示

- 生徒別スレッド画面
    - コンテンツ
        - 最新の宿題表示
        - コメントの閲覧・投稿・削除
    - 処理
        - コメントの表示
            1. user_subjectテーブルでsubject_idとuser_idからレコードを取得
            2. commentsテーブルで、上で得られたuser_subject_idを使ってレコードを取得
        - 宿題表示
            1. classroom_subjectテーブルでclassroom_idとsubject_idからレコードを取得
            2. homework_commentsテーブルで、上で得られたclassroom_subject_idを使ってレコードを取得
            3. 取得したレコードの最新のものを1件表示

- コメント削除確認画面
    - コンテンツ
        - 削除するコメントの確認表示
    - 処理
        - コメントの削除
            1. commentsテーブルのidから該当レコードを削除

- 講師の宿題投稿スレッド画面
    - コンテンツ
        - 宿題コメントの閲覧・投稿・削除
    - 処理
        - コメントの表示
            1. classroom_subjectテーブルで、classroom_idとsubject_idからレコードを取得
            2. homeworkテーブルで、上で得られたclassroom_subject_idを使ってレコードを取得
            3. 取得したレコードを表示
        - コメントの投稿
            1. homeworkテーブルにフォームに入力した内容を保存

- 宿題削除確認画面
    - コンテンツ
        - 削除する宿題の確認表示
    - 処理
        - homeworkテーブルから該当レコードを削除

- マイページ画面
    - コンテンツ
        - 受講科目の表示(スレッドへのリンク)
        - PW変更など
    - 処理
        - 受講科目の表示
            1. user_subjectテーブルで、user_idからレコードを検索しsubject_idを取得
            2. subjectsテーブルで、上で得られたidからレコードを取得
            3. 取得したレコードのsubject_nameを表示

- ※ログイン画面など
    - これから追加していく予定

## ER図
https://user-images.githubusercontent.com/79960631/124125980-27681380-dab5-11eb-8391-0debef683cd0.png


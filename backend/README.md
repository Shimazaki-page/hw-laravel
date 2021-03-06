#要件定義

##背景

学習塾において、生徒の宿題管理は欠かせない業務の一つである。なぜなら生徒の成績に直結するからだ。しかしそれを効率的に行うことは難しい。たとえば、講師は毎回の宿題確認に10分程度を要し、授業が短縮されてしまう。また生徒は宿題を写し忘れることで提出ができない等といった状況は往々にして見られる。

現在、学習の場のオンライン化が進み、studyplusによる学習管理アプリやwagacoによる業務効率化ツールなどのサービスが流通している。しかし学習塾に向けた、生徒の宿題管理を行えるツールはほとんど確認できない。

そこで、学習塾における宿題管理を効果的に行えるツールを作成した。

##目的

####宿題管理の一元化

- 授業時間を確保できる

- 講師が宿題提出状況を確認できる

- 生徒が随時宿題を確認できる

##機能
###外部機能
- 生徒側
    - 宿題確認
    - 宿題画像・コメントの投稿
    - ログインPWの変更
- 講師側
    - 宿題提出状況の確認
    - 宿題の投稿・削除
    - 生徒の追加・削除
###内部機能

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

##ER図  


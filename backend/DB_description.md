# DB設計 
### 構成  
構成は以下のようになっております。
```
- テーブル名  
  - 説明  
  - 説明  
```


### テーブル一覧  
- users  
  - 認証関連で使用するデータを保存します。  
  - roleは、管理者、塾（先生）、生徒の3つに分けます。    
- students    
  - 生徒の所属するクラスのデータを格納するためusersから分離してます。
  - classroom_id、user_idを持たせてusersテーブルと1体1で結合します。
- classrooms  
  - 生徒のクラスデータを格納します。  
    例えば3A,3B,2A,2B,1A,1Bといった感じです。  
- subjects  
  - 教科を格納します。  
    数学、国語などです。
- student_subject  
  - student,subjectの中間テーブルです。  
- homeworks  
  - 宿題内容を格納するテーブルです。クラスと教科によって定まる1つの教室(例えば3Aの数学教室)で課される宿題を格納します。  
  - classrooms,subjectsの中間テーブルに位置します。  
- threads  
  - homework_id,student_id,statusデータを格納します。statusは、宿題提出状況を○や×で表します。  
  - 1つの宿題が課されると、その教室に在籍している生徒の人数分スレッドが作成されます。
    そして、それぞれのスレッドがステータスをもっています。  
    例えば、3A数学で宿題Xが作成されると、threadsテーブル上で
    - 宿題X(homework_id)  山田(student_id)  ステータス：×(status)  
    - 宿題X(homework_id)  田中(student_id)  ステータス：×(status)  
    のようなデータが作成されます。  
- comments  
  - スレッドにかかれたコメントのデータを格納します。  
    

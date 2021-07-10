@extends('layouts.base')

@section('title')
    生徒一覧
@endsection

@section('main')
    <div class="students">
        <div class="page-title">
            <p>生徒一覧</p>
        </div>
        <div class="students__contents">
            <div class="students__add-student">
                <a class="students__add-student-link" href="">生徒追加</a>
            </div>
            <table class="students__table">
                <tr class="students__column--top">
                    <th class="students__table-item">氏名</th>
                    <th class="students__table-item">メール</th>
                    <th class="students__table-item">クラス</th>
                    <th class="students__table-item">-</th>
                </tr>
                @foreach($students as $student)
                <tr class="students__column--body">
                    <td class="students__table-item--body">{{$student->name}}</td>
                    <td class="students__table-item--body">{{$student->email}}</td>
                    <td class="students__table-item--body">{{$student->classroom->class_name}}</td>
                    <td class="students__table-item--body"><a href="" class="students__delete-link">削除</a></td>
                </tr>
                @endforeach
            </table>
            {{$students->links()}}
        </div>
    </div>
@endsection

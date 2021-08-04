@extends('layouts.base')

@section('title')
    生徒一覧
@endsection

@section('main')
    <div class="students">
        <h1 class="page-title">生徒一覧</h1>
        <div class="students__contents">
            <table class="students__table">
                <tr class="students__column--top">
                    <th class="students__table-item students__table-item--name">氏名</th>
                    <th class="students__table-item students__table-item--mail">メール</th>
                    <th class="students__table-item">クラス</th>
                    <th class="students__table-item">-</th>
                </tr>
                @foreach($students as $student)
                    <tr class="students__column--body">
                        <td class="students__table-item--body">{{$student->user->name}}</td>
                        <td class="students__table-item--body students__table-body--mail">{{$student->user->email}}</td>
                        <td class="students__table-item--body">{{$student->classroom->class_name}}</td>
                        <td class="students__table-item--body"><a
                                href="{{route('verify-delete-student',[$student->id])}}" class="students__delete-link">削除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="students__pagination">
                {{$students->links()}}
            </div>
        </div>
    </div>
@endsection

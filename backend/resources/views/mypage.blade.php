@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
@endsection

@section('main')
    <div class="mypage">
        <div class="page-title">受講科目一覧</div>
        <div class="mypage__name">
            <p>クラス：{{$student->classroom->class_name}}</p>
            <p>氏名：{{$student->user->name}}</p>
        </div>
        <div class="mypage__subjects">
            @foreach($subjects as $subject)
            <a href="{{route('student-homework-list',[$student->id,$subject->id])}}" class="mypage__subject-link">{{$subject->subject_name}}</a>
            @endforeach
        </div>
    </div>
@endsection

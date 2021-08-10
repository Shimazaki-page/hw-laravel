@extends('layouts.base')

@section('title')
    マイページ
@endsection

@section('main')
    <div class="mypage">
        <div class="page-title">受講科目一覧</div>
        <div class="mypage__student-info">
            <p class="mypage__student-class">クラス：{{$student->classroom->class_name}}</p>
            <p class="mypage__student-name">氏名：{{$student->user->name}}</p>
        </div>
        <div class="mypage__subjects">
            @foreach($student_subjects as $student_subject)
                <a href="{{route('student-homework-list',[$student->id,$student_subject->subject->id])}}"
                   class="mypage__subject-link">{{$student_subject->subject->subject_name}}</a>
            @endforeach
        </div>
    </div>
@endsection

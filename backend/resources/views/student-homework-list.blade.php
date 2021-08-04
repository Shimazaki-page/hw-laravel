@extends('layouts.base')

@section('title')
    宿題一覧
@endsection

@section('main')
    <div class="students-hw">
        <div class="page-title">宿題一覧</div>
        <div class="students-hw__student-info">
            <p>クラス：{{$student->classroom->class_name}}</p>
            <p>氏名：{{$student->user->name}}</p>
            <p>科目：{{$subject->subject_name}}</p>
        </div>
        @foreach($homeworks as $homework)
            <a href="{{route('submit-thread',[MyFunction::scopeHomework($homework->id,$student->id)->id,$student->id])}}"
               class="students-hw__card">
                <div class="students-hw__contents">{{$homework->homework}}</div>
                <div class="students-hw__footer">
                    <div class="students-hw__name">投稿者：{{$homework->name}}</div>
                    <div class="students-hw__date">日時：{{$homework->date}}</div>
                </div>
            </a>
        @endforeach
        <div>
            {{$homeworks->links()}}
        </div>
        <a href="{{route('mypage',[$student->id])}}" class="students-hw__for-mypage">マイページへ</a>
    </div>
@endsection

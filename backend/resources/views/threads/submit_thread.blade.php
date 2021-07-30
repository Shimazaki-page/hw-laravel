@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
@endsection

@section('main')
    <div class="submit-thread">
        <div class="page-title">宿題提出スレッド</div>
        <div class="submit-thread__student-name">
            <p class="submit-thread__info">クラス：{{$student->classroom->class_name}}</p>
            <p class="submit-thread__info">科目：{{$homework->subject->subject_name}}</p>
            <p class="submit-thread__info">氏名：{{$student->user->name}}</p>
            <p class="submit-thread__info submit-thread__state">提出状況：{{$thread->status}}</p>
            @if($thread->status==="△")
                <a href="{{route('accept',[$thread->id])}}" class="submit-thread__info submit-thread__accept">承認</a>
            @endif
        </div>
        <div class="submit-thread__homework">
            <div class="submit-thread__homework-label">宿題</div>
            <div class="submit-thread__homework-contents">{{$homework->homework}}</div>
        </div>
        @if($comments)
            @foreach($comments as $comment)
                <div class="submit-thread__card">
                    <div class="submit-thread__contents">{{$comment->comment}}</div>
                    @if($comment->image)
                        <img src="{{$comment->image}}" alt="" class="submit-thread__image">
                    @endif
                    <div class="submit-thread__name">{{$comment->name}}</div>
                    <a href="" class="submit-thread__delete">削除</a>
                </div>
            @endforeach
        @endif
        <form action="{{route('register-comment',[$thread->id,$student->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="comment">コメント</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="name">氏名</label>
                <input type="text" name="name" id="name">
            </div>
            <input type="file" name="image" accept="image/*" multiple>
            <input type="submit" value="投稿">
        </form>
        <a href="{{route('student-homework-list',[$student->id,$homework->subject_id])}}" class="submit-thread__list-link">宿題一覧へ</a>
    </div>
@endsection

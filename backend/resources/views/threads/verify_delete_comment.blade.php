@extends('layouts.base')

@section('title')
    確認画面
@endsection

@section('main')
    <div class="verify-homework">
        <div class="page-title">コメント削除確認画面</div>
        <form class="verify-homework__form-contents" action="{{route('delete-comment')}}" method="post">
            @csrf
            <p class="verify-homework__top-comment">以下のコメントを削除しますか？</p>
            <p class="verify-homework__main-comment">{{$comment->comment}}</p>
            <input type="hidden" name="comment" value="{{$comment->id}}">
            <input type="hidden" name="thread" value="{{$comment->thread_id}}">
            <input type="hidden" name="student" value="{{$student->id}}">
            <input class="verify-homework__submit-button" type="submit" value="削除">
            <button class="verify-homework__back-button" type="button" onclick="history.back()">戻る</button>
        </form>
    </div>
@endsection

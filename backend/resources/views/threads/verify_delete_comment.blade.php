@extends('layouts.base')

@section('title')
    確認画面
@endsection

@section('main')
    <div class="verify-homework">
        <div class="page-title">コメント削除確認画面</div>
        <form action="{{route('delete-comment')}}" method="post">
            @csrf
            <p>以下のコメントを削除しますか？</p>
            <p>{{$comment->comment}}</p>
            <input type="hidden" name="comment" value="{{$comment->id}}">
            <input type="hidden" name="thread" value="{{$comment->thread_id}}">
            <input type="hidden" name="student" value="{{$student->id}}">
            <input type="submit" value="送信">
        </form>
    </div>
@endsection

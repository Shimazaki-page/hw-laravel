@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
@endsection

@section('main')
    <div class="verify-homework">
        <div class="page-title">宿題確認画面</div>
        <form action="{{route('register.homework')}}" method="post">
            @csrf
            <textarea name="comment" id="" cols="30" rows="10" readonly>{{$comment}}</textarea>
            <input type="text" name="name" value="{{$name}}" readonly>
            <input type="hidden" name="classroom_id" value="{{$classroom_id}}">
            <input type="hidden" name="subject_id" value="{{$subject_id}}">
            <input type="submit" value="送信">
        </form>
    </div>
@endsection

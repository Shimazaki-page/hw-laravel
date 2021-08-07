@extends('layouts.base')

@section('title')
    確認画面
@endsection

@section('main')
    <div class="delete-homework">
        <div class="page-title">宿題削除</div>
        <div class="delete-homework__contents-wrap">
            <div class="delete-homework__contents">
                <p>{{$homework->homework}}</p>
                <p>投稿者：{{$homework->name}}</p>
            </div>
            <p>宿題を削除しますか？</p>
            <form action="{{route('delete-homework')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$homework->id}}">
                <input class="delete-homework__submit-button" type="submit" value="削除">
                <button class="delete-homework__back-button" type="button" onclick="history.back()">戻る</button>
            </form>
        </div>
    </div>
@endsection

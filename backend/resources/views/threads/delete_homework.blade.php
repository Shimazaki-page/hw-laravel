@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
@endsection

@section('main')
    <div class="delete-homework">
        <div class="page-title">宿題削除</div>
        <div class="delete-homework__contents">
            <p>{{$homework->homework}}</p>
            <p>{{$homework->name}}</p>
        </div>
        <p>宿題を削除しますか？</p>
        <form action="{{route('delete-homework')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$homework->id}}">
            <input type="submit" value="削除">
        </form>
        <button type="button" onclick="history.back()">戻る</button>
    </div>
@endsection

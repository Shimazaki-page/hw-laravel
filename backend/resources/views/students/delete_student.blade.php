@extends('layouts.base')
@section('title')
@endsection
@section('main')
    <div class="delete-student">
        <div class="page-title">生徒削除</div>
        <div class="delete-student__info">
            <p>"{{$student->user->name}}"の生徒情報を削除しますか？</p>
            <form action="{{route('delete-student')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$student->id}}">
                <input type="submit" value="削除">
                <a href="{{route('students.students-list')}}" class="delete-student__back">戻る</a>
            </form>
        </div>
    </div>
@endsection

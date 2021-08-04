@extends('layouts.base')

@section('title')
    宿題編集
@endsection

@section('main')
    <div class="edit-homework">
        <div class="page-title">宿題編集</div>
        <form action="{{route('register-edit-homework')}}" method="post">
            @csrf
            <input type="hidden" name="homework" value="{{$homework->id}}">
            <div>
                <label for="comment">宿題内容</label>
                <textarea name="comment" id="comment" cols="30" rows="10">{{$homework->homework}}</textarea>
            </div>
            <div>
                <label for="name">氏名</label>
                <input type="text" id="name" name="name" value="{{$homework->name}}">
            </div>
            <input type="submit" value="保存">
            <a href="{{route('homework',[$homework->classroom_id,$homework->subject_id])}}">戻る</a>
        </form>
    </div>
@endsection

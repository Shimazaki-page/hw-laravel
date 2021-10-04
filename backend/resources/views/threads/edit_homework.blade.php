@extends('layouts.base')

@section('title')
    宿題編集
@endsection

@section('main')
    <div class="edit-homework">
        <div class="page-title">宿題編集</div>
        <form class="edit-homework__form-contents" action="{{route('register-edit-homework')}}" method="post">
            @csrf
            <input type="hidden" name="homework" value="{{$homework->id}}">
            <div>
                <label class="edit-homework__form-label" for="comment">宿題内容</label>
                <textarea class="edit-homework__textarea" name="comment" id="comment" cols="30" rows="10">{{$homework->homework}}</textarea>
            </div>
            <div>
                <label class="edit-homework__form-label" for="name">氏名</label>
                <input class="edit-homework__text-field" type="text" id="name" name="name" value="{{$homework->name}}">
            </div>
            <input class="edit-homework__submit-button" type="submit" value="保存">
            <a class="edit-homework__homework-link" href="{{route('homework',[$homework->classroom_id,$homework->subject_id])}}">宿題一覧へ</a>
        </form>
    </div>
@endsection

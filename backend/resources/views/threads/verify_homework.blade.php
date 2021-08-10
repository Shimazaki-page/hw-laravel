@extends('layouts.base')

@section('title')
    確認画面
@endsection

@section('main')
    <div class="verify-homework">
        <div class="page-title">宿題確認画面</div>
        <form class="verify-homework__form" action="{{route('register.homework')}}" method="post">
            @csrf
            <div class="verify-homework__form-item">
                <label for="comment" class="verify-homework__form-label">宿題内容</label>
                <textarea class="verify-homework__textarea" name="comment" id="comment" cols="30" rows="10"
                          readonly>{{$comment}}</textarea>
            </div>
            <div class="verify-homework__form-item">
                <label for="name" class="verify-homework__form-label">名前</label>
                <input class="verify-homework__text-field" id="name" type="text" name="name" value="{{$name}}" readonly>
            </div>
            <div class="verify-homework__form-item">
                <label class="verify-homework__form-label" for="date">日付</label>
                <input class="verify-homework__text-field" type="text" name="date" value="{{$date}}" readonly>
            </div>
            <input type="hidden" name="classroom_id" value="{{$classroom_id}}">
            <input type="hidden" name="subject_id" value="{{$subject_id}}">
            <input class="verify-homework__submit-button" type="submit" value="送信">
            <button class="verify-homework__back-button" type="button" onclick="history.back()">戻る</button>
        </form>
    </div>
@endsection

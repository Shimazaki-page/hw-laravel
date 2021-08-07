@extends('layouts.base')

@section('title')
    宿題投稿
@endsection

@section('main')
    <div class="homework">
        <div class="page-title">宿題投稿</div>
        @if ($errors->any())
            <div class="validation">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="homework__contents-wrap">
            @foreach($homeworks as $homework )
                <div class="homework__card">
                    <div class="homework__comment">{{$homework->homework}}</div>
                    <div class="homework__footer">
                        <p class="homework__footer-content">投稿者：{{$homework->name}}</p>
                        <p class="homework__footer-content">日時：{{$homework->date}}</p>
                        <a href="{{route('edit-homework',[$homework->id])}}" class="homework__edit homework__footer-content">編集</a>
                        <a href="{{route('verify-delete-homework',[$homework->id])}}" class="homework__delete homework__footer-content">削除</a>
                    </div>
                </div>
            @endforeach
            <form class="homework__submit-form" action="{{route('homework.verify')}}" method="get">
                <div>
                    <label class="homework__form-label" for="comment">宿題内容</label>
                    <textarea class="homework__textarea" id="comment" name="comment">{{old('comment')}}</textarea>
                </div>
                <div>
                    <label class="homework__form-label" for="name">名前</label>
                    <input class="homework__text-field" type="text" id="name" name="name" value="{{old('name')}}">
                </div>
                <input type="hidden" name="classroom_id" value="{{$classroom_id}}">
                <input type="hidden" name="subject_id" value="{{$subject_id}}">
                <input class="homework__submit" type="submit" value="投稿">
                <button class="delete-homework__back-button" type="button" onclick="history.back()">戻る</button>
            </form>
        </div>
    </div>
@endsection

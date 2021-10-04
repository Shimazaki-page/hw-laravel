@extends('layouts.base')

@section('title')
    生徒追加
@endsection

@section('main')
    <div class="add-student">
        <div class="page-title">生徒追加</div>
        @if ($errors->any())
            <div class="validation">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('flash_message_fail'))
            <div class="flash-message flash-message__red">
                {{session('flash_message_fail')}}
            </div>
        @endif
        @if(session('flash_message_success'))
            <div class="flash-message flash-message__green">
                {{session('flash_message_success')}}
            </div>
        @endif
        <form class="add-student__form" action="{{route('add-student')}}" method="post">
            @csrf
            <div class="add-student__text-part add-student__form-item">
                <label class="add-student__label" for="name">お名前</label>
                <input class="add-student__text-field" type="name" id="name" name="name" placeholder="生徒氏名を入力してください。"
                       value="{{old('name')}}">
            </div>
            <div class=" add-student__form-item">
                <label class="add-student__label" for="classroom">クラス</label>
                <select class="add-student__select-box" name="classroom" id="classroom">
                    <option value="" hidden>クラスを選んでください</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{$classroom->id}}">{{$classroom->class_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="add-student__form-item add-student__checkbox">
                @foreach($subjects as $subject)
                    <div>
                        <input type="checkbox" name="subject[]" id="{{$subject->id}}" value="{{$subject->id}}">
                        <label for="{{$subject->id}}">{{$subject->subject_name}}</label>
                    </div>
                @endforeach
            </div>
            <div class="add-student__text-part add-student__form-item">
                <label class="add-student__label" for="email">メールアドレス</label>
                <input class="add-student__text-field" type="email" id="email" name="email"
                       placeholder="メールアドレスを入力してください。" value="{{old('email')}}">
            </div>
            <div class="add-student__text-part add-student__form-item">
                <label class="add-student__label" for="password">生年月日</label>
                <input class="add-student__text-field" type="text" id="password" name="password"
                       placeholder="生年月日を入力してください。"
                       value="{{old('password')}}">
            </div>
            <div class="add-student__birth-comment">※半角数字8桁で入力してください。(例；19801101)</div>
            <div class="add-student__form-footer">
                <input class="add-student__submit-button submit-button" type="submit" value="追加">
                <button class="add-student__back-button" type="button" onclick="history.back()">戻る</button>
            </div>
        </form>
    </div>
@endsection

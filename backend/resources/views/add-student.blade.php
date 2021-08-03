@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
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
        <form class="add-student__form" action="{{route('add-student')}}" method="post">
            @csrf
            <div>
                <label for="name">名前</label>
                <input type="name" id="name" name="name" value="{{old('name')}}">
            </div>
            <div>
                <label for="classroom">クラス</label>
                <select name="classroom" id="classroom">
                    @foreach($classrooms as $classroom)
                        <option value="{{$classroom->id}}">{{$classroom->class_name}}</option>
                    @endforeach
                </select>
            </div>
            @foreach($subjects as $subject)
                <div>
                    <input type="checkbox" name="subject[]" id="{{$subject->id}}" value="{{$subject->id}}">
                    <label for="{{$subject->id}}">{{$subject->subject_name}}</label>
                </div>
            @endforeach
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{old('email')}}">
            </div>
            <div>
                <label for="password">生年月日</label>
                <input type="text" id="password" name="password" value="{{old('password')}}">
                <p>※半角数字8桁で入力してください。(例；19801101)</p>
            </div>
            <input type="submit" value="追加">
        </form>
    </div>
@endsection

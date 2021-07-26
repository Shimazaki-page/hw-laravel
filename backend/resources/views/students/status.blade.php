@extends('layouts.base')

@section('title')
    宿題提出状況
@endsection

@section('main')
    <div class="status">
        <p>{{$subject}}</p>
        <p>{{$classroom}}</p>
    </div>
@endsection

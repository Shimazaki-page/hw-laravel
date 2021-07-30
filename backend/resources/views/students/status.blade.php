@extends('layouts.base')

@section('title')
    宿題提出状況
@endsection

@section('main')
    <div class="status">
        <div class="page-title">宿題提出状況</div>
        <div class="status__title">
            <p class="status__title-left">教科 : {{$subject->subject_name}}</p>
            <p>クラス : {{$classroom->class_name}}</p>
        </div>
        <table class="status__table">
            <tr class="status__column status__column--top">
                <th></th>
                @foreach($homeworks as $homework)
                    <th class="status__date">{{$homework->date}}</th>
                @endforeach
            </tr>
            @foreach($students as $student )
                <tr class="status__column status__column--body">
                    <th class="status__table-name">{{$student->user->name}}</th>
                    @foreach($homeworks as $homework)
                        @foreach(MyFunction::scopeStatus($student->id,$homework->id) as $thread)
                            @if($thread->status)
                            <td class="status__table-status">
                                <a class="status__table-link" href="{{route('submit-thread',[$thread->id,$student->id])}}">{{$thread->status}}</a>
                            </td>
                            @else
                                <td class="status__table-status">未</td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>
            @endforeach
        </table>
        <div class="status__button">
            <a href="{{route('homework',[$classroom->id,$subject->id])}}" class="status__submit-link">宿題投稿</a>
        </div>
    </div>
@endsection

@extends('layouts.base')

@section('title')
    宿題提出状況
@endsection

@section('main')
    <div class="status">
        <div class="page-title">宿題提出状況</div>
        <div class="status__title">
            <p class="status__title-left">教科 : {{$subject->subject_name}}</p>
            <p class="status__title-left">クラス : {{$classroom->class_name}}</p>
            <div class="status__select-month">
                <p class="status__title-left--month">月</p>
                <select name="select-month" onchange="location.href=value;">
                    <option >選択</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-01'])}}">1月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-02'])}}">2月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-03'])}}">3月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-04'])}}">4月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-05'])}}">5月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-06'])}}">6月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-07'])}}">7月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-08'])}}">8月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-09'])}}">9月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-10'])}}">10月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-11'])}}">11月</option>
                    <option value="{{route('students.status',[$classroom->id,$subject->id,'2021-12'])}}">12月</option>
                </select>
            </div>
        </div>
        <table class="status__table">
            <tr class="status__column status__column--top">
                <th></th>
                @foreach($homeworks as $homework)
                    <th class="status__date">{{$homework->date->format('Y/m/d')}}</th>
                @endforeach
            </tr>
            @foreach($students as $student )
                <tr class="status__column status__column--body">
                    <th class="status__table-name">{{$student->user->name}}</th>
                    @foreach($homeworks as $homework)
                        @foreach(MyFunction::scopeStatus($student->id,$homework->id) as $thread)
                            @if($thread->status)
                                <td class="status__table-status">
                                    <a class="status__table-link"
                                       href="{{route('submit-thread',[$thread->id,$student->id])}}">{{$thread->status}}</a>
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

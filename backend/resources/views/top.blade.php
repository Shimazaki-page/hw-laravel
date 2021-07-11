@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
@endsection

@section('main')
    <div class="top">
        <div class="page-title">宿題提出状況</div>
        <table class="top__table">
            @foreach($classes as $class)
                <tr class="top__column">
                    <th class="top__line top__line--class">
                        {{$class->class_name}}
                    </th>
                    @foreach($subjects as $subject)
                        <td class="top__line top__line--subject">
                            <a class="top__subject-link"
                               href="{{route('students.classroom-students',[$class->id,$subject->id])}}">
                                {{$subject->subject_name}}
                            </a>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
@endsection

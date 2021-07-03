@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
@endsection

@section('main')
    <div class="top">
        <div class="top__contents">
            <p class="top__class-list-title">クラス一覧</p>
            <table class="top__table">
                @foreach($classes as $class)
                    <tr class="top__column">
                        <th class="top__line--class">
                            {{$class->class_name}}
                        </th>
                        @foreach($subjects as $subject)
                            <td class="top__line--subject">
                                <a class="top__subject-link" href="{{route('students.classroom-students',[$class->id,$subject->id])}}">
                                    {{$subject->subject_name}}
                                </a>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
            <a href="" class="top__students-list-link">生徒一覧へ</a>
        </div>
    </div>
@endsection

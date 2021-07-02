@extends('layouts.base')

@section('title')
    TOP | 宿題管理システム
@endsection

@section('main')
    <div class="top">
        <ul class="top__lists">
            <li class="top__list">
                <a href="" class="top__link">生徒一覧</a>
            </li>
            <li class="top__list">
                クラス一覧
            </li>
        </ul>
        <table class="top__table">
            @foreach($classes as $class)
                <tr class="top__column">
                    <th class="top__line--class">
                        {{$class->class_name}}
                    </th>
                    @foreach($subjects as $subject)
                        <td class="top__line--subject">
                            <a href="{{route('students.classroom-students',[$class->id,$subject->id])}}">
                                {{$subject->subject_name}}
                            </a>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
@endsection

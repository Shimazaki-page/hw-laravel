@extends('layouts.base')

@section('title')
    クラス一覧 | 宿題管理システム
@endsection

@section('main')
    <div class="top">
        <div class="page-title">クラス一覧</div>
        <table class="top__table">
            @foreach($classes as $class)
                <tr class="top__column">
                    <th class="top__line top__line--class">
                        {{$class->class_name}}
                    </th>
                    @foreach($subjects as $subject)
                        <td class="top__line top__line--subject">
                            <a class="top__subject-link"
                               href="{{route('students.status',[$class->id,$subject->id])}}">
                                {{$subject->subject_name}}
                            </a>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
@endsection

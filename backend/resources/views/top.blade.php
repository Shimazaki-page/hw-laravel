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
            <tr class="top__column">
                <th class="top__line--class"></th>
                <td class="top__line--subject"></td>
            </tr>
        </table>
    </div>
@endsection

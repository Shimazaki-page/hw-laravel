@extends('layouts.base')

@section('title')
    宿題提出
@endsection

@section('main')
    <div class="submit-thread">
        <div class="page-title">宿題提出スレッド</div>
        @if ($errors->any())
            <div class="validation">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="submit-thread__student-name">
            <p class="submit-thread__info">クラス：{{$student->classroom->class_name}}</p>
            <p class="submit-thread__info">科目：{{$homework->subject->subject_name}}</p>
            <p class="submit-thread__info">氏名：{{$student->user->name}}</p>
            <p class="submit-thread__info submit-thread__state">提出状況：{{MyFunction::transStatus($thread->status)}}</p>
            @canany(['teacher','admin'])
                @if($thread->status==2)
                    <a href="{{route('accept',[$thread->id,$student->id])}}"
                       class="submit-thread__info submit-thread__accept">承認</a>
                @endif
            @endcanany
        </div>
        <div class="submit-thread__contents-wrap">
            <div class="submit-thread__homework">
                <div class="submit-thread__homework-label">宿題</div>
                <div class="submit-thread__homework-contents">{{$homework->homework}}</div>
            </div>
            @if($comments)
                @foreach($comments as $comment)
                    <div class="submit-thread__card">
                        <div class="submit-thread__card-top">
                            <div class="submit-thread__contents">{{$comment->comment}}</div>
                            @if($comment->image)
                                <div class="submit-thread__image">
                                    <img src="{{asset('storage/homework/'.$comment->image)}}" alt=""
                                         class="submit-thread__image">
                                </div>
                            @else
                                <div class="submit-thread__image--none"></div>
                            @endif
                        </div>
                        <div class="submit-thread__footer">
                            <div class="submit-thread__name">投稿者：{{$comment->name}}</div>
                            @canany(['teacher','admin'])
                                <a href="{{route('verify-delete-comment',[$comment->id,$student->id])}}"
                                   class="submit-thread__delete">削除</a>
                            @endcanany
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="paginate">
                {{$comments->links()}}
            </div>
            <form action="{{route('register-comment',[$thread->id,$student->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="submit-thread__form-part">
                    <label for="comment">コメント</label>
                    <textarea class="submit-thread__textarea" name="comment" id="comment">{{old('comment')}}</textarea>
                </div>
                <div class="submit-thread__form-part">
                    <label for="name">氏名</label>
                    <input class="submit-thread__name-area" type="text" name="name" id="name" value="{{old('name')}}">
                </div>
                <div class="submit-thread__form-part">
                    <input type="file" name="image" accept="image/*">
                </div>
                <input class="submit-thread__form-button" type="submit" value="投稿">
                @canany(['teacher','admin'])
                    <a href="{{route('students.status',[$student->classroom_id,$homework->subject_id,now()->format('Y-m')])}}"
                       class="submit-thread__status-link">
                        宿題提出状況へ
                    </a>
                @endcanany
                @canany(['student','admin'])
                    <a href="{{route('student-homework-list',[$student->id,$homework->subject_id])}}"
                       class="submit-thread__list-link">宿題一覧へ</a>
                @endcanany
            </form>
        </div>
    </div>
@endsection

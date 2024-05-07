@extends('board.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('boards.update', $board)}}" method="post">
        @csrf
        @method('patch')
        <table>
            <tr>
                <th>번호</th>
                <th>{{$board->id}}</th>
            </tr>
            <tr>
                <th>작성일</th>
                <th>{{$board->created_at}}</th>
            </tr>
            @can('update', $board)
            <tr>
                <th>제목</th>
                <th>
                    <input type="text" name="title" class="form-control" id="title" autocomplete="off" value="{{$board->title}}">
                </th>
            </tr>
            <tr>
                <th>조회수</th>
                <th>{{$board->views}}</th>
            </tr>
            <tr>
                <td colspan="2">상세내용</td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea rows="10" cols="40" name="details" class="form-control" id="details" autocomplete="off">{{$board->details}}</textarea>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">저장</button>
        @else
        <tr>
            <th>제목</th>
            <th>{{$board->title}}</th>
        </tr>
        <tr>
            <th>조회수</th>
            <th>{{$board->views}}</th>
        </tr>
        <tr>
            <td colspan="2">상세내용</td>
        </tr>
        <tr>
            <td colspan="2">{{$board->details}}</td>
        </tr>
        </table>
        @endcan
        <a href="{{route("boards.index")}}">
            <button type="button" class="btn btn-primary">뒤로가기(취소)</button>
        </a>
    </form>
@endsection

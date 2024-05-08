@extends('board.layout')

@section('content')

    <a href="{{route("boards.create")}}">
        <button type="button" class="btn btn-dark" style="float: right;">생성</button>
    </a>

    <table class="table table-striped table-hover">
        <colgroup>
            <col width="15%"/>
            <col width="55%"/>
            <col width="15%"/>
            <col width="15%"/>
        </colgroup>
        <thead>
        <tr bgcolor="#a9a9a9">
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">조회수</th>
            <th scope="col">작성일</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($boards as $key => $board)
            <tr bgcolor="#d3d3d3">
                <th scope="row">{{$board->id}}</th>
                <td>
                    <a href="{{route("boards.show", $board->id)}}">{{$board->title}}</a>
                </td>
                <td>{{$board->views}}</td>
                <td>{{$board->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $boards->links() !!}

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection

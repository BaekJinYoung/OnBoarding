@extends('board.layout')

@section('content')

    <h2 class="mt-4 mb-3">생성</h2>

    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('boards.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">제목</label>
            <input type="text" name="title" class="form-control" id="title" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">내용</label>
            <textarea rows="10" cols="40" name="details" class="form-control" id="details" autocomplete="off"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">생성</button>
    </form>
@endsection


@extends('auth.layout')
@section('content')

<h2>회원가입</h2>
<form action="{{ route('register') }}" method="post">
    @csrf

    <div>
        <label for="username">아이디</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
    </div>

    <div>
        <label for="password">비밀번호</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">비밀번호 확인</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <div>
        <label for="nickname">닉네임</label>
        <input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}" required>
    </div>

    <div>
        <button type="submit">가입</button>
    </div>
</form>

@endsection


<h2>로그인</h2>
<form action="{{route('login') }}" method="post" >
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
        <button type="submit">로그인</button>
    </div>
</form>


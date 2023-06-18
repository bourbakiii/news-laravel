@extends('app')

  
@section('content')
    <div class="page auth-page">
    <h1 class="auth-page__title">Вход</h1>

    @if ($errors->any())
            <div class="validation-errors">
                @foreach ($errors->all() as $error)
                    <li class="validation-error__item">{{ $error }}</li>
                @endforeach
            </div>
    @endif

    <form class='auth-form' method="POST" action="/login">
        @csrf

        <div class="form__block">
          <label for="email">Email</label>
            <input placeholder="Email" type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form__block">
            <label for="email">Пароль</label>
           <input placeholder="Пароль" type="password" id="password" name="password" required>
        </div>
 <div>
           
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
@endsection



@extends('app')
  
@section('content')
    <div class="page auth-page">
    <h1 class="auth-page__title">Регистрация</h1>

    @if ($errors->any())
            <div class="validation-errors">
                @foreach ($errors->all() as $error)
                    <li class="validation-error__item">{{ $error }}</li>
                @endforeach
            </div>
    @endif

    <form class='auth-form' method="POST" action="/register">
        @csrf

        <div class="form__block">
            <label for="name">Имя</label>
            <input placeholder="Имя" type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form__block">
            <label for="email">Email</label>
            <input  placeholder="Email"  type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form__block">
            <label for="password">Пароль</label>
            <input  placeholder="Пароль"  type="password" id="password" name="password" required>
        </div>

        <div class="form__block">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input  placeholder="Повтор пароля"  type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
@endsection

@extends('layout.login')
@section('content')
  @if(!empty($errors))
    @if($errors->any())
      @foreach($errors->all() as $error)
        <strong style="color: red;">{{ $error }}</strong>
      @endforeach
    @endif
  @endif

  @if(!empty($message))
    <strong style="color: red;">{{ $error }}</strong>
  @endif
  <br />
  <div class="container">
      <section>
          <div id="container_demo">
              <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
              <a class="hiddenanchor" id="tologin"></a>
              <div id="wrapper">
                  <div id="login" class="animate form">
                      <form method="post" autocomplete="on" action="{{ route('login') }}">
                          <h1>Войти</h1>
                          <p>
                              <label for="username" class="uname" data-icon="u"> Ваш email или логин </label>
                              <input id="username" name="username" required="required" type="text" placeholder="логин или mymail@mail.ru">
                          </p>
                          <p>
                              <label for="password" class="youpasswd" data-icon="p"> Ваш пароль </label>
                              <input id="password" name="password" required="required" type="password" placeholder="например X8df!90EO">
                          </p>
                          <p class="keeplogin">
                              Запомнить меня?  <input type="checkbox" name="remember" value="0">
                          </p>
                          <p class="login button">
                              <input type="submit" value="Войти">
                          </p>
                          <p class="change_link">
                              <a href="/forget" class="to_register">Забыли пароль?</a>
                          </p>
                          <p class="change_link">
                              Вы еще не с нами?
                              <a href="/signup" class="to_register">Присоединиться</a>
                          </p>

                          {!! csrf_field() !!}
                      </form>
                  </div>
              </div>
          </div>
      </section>
  </div>
@stop

<?php include __DIR__.'/header.php' ; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/styles/css/demo.css">
    <link rel="stylesheet" type="text/css" href="/public/styles/css/style3.css">
    <link rel="stylesheet" type="text/css" href="/public/styles/css/animate-custom.css">
</head>
<body>
<br />
<?php if(isset($errors) && $errors != null): ?>
    <strong style="color: red;"><?=$errors;?></strong>
<?php elseif(isset($success) && $success != null): ?>
    <strong style="color: green;"><?=$success;?></strong>
<?php endif; ?>
<br />
<div class="container">
    <section>
        <div id="container_demo">
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="register" class="animate form">
                    <form action="mysuperscript.php" autocomplete="on">
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
                            <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping">
                            <label for="loginkeeping">Запомнить меня</label>
                        </p>
                        <p class="login button">
                            <input type="submit" value="Войти">
                        </p>
                        <p class="change_link">
                            Вы еще не с нами?
                            <a href="#toregister" class="to_register">Присоединиться</a>
                        </p>
                    </form>
                </div>
                <div id="login" class="animate form">
                    <?php echo Form::open(array('method' => 'post')); ?>
                        <h1> Регистрация </h1>
                        <p>
                            <label for="usernamesignup" class="uname" data-icon="u">Ваш логин</label>
                            <?php echo Form::text('login', null, array('id' => 'usernamesignup', 'required', 'placeholder' => 'mysuperusername690')); ?>
                            <!--<input id="usernamesignup" name="login" required="required" type="text" placeholder="mysuperusername690">-->
                        </p>
                        <p>
                            <label for="emailsignup" class="youmail" data-icon="e">Ваш email</label>
                            <?php echo Form::email('email', null, array('id' => 'emailsignup', 'required', 'placeholder' => 'mysupermail@mail.ru')); ?>
                            <!--<input id="usernamesignup" name="login" required="required" type="text" placeholder="mysuperusername690">-->
                        </p>
                        <p>
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Ваш пароль </label>
                            <?php echo Form::password('password', array('id' => 'passwordsignup', 'required', 'placeholder' => 'например X8df!90EO')); ?>
                            <!--<input id="passwordsignup" name="password" required="required" type="password" placeholder="например X8df!90EO">-->
                        </p>
                        <p>
                            <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Пожалуйста, подтвердите пароль </label>
                            <?php echo Form::password('password_confirmation', array('id' => 'passwordsignup_confirm', 'required', 'placeholder' => 'например X8df!90EO')); ?>
                            <!--<input id="passwordsignup_confirm" name="password_confirmation" required="required" type="password" placeholder="например X8df!90EO">-->
                        </p>
                        <p class="signin button">
                            <input type="submit" value="Регистрация">
                        </p>
                        <p class="change_link">
                            Вы уже зарегистрированы?
                            <a href="/login" class="to_register"> Тогда войдите </a>
                        </p>
                    <?php echo Form::close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
<?php include __DIR__.'/footer.php'; ?>
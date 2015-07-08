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
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <?php echo Form::open(array('method' => 'post', 'autocomplete' => 'on')); ?>
                            <h1>Войти</h1>
                            <p>
                                <label for="username" class="uname" data-icon="u"> Ваш email или логин </label>
                                <!--<input id="username" name="username" required="required" type="text" placeholder="логин или mymail@mail.ru">-->
                                <?php echo Form::text('login', null, array('id' => 'username', 'required', 'placeholder' => 'логин или mymail@mail.ru')); ?>
                            </p>
                            <p>
                                <label for="password" class="youpasswd" data-icon="p"> Ваш пароль </label>
                                <!--<input id="password" name="password" required="required" type="password" placeholder="например X8df!90EO">-->
                                <?php echo Form::password('password', array('id' => 'password', 'required', 'placeholder' => 'например X8df!90EO')); ?>
                            </p>
                            <p class="keeplogin">
                                <!--<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping">-->
                                <!--<label for="loginkeeping">Запомнить меня</label>-->
                                Запомнить меня?  <?php echo Form::checkbox('remember', '1'); ?>
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
                        <?php echo Form::close(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </body>
    </html>
<?php include __DIR__.'/footer.php'; ?>
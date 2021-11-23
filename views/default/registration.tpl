{if !isset($arUser)}
    <div id="registerBox" class="popups">
        <div class="popups__body">
            <div class="popups__content">
                <a href="#" class="popups__close close-popups">X</a>
                <div class="popups__title">
                    <h2 class="align-center">Регистрация</h2>
                </div>

                <div class="row" style="text-align: center;">

                    <div class="row">
                        <div class="col-4 col-12-xsmall">
                            <p><input type="text" id="surname" name="surname" placeholder="Фамилия"></p>
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <p><input type="text" id="name" name="name" placeholder="Имя"></p>
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <p><input type="text" id="patronymic" name="patronymic" placeholder="Отчество"></p>
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <p><input type="email" id="email" name="email" placeholder="Эл. почта"></p>
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <div class="password">
                                <input type="password" id="pwd1" name="pwd1" placeholder="Придумайте пароль">
                                <a href="#" class="pwd1-control"></a>
                            </div>
                            <label class="span_pwd"></label>
                            <p></p>
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <div class="password">
                                <input type="password" id="pwd2" name="pwd2" placeholder="Повторите пароль">
                                <a href="#" class="pwd2-control"></a>
                            </div>
                            <label class="span_pwd"></label>

                        </div>

                    </div>
                    <p style="color: #797878; font-size:12px;">Пароль должен быть не менее 6 символов, содержать цифры и
                        латинские буквы, в том числе заглавные,
                        и не должен совпадать с именем и эл. почтой</p>
                    <br>

                    <div class="col-12">
                        <input type="submit" value="Зарегистрироваться" class="primary close-popups"
                            onclick="RegisterNewUser();">
                    </div>
                    <div class="col-12">
                        <a href="#authorization" class="popups-link">Я уже зарегистрирован</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
{/if}
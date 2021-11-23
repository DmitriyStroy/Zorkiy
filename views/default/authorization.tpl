{if !isset($arUser)}
    <div id="authorization" class="popups">
        <div class="popups__body">
            <div class="popups__content">
                <a href="#" class="popups__close close-popups">X</a>
                <div class="popups__title">
                    <h2 class="align-center">Авторизация</h2>
                </div>
                <div class="row" style="text-align: center;">
                    <div class="row">
                        <div class="col-12 col-12-xsmall">
                            <input type="text" id="email" name="email" placeholder="Эл. почта">
                            <label class="span_email"></label>
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <div class="password">
                                <input type="password" id="pwd" name="pwd" placeholder="Введите пароль">
                                <a href="#" class="pwd-control"></a>
                            </div>
                            <label class="span_pwd"></label>
                        </div>

                        <br>

                        <div class="col-12 col-12-xsmall">
                            <input type="submit" value="Авторизироваться" class="primary" onclick="login();">
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <a href="#registerBox" class="popups-link">Зарегистрироваться</a>
                            |
                            <a href="#forgot-password" class="popups-link align-right">Забыл пароль?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}
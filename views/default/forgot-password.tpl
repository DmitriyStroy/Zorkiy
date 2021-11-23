{if !isset($arUser)}
    <div id="forgot-password" class="popups">
        <div class="popups__body">
            <div class="popups__content">
                <a href="#" class="popups__close close-popups">X</a>
                <div class="popups__title">
                    <h2 class="align-center">Забыл пароль</h2>
                </div>
                <div class="row align-center">
                    <div class="col-12 col-12-xsmall">
                        <input type="text" id="fp-email" name="fp-email" placeholder="Эл. почта">
                        <label class="span"></label>
                    </div>
                    <br>
                    <div class="col-12 col-12-xsmall">
                        <input type="submit" value="Сбросить пароль" class="primary" onclick="forgotpassword();">
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}
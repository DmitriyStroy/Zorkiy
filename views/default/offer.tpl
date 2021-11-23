<div id="overlay">
    <div class="popup">
        <div class="modal-inner">
            <div id="offer" class="row" style="justify-content: center;">
                <div class="col-6 col-12-medium">
                    <header>
                        <h2>Выгодное предложение</h2>
                    </header>
                    <p style="text-align: center;">На видеонаблюдения, сигнализацию и домофонию.
                        <br> Подберем решения. Учтем пожелания. Сохраним бюджет.
                        <br> Просто оставьте номер телефона.
                    </p>
                    <p><input type="tel" id="O_Phone" name="O_Phone" placeholder="+38 (___) __ __ __" /></p>
                    <p><a class="button"
                            onclick="offer(); document.getElementById('overlay').style.display='none';">Отправить</a>
                    </p>
                </div>
                <div class="col-6 col-12-medium"><img class="image fit" src="/templates/default/images/popup-img.png"
                        alt="Выгодное предложение"></div>
            </div>
            <a class="close-modal close_modal icon-close"
                onclick="document.getElementById('overlay').style.display='none';">
                &#10006;
            </a>
        </div>
    </div>
</div>
<div id="popups" class="popups">
    <div class="popups__body">
        <div class="popups__content">
            <a href="#" class="popups__close close-popups">X</a>
            <div class="popups__title">
                <h2>Расчет стоимости в трех вариантах сметы</h2>
            </div>

            <p>С вами свяжется наш инженер, для уточнения деталей. Составим расчет в течение 24 часов</p>

            <div id="feedback" class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="text" id="FB_Name" name="FB_Name" placeholder="Имя *">
                </div>

                <div class="col-6 col-12-xsmall">
                    <input type="email" id="FB_Email" name="FB_Email" placeholder="Email *">
                </div>

                <div class="col-6 col-12-xsmall">
                    <input type="tel" id="FB_Phone" name="FB_Phone" placeholder="Телефон *">
                </div>

                <div class="col-12">
                    <textarea id="FB_Description" name="FB_Description" placeholder="Введите сообщение" rows="6"></textarea>
                </div>

                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Заказать" class="primary" onclick="feedback(); document.getElementById('overlay').style.display='none';"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
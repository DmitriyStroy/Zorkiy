<?php
/* Smarty version 3.1.39, created on 2021-11-11 10:19:45
  from 'E:\OpenServer\domains\localhost\views\default\feedback.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618cc4118d1bc8_29155243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adc69e2a104177b1dc841a7b6781160b2b2dd2ce' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\feedback.tpl',
      1 => 1636615177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618cc4118d1bc8_29155243 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="popups" class="popups">
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
</div><?php }
}

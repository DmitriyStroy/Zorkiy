<?php
/* Smarty version 3.1.39, created on 2021-08-26 20:16:28
  from 'E:\OpenServer\domains\localhost\views\default\service.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6127cc6c47c990_20288203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c67bbb791f8b7076fed2265421994bb27f816abf' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\service.tpl',
      1 => 1626959742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6127cc6c47c990_20288203 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="popups" class="popups">
    <div class="popups__body">
        <div class="popups__content">
            <a href="#" class="popups__close close-popups">X</a>
            <div class="popups__title">
                <h2>Расчет стоимости в трех вариантах сметы</h2>
            </div>

            <p>С вами свяжется наш инженер, для уточнения деталей. Составим расчет в течение 24 часов</p>


            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="text" id="name" placeholder="Имя *">
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="email" id="email" placeholder="Email *">
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="tel" id="phone" placeholder="Телефон *">
                </div>

                <div class="col-12">
                    <textarea id="message" placeholder="Введите сообщение" rows="6"></textarea>
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Заказать" class="primary" onclick="post_query('send', 'contact', 'name.phone.email.message')"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}

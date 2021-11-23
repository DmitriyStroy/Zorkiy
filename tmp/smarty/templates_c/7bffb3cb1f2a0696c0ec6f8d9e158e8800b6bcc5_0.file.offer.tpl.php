<?php
/* Smarty version 3.1.39, created on 2021-11-11 10:19:45
  from 'E:\OpenServer\domains\localhost\views\default\offer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618cc41188e9f4_69045341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bffb3cb1f2a0696c0ec6f8d9e158e8800b6bcc5' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\offer.tpl',
      1 => 1636615169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618cc41188e9f4_69045341 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="overlay">
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
</div><?php }
}

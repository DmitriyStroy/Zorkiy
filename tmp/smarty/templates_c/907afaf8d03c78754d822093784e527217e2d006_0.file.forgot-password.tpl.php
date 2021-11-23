<?php
/* Smarty version 3.1.39, created on 2021-11-22 18:34:08
  from 'E:\OpenServer\domains\localhost\views\default\forgot-password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619bb870539c09_48071627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '907afaf8d03c78754d822093784e527217e2d006' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\forgot-password.tpl',
      1 => 1637595153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619bb870539c09_48071627 (Smarty_Internal_Template $_smarty_tpl) {
if (!(isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
    <div id="forgot-password" class="popups">
        <div class="popups__body">
            <div class="popups__content">
                <a href="#" class="popups__close close-popups">X</a>
                <div class="popups__title">
                    <h2 class="align-center">Забыл пароль</h2>
                </div>
                <div class="row align-center">
                    <div class="col-12 col-12-xsmall">
                        <p><input type="text" id="fp-email" name="fp-email" placeholder="Эл. почта"></p>
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
<?php }
}
}

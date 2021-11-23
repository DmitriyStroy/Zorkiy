<?php
/* Smarty version 3.1.39, created on 2021-11-22 21:31:54
  from 'E:\OpenServer\domains\localhost\views\default\authorization.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619be21a959fe3_35274466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '843702f44c0b581a9f74e37028ce03d6c399a171' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\authorization.tpl',
      1 => 1637605913,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619be21a959fe3_35274466 (Smarty_Internal_Template $_smarty_tpl) {
if (!(isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
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
<?php }
}
}

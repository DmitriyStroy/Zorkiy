<?php
/* Smarty version 3.1.39, created on 2021-11-22 21:40:18
  from 'E:\OpenServer\domains\localhost\views\default\registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619be412e622b4_64180810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2feddd927d505897cc0eeb9d974c8941580c085' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\registration.tpl',
      1 => 1637606415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619be412e622b4_64180810 (Smarty_Internal_Template $_smarty_tpl) {
if (!(isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
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
<?php }
}
}

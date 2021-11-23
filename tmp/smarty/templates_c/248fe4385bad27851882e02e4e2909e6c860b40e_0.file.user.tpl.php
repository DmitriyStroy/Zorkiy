<?php
/* Smarty version 3.1.39, created on 2021-11-19 16:38:13
  from 'E:\OpenServer\domains\localhost\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6197a8c525c924_73422686',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '248fe4385bad27851882e02e4e2909e6c860b40e' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\user.tpl',
      1 => 1637328943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6197a8c525c924_73422686 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div id="UserData">
        <h1>Профиль</h1>
        <dl>
            <dt>Личные данные:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Фамилия</label>
                        <input type="text" id="newSurname" name="newSurname" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Surname'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Имя</label>
                        <input type="text" id="newName" name="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Name'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Отчество</label>
                        <input type="text" id="newPatronymic" name="newPatronymic" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Patronymic'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Телефон</label>
                        <input type="text" id="newPhone" name="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Phone'];?>
">
                    </div>
                </div>
            </dd>

            <hr class="major">

            <dt>Контакты:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Электронная почта </label>
                        <label><?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Login'];?>
</label>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Статус почты</label>
                        <?php if ($_smarty_tpl->tpl_vars['arUser']->value['U_Confirmation'] == 1) {?>
                            <label style="color: green;">Подтверждена</label>
                        <?php } else { ?>
                            <label style="color: red;">Не подтверждена</label>
                            <ul class="actions">
                                <li><a class="button primary" onclick="RequestConfirmationEmail();">Подтвердить почту</a></li>
                            </ul>
                        <?php }?>
                    </div>

                </div>
            </dd>

            <hr class="major">

            <dt>Адрес доставки:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Город</label>
                        <input type="text" id="newCity" name="newCity" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_City'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Улица</label>
                        <input type="text" id="newStreet" name="newStreet" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Street'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Дом</label>
                        <input type="text" id="newHouse" name="newHouse" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_House'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Квартира</label>
                        <input type="text" id="newApartment" name="newApartment" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Apartment'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Отделение новой почты</label>
                        <input type="text" id="newBranch" name="newBranch" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['U_Branch'];?>
">
                    </div>
                </div>
            </dd>

            <hr class="major">

            <dt>Изменение пароля:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-4 col-12-xsmall">
                        <label>Текущий пароль</label>
                        <input type="password" id="oldpwd" name="oldpwd" value="">
                    </div>
                    <div class="col-4 col-12-xsmall">
                        <label>Новый пароль</label>
                        <input type="password" id="newpwd" name="newpwd" value="">
                    </div>
                    <div class="col-4 col-12-xsmall">
                        <label>Новый пароль еще раз</label>
                        <input type="password" id="newpwd2" name="newpwd2" value="">
                    </div>
                </div>
            </dd>
        </dl>
        <hr class="major">
        <P style="color: red;">Для сохранения изменений, введите текущий пароль.</P>
        <ul class="actions">
            <li><a class="button primary" onclick="UpdateUserData();">Сохранить</a></li>
        </ul>
</div><?php }
}

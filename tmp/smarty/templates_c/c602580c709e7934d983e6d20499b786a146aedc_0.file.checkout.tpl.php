<?php
/* Smarty version 3.1.39, created on 2021-11-03 23:41:41
  from 'E:\OpenServer\domains\localhost\views\default\checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6182f405824a50_95238908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c602580c709e7934d983e6d20499b786a146aedc' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\checkout.tpl',
      1 => 1635972075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6182f405824a50_95238908 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Корзина</h1>
<?php $_smarty_tpl->_assignInScope('hide', '');?>
<div class="table-wrapper">
    <div id="form-checkout">
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Товар</th>
                    <th>Кол.</th>
                    <th>Цена за од.</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                    <tr>
                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                        <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['ProductName'];?>
</a></td>
                        <td>
                            <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
">
                                <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
" />
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

                            </span>
                        </td>
                        <td>
                            <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
">
                                <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_Price'];?>
" />
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['Model_Price'];?>
 ₴
                            </span>
                        </td>
                        <td>
                            <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
">
                                <input name="itemRealCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['RealPrice'];?>
" />
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['RealPrice'];?>
 ₴
                            </span>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </table>

        <hr class="major">

        <h2>Оформление заказа</h2>
        <div id="OrederUserInfoBox">
            <?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
                <?php $_smarty_tpl->_assignInScope('Surname', $_smarty_tpl->tpl_vars['arUser']->value['U_Surname']);?>
                <?php $_smarty_tpl->_assignInScope('Name', $_smarty_tpl->tpl_vars['arUser']->value['U_Name']);?>
                <?php $_smarty_tpl->_assignInScope('Patronymic', $_smarty_tpl->tpl_vars['arUser']->value['U_Patronymic']);?>

                <?php $_smarty_tpl->_assignInScope('Phone', $_smarty_tpl->tpl_vars['arUser']->value['U_Phone']);?>

                <?php $_smarty_tpl->_assignInScope('City', $_smarty_tpl->tpl_vars['arUser']->value['U_City']);?>
                <?php $_smarty_tpl->_assignInScope('Street', $_smarty_tpl->tpl_vars['arUser']->value['U_Street']);?>
                <?php $_smarty_tpl->_assignInScope('House', $_smarty_tpl->tpl_vars['arUser']->value['U_House']);?>
                <?php $_smarty_tpl->_assignInScope('Apartment', $_smarty_tpl->tpl_vars['arUser']->value['U_Apartment']);?>

                <?php $_smarty_tpl->_assignInScope('Branch', $_smarty_tpl->tpl_vars['arUser']->value['U_Branch']);?>

                <?php $_smarty_tpl->_assignInScope('hide', '');?>
                <dl>
                    <dt>Информация о получателе:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Фамилия</label>
                                <input type="text" id="Surname" name="Surname" value="<?php echo $_smarty_tpl->tpl_vars['Surname']->value;?>
">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Имя</label>
                                <input type="text" id="Name" name="Name" value="<?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Отчество</label>
                                <input type="text" id="Patronymic" name="Patronymic" value="<?php echo $_smarty_tpl->tpl_vars['Patronymic']->value;?>
">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Телефон</label>
                                <input type="text" id="Phone" name="Phone" value="<?php echo $_smarty_tpl->tpl_vars['Phone']->value;?>
">
                            </div>
                        </div>
                    </dd>

                    <hr class="major">

                    <dt>Способ доставки:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <label>Выберите cпособ доставки</label>
                                <select id="Delivery_method" name="Delivery_method">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PSandDM']->value, 'itemPS');
$_smarty_tpl->tpl_vars['itemPS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemPS']->value) {
$_smarty_tpl->tpl_vars['itemPS']->do_else = false;
?>
                                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['itemPS']->value['PS_Name'];?>
">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemPS']->value['DM'], 'itemDM');
$_smarty_tpl->tpl_vars['itemDM']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemDM']->value) {
$_smarty_tpl->tpl_vars['itemDM']->do_else = false;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['itemDM']->value['DM_ID'];?>
" onclick="selectMethod();"><?php echo $_smarty_tpl->tpl_vars['itemDM']->value['DM_Name'];?>

                                                </option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </optgroup>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>

                            <div id="OurStoreBox" class="col-12 col-12-xsmall">
                                <div class="row gtr-uniform">
                                    <div class="col-12 col-12-xsmall">
                                        <label>Выберите наш магазин</label>
                                        <select id="OurStore" name="OurStore">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['store']->value, 'itemStore');
$_smarty_tpl->tpl_vars['itemStore']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemStore']->value) {
$_smarty_tpl->tpl_vars['itemStore']->do_else = false;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_ID'];?>
">г.<?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_City'];?>
,
                                                    <?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_Street'];?>
, <?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_House'];?>
</option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="PostOfficeBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="PO_City" name="PO_City" value="<?php echo $_smarty_tpl->tpl_vars['City']->value;?>
">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Отделение</label>
                                        <input type="text" id="Branch" name="Branch" value="<?php echo $_smarty_tpl->tpl_vars['Branch']->value;?>
">
                                    </div>
                                </div>
                            </div>

                            <div id="TargetedDeliveryBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="City" name="City" value="<?php echo $_smarty_tpl->tpl_vars['City']->value;?>
">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Улица</label>
                                        <input type="text" id="Street" name="Street" value="<?php echo $_smarty_tpl->tpl_vars['Street']->value;?>
">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Дом</label>
                                        <input type="text" id="House" name="House" value="<?php echo $_smarty_tpl->tpl_vars['House']->value;?>
">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Квартира</label>
                                        <input type="text" id="Apartment" name="Apartment" value="<?php echo $_smarty_tpl->tpl_vars['Apartment']->value;?>
">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    </dd>

                    <hr class="major">

                    <dt>Способ оплаты:</dt>
                    <dd>
                        <label>Выберите cпособ оплаты</label>
                        <select id="Payment_method" name="Payment_method">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PayMeth']->value, 'itemPM');
$_smarty_tpl->tpl_vars['itemPM']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemPM']->value) {
$_smarty_tpl->tpl_vars['itemPM']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['itemPM']->value['PM_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemPM']->value['PM_Name'];?>

                                </option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </dd>

                    <hr class="major">

                    <dt>Комментарий:</dt>
                    <dd>
                        <div class="col-12">
                            <textarea id="Comment" name="Comment" placeholder="Уточнение к заказу" rows="6"></textarea>
                        </div>
                    </dd>


                </dl>
            <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('hide', "style='display: none;'");?>
                <dl>
                    <dt>Информация о получателе:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Фамилия</label>
                                <input type="text" id="Surname" name="Surname">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Имя</label>
                                <input type="text" id="Name" name="Name">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Отчество</label>
                                <input type="text" id="Patronymic" name="Patronymic">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Телефон</label>
                                <input type="tel" id="Phone" name="Phone">
                            </div>
                        </div>
                    </dd>

                    <hr class="major">

                    <dt>Способ доставки:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <label>Выберите cпособ доставки</label>
                                <select id="Delivery_method" name="Delivery_method">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PSandDM']->value, 'itemPS');
$_smarty_tpl->tpl_vars['itemPS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemPS']->value) {
$_smarty_tpl->tpl_vars['itemPS']->do_else = false;
?>
                                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['itemPS']->value['PS_Name'];?>
">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemPS']->value['DM'], 'itemDM');
$_smarty_tpl->tpl_vars['itemDM']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemDM']->value) {
$_smarty_tpl->tpl_vars['itemDM']->do_else = false;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['itemDM']->value['DM_ID'];?>
" onclick="selectMethod();"><?php echo $_smarty_tpl->tpl_vars['itemDM']->value['DM_Name'];?>

                                                </option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </optgroup>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>

                            <div id="OurStoreBox" class="col-12 col-12-xsmall">
                                <div class="row gtr-uniform">
                                    <div class="col-12 col-12-xsmall">
                                        <label>Выберите наш магазин</label>
                                        <select id="OurStore">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['store']->value, 'itemStore');
$_smarty_tpl->tpl_vars['itemStore']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemStore']->value) {
$_smarty_tpl->tpl_vars['itemStore']->do_else = false;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_ID'];?>
">г.<?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_City'];?>
,
                                                    <?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_Street'];?>
, <?php echo $_smarty_tpl->tpl_vars['itemStore']->value['SA_House'];?>
</option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="PostOfficeBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="PO_City" name="PO_City">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Отделение</label>
                                        <input type="text" id="Branch" name="Branch">
                                    </div>
                                </div>
                            </div>

                            <div id="TargetedDeliveryBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="City" name="City">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Улица</label>
                                        <input type="text" id="Street" name="Street">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Дом</label>
                                        <input type="text" id="House" name="House">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Квартира</label>
                                        <input type="text" id="Apartment" name="Apartment">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    </dd>

                    <hr class="major">

                    <dt>Способ оплаты:</dt>
                    <dd>
                        <label>Выберите cпособ оплаты</label>
                        <select id="Payment_method" name="Payment_method">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PayMeth']->value, 'itemPM');
$_smarty_tpl->tpl_vars['itemPM']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemPM']->value) {
$_smarty_tpl->tpl_vars['itemPM']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['itemPM']->value['PM_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemPM']->value['PM_Name'];?>

                                </option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </dd>

                    <hr class="major">

                    <dt>Комментарий:</dt>
                    <dd>
                        <div class="col-12">
                            <textarea id="Comment" name="Comment" placeholder="Уточнение к заказу" rows="6"></textarea>
                        </div>
                    </dd>
                </dl>

            <?php }?>
        </div>

        <hr class="major">

        <?php if (!(isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
            <div id="regBox" style="text-align: center;">
                <a href="#authorization" class="popups-link">Вход</a>
                |
                <a href="#registerBox" class="popups-link">Регистрация</a>
                <p>Для заказа необходимо выполнить авторизацию или зарегистрироваться.</p>
            </div>
        <?php }?>

        <input id="BtnSaveOrder" type="submit" class="button" <?php echo $_smarty_tpl->tpl_vars['hide']->value;?>
 value="Оформить заказ" onclick="SaveOrder();" />
    </div>
    <hr class="major">
</div><?php }
}

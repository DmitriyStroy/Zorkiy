<?php
/* Smarty version 3.1.39, created on 2021-10-28 07:04:27
  from 'E:\OpenServer\domains\localhost\views\admin\adminOrder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617a214bcd9881_79630734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4e3388b8b44c2f30b34f50cf319b90ed4c550b4' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminOrder.tpl',
      1 => 1635393865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617a214bcd9881_79630734 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DataOrders']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <div id="OrderController">
        <h1>Заказ №: <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_ID'];?>
 </h1><b class="date">Дата создания:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Date'];?>
<br>
        <b>Статус заказа:</b>
        <span style="color: <?php echo $_smarty_tpl->tpl_vars['item']->value['OS_Color'];?>
;"><?php echo $_smarty_tpl->tpl_vars['item']->value['OS_Name'];?>
 </span> ---
        <b>Дата изменения:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Date_Modification'];?>
<br><br>


        <b>Статус оплаты:</b> <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['Checkout_DateOfPayment']))) {?>
            <span style="color: green;">Оплата подтверждена</span> Когда: <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_DateOfPayment'];?>

        <?php } else { ?>
            <span style="color: red;">Оплата не подтверждена</span>


            <ul class="actions">
                <li><input type="button" class="button big popups-link" onclick="confirm();" value="Подтвердить оплату" />
                </li>
            </ul>
        <?php }?><br>

        <div id="OrderStatus">
            <label>Укажите новый статус заказ:</label>
            <input type="hidden" name="OrderId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_ID'];?>
">
            <ul class="actions">
                <li>
                    <select id="ControlStatus" name="ControlStatus">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['status']->value, 'itemS');
$_smarty_tpl->tpl_vars['itemS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemS']->value) {
$_smarty_tpl->tpl_vars['itemS']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['itemS']->value['OS_ID'];?>
" <?php if (($_smarty_tpl->tpl_vars['item']->value['Checkout_Status'] == $_smarty_tpl->tpl_vars['itemS']->value['OS_ID'])) {?> selected <?php }?>
                                onclick="selectMethod();"><?php echo $_smarty_tpl->tpl_vars['itemS']->value['OS_Name'];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </li>
                <li><input type="button" class="button big popups-link" onclick="UpdateDataStatus();" value="Изменить" />
                </li>
            </ul>
        </div>

        <dl>
            <dt>Информация о получателе:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Фамилия</label>
                        <input type="text" id="Surname" name="Surname" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Surname'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Имя</label>
                        <input type="text" id="Name" name="Name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Name'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Отчество</label>
                        <input type="text" id="Patronymic" name="Patronymic" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Patronymic'];?>
">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Телефон</label>
                        <input type="text" id="Phone" name="Phone" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Phone'];?>
">
                    </div>
                    <div class="col-12 col-12-xsmall">
                        <input type="button" class="button big popups-link" onclick="UpdateOrderUserInfo();"
                            value="Изменить" />
                    </div>
                </div>
                <br>
            </dd>
            <dt>Способ доставки:</dt>
            <dd>
                <b>На данный момент:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['DM_Name'];?>
<b> : </b>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['Checkout_House'] != null) {?>
                    г.<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_City'];?>
, ул.<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Street'];?>
, дом.<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_House'];?>

                    <?php if ($_smarty_tpl->tpl_vars['item']->value['Checkout_Apartment'] != null) {?>, кв.<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Apartment'];
}?><br>
                <?php } else { ?>
                    г.<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_City'];?>
, отделение: <?php echo $_smarty_tpl->tpl_vars['item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_Checkout_Branch']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_Checkout_Branch']->value['index'] : null)];?>
<br>
                <?php }?>
                <br>
                <div class="row gtr-uniform">
                    <div class="col-12 col-12-xsmall">
                        <label>Выберите cпособ доставки для изменения</label>
                        <select id="PostalServise" name="PostalServise">
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
" onclick="selectDeliverMethod();"><?php echo $_smarty_tpl->tpl_vars['itemDM']->value['DM_Name'];?>

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



                    <div id="PS_1" class="col-12 col-12-xsmall">
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

                    <div id="PS_2" class="col-12 col-12-xsmall" style="display: none;">
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Город</label>
                                <input type="text" id="City" name="City" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_City'];?>
">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Улица</label>
                                <input type="text" id="Street" name="Street" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Street'];?>
">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Дом</label>
                                <input type="text" id="House" name="House" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_House'];?>
">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Квартира</label>
                                <input type="text" id="Apartment" name="Apartment" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Apartment'];?>
">
                            </div>
                        </div>
                    </div>

                    <div id="PS_3" class="col-12 col-12-xsmall" style="display: none;">
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Город</label>
                                <input type="text" id="PO_City" name="PO_City" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_City'];?>
">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Отделение</label>
                                <input type="text" id="Branch" name="Branch" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Branch'];?>
">
                            </div>
                        </div>
                    </div>

                </div>
                <br>
            </dd>
            <dt>Способ оплаты:</dt>
            <dd>
                <b>На данный момент:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['PM_Name'];?>

                <br><br>
                <label>Выберите cпособ оплаты для изменения</label>
                <select id="Delivery_method" name="Delivery_method">
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
            <?php if ($_smarty_tpl->tpl_vars['item']->value['Checkout_Comment'] != null) {?>
                <dt>Комментарий:</dt>
                <dd>

                    <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Comment'];?>


                </dd>
            <?php }?>
        </dl>
        <h2>Список продуктов</h2>
        <br>
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Товар</th>
                    <th>Кол.</th>
                    <th>Цена за од.</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['Product'], 'itemP', false, NULL, 'product', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['itemP']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemP']->value) {
$_smarty_tpl->tpl_vars['itemP']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_product']->value['iteration']++;
?>
                    <tr>
                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_product']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_product']->value['iteration'] : null);?>
</td>
                        <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemP']->value['ProductName'];?>
</a></td>
                        <td>
                            <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
"
                                style="font-size: ;">
                                <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
" type="hidden" value="2">
                                <?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Amount'];?>

                            </span>
                        </td>
                        <td>
                            <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
">
                                <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
" type="hidden"
                                    value="<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Price'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Price'];?>
 ₴
                            </span>
                        </td>
                        <td>
                            <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
">
                                <input name="itemRealCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
" type="hidden"
                                    value="<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Amount']*$_smarty_tpl->tpl_vars['itemP']->value['Purchase_Price'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Amount']*$_smarty_tpl->tpl_vars['itemP']->value['Purchase_Price'];?>
 ₴
                            </span>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <br>

    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


    <?php echo '<script'; ?>
>
        function selectDeliverMethod() {
            var select = document.getElementById("PostalServise");


            if (select.selectedIndex == -1)
                return null;
            var numb = select.options[select.selectedIndex].text;
            //var numb = select.value;

            if (numb == 'Самовывоз') {
                $('#PS_2').hide();
                $('#PS_3').hide();
                $('#PS_1').show();
            } else if (numb == 'Доставка курьером') {
                $('#PS_1').hide();
                $('#PS_3').hide();
                $('#PS_2').show();
            } else if (numb == 'Самовывоз из отделений почтовых операторов') {
                $('#PS_1').hide();
                $('#PS_2').hide();
                $('#PS_3').show();
            }

        }

        function confirm() {
            var postData = GetData('#OrderController');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/checkout/confirm/354/",
                data: postData,
                dataType: 'json',
                success: function(data) {
                    if (data['success']) {
                        document.location.reload();
                    } else {
                        alert(data['message']);
                    }
                }
            });
        }


        function UpdateDataStatus() {
            var postData = GetData('#OrderController');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/checkout/updatestatus/201/",
                data: postData,
                dataType: 'json',
                success: function(data) {
                    if (data['success']) {
                        document.location.reload();
                    } else {
                        alert(data['message']);
                    }
                }
            });
        }

        function UpdateOrderUserInfo() {
            var postData = GetData('#OrderController');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/checkout/orderuserinfo/202/",
                data: postData,
                dataType: 'json',
                success: function(data) {
                    if (data['success']) {
                        document.location.reload();
                    } else {
                        alert(data['message']);
                    }
                }
            });
        }
    <?php echo '</script'; ?>
>
<?php }
}

<?php
/* Smarty version 3.1.39, created on 2021-10-26 12:42:20
  from 'E:\OpenServer\domains\localhost\views\admin\orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6177cd7c3b68a0_06736327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '356c2c3a11ea656b7af9c697338a8cd1961dfe19' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\orders.tpl',
      1 => 1635240972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6177cd7c3b68a0_06736327 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DataOrders']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <div class="accordion-container" style="border: 2px solid <?php echo $_smarty_tpl->tpl_vars['item']->value['OS_Color'];?>
;">
        <h4>Заказ №: <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_ID'];?>
 </h4>
        <b>Статус заказа:</b> 
        <span style="color: <?php echo $_smarty_tpl->tpl_vars['item']->value['OS_Color'];?>
;"><?php echo $_smarty_tpl->tpl_vars['item']->value['OS_Name'];?>
</span> <br>
        <b class="date">Дата изменения:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Date_Modification'];?>

        <dl>
            <dt>Информация о получателе:</dt>
            <dd>
                <b>ФИО:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Surname'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Name'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Patronymic'];?>
<br>
                <b>Телефон:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Phone'];?>
<br>
                <b>Способ оплаты:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['PM_Name'];?>

                <b>Способ доставки:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['DM_Name'];?>
<br>
                <b>Адрес доставки:</b> <?php if ($_smarty_tpl->tpl_vars['item']->value['Checkout_House'] != null) {?>
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

                <?php if ($_smarty_tpl->tpl_vars['item']->value['Checkout_Comment'] != null) {?>
                    <b>Комментарий:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Comment'];?>
<br>
                <?php }?>

                <b class="date">Дата создания:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Date'];?>

            </dd>
        </dl>


        <a class="button accordion">Список продуктов</a>
        <div class="panel">
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
" style="font-size: ;">
                                    <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
" type="hidden" value="2">
                                    <?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Amount'];?>

                                </span>
                            </td>
                            <td>
                                <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
">
                                    <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Price'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Price'];?>
 ₴
                                </span>
                            </td>
                            <td>
                                <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
">
                                    <input name="itemRealCnt_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Product'];?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Purchase_Amount']*$_smarty_tpl->tpl_vars['itemP']->value['Purchase_Price'];?>
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
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}

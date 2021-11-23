<?php
/* Smarty version 3.1.39, created on 2021-10-27 16:54:04
  from 'E:\OpenServer\domains\localhost\views\admin\adminOrders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617959fc2c6092_20540206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13d3b7fcdc393e48fa538aaf17b55d84bdb90758' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminOrders.tpl',
      1 => 1635342842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617959fc2c6092_20540206 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Заказы пользователей</h1>

<div class="row">


    <table>
        <thead>
            <tr>
                <th>Заказ №</th>
                <th>Статус</th>
                <th>Оплата</th>
                <th>Дата создания</th>
                <th>Дата изменения</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DataOrders']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_ID'];?>
</td>
                    <td><span style="color: <?php echo $_smarty_tpl->tpl_vars['item']->value['OS_Color'];?>
;"><?php echo $_smarty_tpl->tpl_vars['item']->value['OS_Name'];?>
 </span></td>
                    <td>
                        <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['Checkout_DateOfPayment']))) {?>
                            <span style="color: green;">Подтверждена</span>
                        <?php } else { ?>
                            <span style="color: red;">Не подтверждена</span>

                        <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Date'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_Date_Modification'];?>
</td>
                    <td><a href=" /admin/orders/<?php echo $_smarty_tpl->tpl_vars['item']->value['Checkout_ID'];?>
/">Перейти к заказу</a></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div><?php }
}

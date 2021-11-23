<?php
/* Smarty version 3.1.39, created on 2021-11-20 14:14:30
  from 'E:\OpenServer\domains\localhost\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6198d896d7d4f5_18900895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '209408ad66cb2b3bbc672a66f53971c4d91fd942' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\cart.tpl',
      1 => 1637406857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6198d896d7d4f5_18900895 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
    В корзине пусто
<?php } else { ?>
    <div class="table-wrapper">
        <form action="/checkout/" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Кол.</th>
                        <th style="display: none;">Цена за од.</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <tr>                           
                            <td width="35%">
                                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['ProductName'];?>
</a>
                            </td>
                            <td width="20%">
                                <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" type="number"
                                    value="1" min="1" max="20" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
);" required />
                            </td>
                            <td style="display: none;">
                                <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_Price'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['Model_Price'];?>
 ₴
                                </span>
                            </td>
                            <td width="25%">
                                <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_Price'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['Model_Price'];?>

                                </span> ₴
                            </td>
                            <td width="10%">
                                <ul class="icons">
                                    <li>
                                        <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" alt="Удалить из корзины" class="fas fa-trash"
                                            onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
); return false;"></a>
                                        <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
" style="display: none;" alt="Добавить в корзину"
                                            class="fas fa-trash-restore"
                                            onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
); return false;"></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </tfoot>
            </table>


            <ul class="actions">
                <li><input type="submit" class="button" value="Оформить заказ" /></li>
            </ul>
            <?php echo '<? ';?>
} <?php echo '?>';?>

        </form>
    </div>
<?php }
}
}

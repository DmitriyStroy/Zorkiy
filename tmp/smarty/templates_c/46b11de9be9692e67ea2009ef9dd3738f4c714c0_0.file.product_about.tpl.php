<?php
/* Smarty version 3.1.39, created on 2021-11-01 14:00:09
  from 'E:\OpenServer\domains\localhost\views\default\product_about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617fc8b9de2891_70613507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46b11de9be9692e67ea2009ef9dd3738f4c714c0' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\product_about.tpl',
      1 => 1635764331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617fc8b9de2891_70613507 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-6 col-12-small">
        <div>
            <ul class="actions">
                <li><a style="cursor: pointer;" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/">Все о товаре</a></li>
                <li><a style="cursor: pointer;" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/characteristic/">Характеристики</a>
                </li>
                <li><a style="cursor: pointer;" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/comments/">Отзывы</a></li>
            </ul>
        </div>
    </div>
</div>
<hr>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsDeviceInfo']->value, 'itemDeviceInfo');
$_smarty_tpl->tpl_vars['itemDeviceInfo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemDeviceInfo']->value) {
$_smarty_tpl->tpl_vars['itemDeviceInfo']->do_else = false;
?>
    <div class="row">
        <div class="col-6 col-12-small">
            <div class="row">
                <div class="col-3 col-12-small">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsDevicePricture']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <div class="column">
                            <img src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
" alt="Nature"
                                style="width:100%" onclick="myFunction(this);">
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <div class="col-9 col-12-small">
                    <div class="container" style="display: block;">
                        <img id="expandedImg" style="width:100%"
                            src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
">
                        <div id="imgtext"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-12-small">
            <p><i class="fas fa-clipboard-check"></i> Есть в наличии</p>

            <h2><?php echo $_smarty_tpl->tpl_vars['itemDeviceInfo']->value['Model_Price'];?>
 ₴</h2>
            <hr>

            <ul class="actions">
                <li>
                    <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> style="display: none;" <?php }?>
                        alt="Удалить из корзины" class="button"
                        onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
); return false;">
                        Удалить из корзины</a>

                    <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> style="display: none;" <?php }?>
                        alt="Добавить в корзину" class="button primary"
                        onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
); return false;"> Добавить в корзину</a>
                </li>
                <li>
                    <ul class="icons">
                        <li>
                            <a class="like-active fa fa-heart" aria-hidden="true"></a>
                            <span class="rating">12</span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-12-small">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCharacteristicsDevice']->value, 'itemCharacteristics');
$_smarty_tpl->tpl_vars['itemCharacteristics']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemCharacteristics']->value) {
$_smarty_tpl->tpl_vars['itemCharacteristics']->do_else = false;
?>
                <?php echo $_smarty_tpl->tpl_vars['itemCharacteristics']->value['Characteristic_Name_RU'];?>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
    <hr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}

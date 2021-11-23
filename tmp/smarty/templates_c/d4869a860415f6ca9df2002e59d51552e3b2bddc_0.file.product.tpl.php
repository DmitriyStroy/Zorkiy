<?php
/* Smarty version 3.1.39, created on 2021-11-05 16:12:33
  from 'E:\OpenServer\domains\localhost\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61852dc163f063_19689845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4869a860415f6ca9df2002e59d51552e3b2bddc' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\product.tpl',
      1 => 1636117952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61852dc163f063_19689845 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['Product']->value['M_Name'];?>
 <?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_Name'];?>
</h1>


<div class="row">
    <div class="col-6 col-12-small">
        <div>
            <ul class="actions">
                <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
/">Все о товаре</a></li>
                <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
/characteristic/">Характеристики</a></li>
                <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
/comments/">Отзывы</a></li>
            </ul>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-6 col-12-small">
        <div class="container-picture">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Product']->value['Picture'], 'item', false, NULL, 'picture', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration']++;
?>
                <div class="mySlides-images">
                    <img src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
"
                        style="width:100%;">
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Product']->value['Picture'], 'item', false, NULL, 'picture', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration']++;
?>
                <div class="column-images">
                    <img class="demo-images cursor"
                        src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
" style="width:100%"
                        onclick="currentSlide(<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration'] : null);?>
)">
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>

    <div class="col-6 col-12-small">
        <p><i class="fas fa-clipboard-check"></i> Есть в наличии</p>

        <h2><?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_Price'];?>
 ₴</h2>

        <ul class="actions">
            <li>
                <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> style="display: none;" <?php }?>
                    alt="Удалить из корзины" class="button"
                    onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
); return false;">
                    Удалить из корзины</a>

                <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> style="display: none;" <?php }?>
                    alt="Добавить в корзину" class="button primary"
                    onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
); return false;"> Добавить в корзину</a>
            </li>
            <li>
                <ul class="icons">
                    <li>
                        <a class="like-active fa fa-heart" aria-hidden="true"></a>
                    </li>
                </ul>
            </li>
        </ul>

        <hr>

      
    </div>
</div><?php }
}

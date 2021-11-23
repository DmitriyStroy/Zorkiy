<?php
/* Smarty version 3.1.39, created on 2021-11-05 13:13:48
  from 'E:\OpenServer\domains\localhost\views\default\typedevice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618503dc552691_92607808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4d2d9622e86488157c1b97b69f1ac10598462f4' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\typedevice.tpl',
      1 => 1636107226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618503dc552691_92607808 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['Page_Header']->value;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['GetTypeDevice']->value) {?>
    <div class="row catalog-row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GetTypeDevice']->value, 'item', false, NULL, 'typedevice', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <div class="col-4 col-12-small catalog-grid">
                <div class="tile_inner">
                    <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
/" class="image">
                        <img src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
" alt=""></a>

                    <a class="tile_heading" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
/">
                        <span class="tile_title"><?php echo $_smarty_tpl->tpl_vars['item']->value['ProductName'];?>
</span>
                    </a>
                    <b class="align-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['PS_Name'];?>
</b>

                    <div> Рейтинг:
                        <div class="rating-mini">
                            <span
                                <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['AverageRating'])) && (floor($_smarty_tpl->tpl_vars['item']->value['AverageRating']) > 0)) {?>
                            class="active" <?php }?>></span>
                        <span <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['AverageRating'])) && (floor($_smarty_tpl->tpl_vars['item']->value['AverageRating']) > 1)) {?> class="active"
                            <?php }?>></span>
                        <span <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['AverageRating'])) && (floor($_smarty_tpl->tpl_vars['item']->value['AverageRating']) > 2)) {?> class="active"
                            <?php }?>></span>
                        <span <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['AverageRating'])) && (floor($_smarty_tpl->tpl_vars['item']->value['AverageRating']) > 3)) {?> class="active"
                            <?php }?>></span>
                        <span <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['AverageRating'])) && (floor($_smarty_tpl->tpl_vars['item']->value['AverageRating']) > 4)) {?> class="active"
                            <?php }?>></span>
                    </div>
                </div>
                <div>
                    Отзывов: <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['Rating']))) {?> <?php echo $_smarty_tpl->tpl_vars['item']->value['Rating'];?>
 <?php } else { ?>0 <?php }?>
                </div>
                <div>
                    <div class="tile_price_old price_gray">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['Model_OldPrice'] > 0) {?>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['Model_OldPrice'];?>
 ₴
                        <?php }?>
                    </div>
                    <div class="tile_price <?php if ($_smarty_tpl->tpl_vars['item']->value['Model_OldPrice'] > 0) {?>price_red <?php }?>">
                        <p><span class="tile_price_value"> <?php echo $_smarty_tpl->tpl_vars['item']->value['Model_Price'];?>
 ₴</span></p>
                        <ul class="actions">
                            <li>
                                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['Model_ID'];?>
/" class="button ">Подробнее</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php } else { ?>
На данный момент времени товары отсутствуют в данной категории.
<?php }
}
}

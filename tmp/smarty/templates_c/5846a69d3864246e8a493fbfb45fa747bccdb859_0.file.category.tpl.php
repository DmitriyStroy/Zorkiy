<?php
/* Smarty version 3.1.39, created on 2021-11-04 14:01:19
  from 'E:\OpenServer\domains\localhost\views\default\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6183bd7f238e71_31902575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5846a69d3864246e8a493fbfb45fa747bccdb859' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\category.tpl',
      1 => 1636020895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6183bd7f238e71_31902575 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['Page_Header']->value;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['GetCategor']->value) {?>
    <div class="row catalog-row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GetCategor']->value, 'itemCategory');
$_smarty_tpl->tpl_vars['itemCategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemCategory']->value) {
$_smarty_tpl->tpl_vars['itemCategory']->do_else = false;
?>
            <div class="col-3 col-12-small catalog-grid">
                <div class="tile_inner">
                    <a href="/typedevice/<?php echo $_smarty_tpl->tpl_vars['itemCategory']->value['TD_URL'];?>
/" class="image">
                        <img src="/templates/default/images/TypeDevice/<?php echo $_smarty_tpl->tpl_vars['itemCategory']->value['TD_Image'];?>
"
                            alt="<?php echo $_smarty_tpl->tpl_vars['itemCategory']->value['TD_Name_RU'];?>
"></a>

                    <a class="tile_heading" href="/typedevice/<?php echo $_smarty_tpl->tpl_vars['itemCategory']->value['TD_URL'];?>
/">
                        <span class="tile_title"><?php echo $_smarty_tpl->tpl_vars['itemCategory']->value['TD_Name_RU'];?>
</span>
                    </a>
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

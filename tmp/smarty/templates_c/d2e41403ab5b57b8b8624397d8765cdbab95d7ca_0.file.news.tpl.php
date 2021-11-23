<?php
/* Smarty version 3.1.39, created on 2021-11-02 19:01:58
  from 'E:\OpenServer\domains\localhost\views\default\news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618160f6efca30_60803645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2e41403ab5b57b8b8624397d8765cdbab95d7ca' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\news.tpl',
      1 => 1635868177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618160f6efca30_60803645 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['Page_Header']->value;?>
</h1>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsNews']->value, 'item', false, NULL, 'news', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <?php if (($_smarty_tpl->tpl_vars['rsNews']->value != null)) {?>
        <div class="box">
            <div class="row">
                <div class="col-3 col-12-small">
                    <img src="/templates/default/images/news/<?php echo $_smarty_tpl->tpl_vars['item']->value['N_Image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['N_ru_Name'];?>
" style="width:100%">
                </div>
                <div class="col-9 col-12-small">
                    <br>
                    <a href="/news/<?php echo $_smarty_tpl->tpl_vars['item']->value['Id_News'];?>
">
                        <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['N_ru_Name'];?>
</h3>
                    </a>
                    <p style="text-align: justify;">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['N_ru_ShortDescription'];?>

                    </p>
                    <div style="text-align: right;"><b>Дата публикации: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['N_Date'];?>
</div>
                </div>
                <div class="col-12 col-12-small align-center">
                    <a href="/news/<?php echo $_smarty_tpl->tpl_vars['item']->value['Id_News'];?>
">Подробнее</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <section class="align-center">
            <h3>Новостей нет</h3>
        </section>
    <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}

<?php
/* Smarty version 3.1.39, created on 2021-11-03 13:44:07
  from 'E:\OpenServer\domains\localhost\views\default\detailsnews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618267f7ebf600_09774509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8e39326c26cb8491c0d20c55682b591689f3275' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\detailsnews.tpl',
      1 => 1635886770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618267f7ebf600_09774509 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsNews']->value, 'item', false, NULL, 'news', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <header class="main">
        <h1><?php echo $_smarty_tpl->tpl_vars['Page_Header']->value;?>
</h1>
    </header>


    <p>
        <span class="image left">
            <img src="/templates/default/images/news/<?php echo $_smarty_tpl->tpl_vars['item']->value['N_Image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['N_ru_Name'];?>
">
        </span>
    </p>
    <?php echo $_smarty_tpl->tpl_vars['item']->value['N_ru_Description'];?>

    <hr class="major">
    <div class="align-right"><b>Дата публикации: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['N_Date'];?>
</div>

    <br>




<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}

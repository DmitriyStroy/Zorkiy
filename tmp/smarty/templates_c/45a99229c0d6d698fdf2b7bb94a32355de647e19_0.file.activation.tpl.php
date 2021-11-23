<?php
/* Smarty version 3.1.39, created on 2021-11-19 17:16:35
  from 'E:\OpenServer\domains\localhost\views\default\activation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6197b1c3792d24_11857223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45a99229c0d6d698fdf2b7bb94a32355de647e19' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\activation.tpl',
      1 => 1637331387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6197b1c3792d24_11857223 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="main">
    <?php if ($_smarty_tpl->tpl_vars['ConfirmationStatus']->value == 0) {?>
        <h1>Произошла ошибка при подтвержении электронной почты.</h1>
    <?php } else { ?>
        <h1>Подтверждение электронной почты прошло успешно.</h1>
    <?php }?>
</header><?php }
}

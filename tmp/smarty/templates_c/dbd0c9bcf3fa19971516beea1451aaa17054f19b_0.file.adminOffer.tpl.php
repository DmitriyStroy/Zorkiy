<?php
/* Smarty version 3.1.39, created on 2021-11-11 11:00:02
  from 'E:\OpenServer\domains\localhost\views\admin\adminOffer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618ccd82add2a5_32522047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbd0c9bcf3fa19971516beea1451aaa17054f19b' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminOffer.tpl',
      1 => 1636617595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618ccd82add2a5_32522047 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Обращение по выгодном предложениям</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Телефон</th>
            <th>Статус</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GetAllOffer']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr>
                <td id="O_ID_<?php echo $_smarty_tpl->tpl_vars['item']->value['O_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['O_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['O_ID'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['O_Phone'];?>
</td>
                <td>
                    <select id="O_Done_<?php echo $_smarty_tpl->tpl_vars['item']->value['O_ID'];?>
">
                        <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['O_Done'] == 0) {?> selected <?php }?>>
                            Не выполнено
                        </option>
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['O_Done'] == 1) {?> selected <?php }?>>
                            Выполнено
                        </option>
                    </select>
                </td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick=""></a></li>
                    </ul>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}

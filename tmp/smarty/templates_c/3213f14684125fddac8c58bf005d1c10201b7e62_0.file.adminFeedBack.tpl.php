<?php
/* Smarty version 3.1.39, created on 2021-11-11 11:01:07
  from 'E:\OpenServer\domains\localhost\views\admin\adminFeedBack.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618ccdc397a367_19863293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3213f14684125fddac8c58bf005d1c10201b7e62' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminFeedBack.tpl',
      1 => 1636617665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618ccdc397a367_19863293 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Заявки обратной связи</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Електроная почта</th>
            <th>Телефон</th>
            <th>Дополнительное описание</th>
            <th>Статус</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllFeedBack']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr>
                <td id="TD_ID_<?php echo $_smarty_tpl->tpl_vars['item']->value['FB_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['FB_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['FB_ID'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['FB_Name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['FB_Email'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['FB_Phone'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['FB_Description'];?>
</td>
                <td>
                    <select id="O_Done_<?php echo $_smarty_tpl->tpl_vars['item']->value['FB_ID'];?>
">
                        <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['FB_Done'] == 0) {?> selected <?php }?>>
                            Не выполнено
                        </option>
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['FB_Done'] == 1) {?> selected <?php }?>>
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

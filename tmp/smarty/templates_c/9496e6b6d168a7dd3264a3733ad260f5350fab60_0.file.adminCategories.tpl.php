<?php
/* Smarty version 3.1.39, created on 2021-11-04 14:08:04
  from 'E:\OpenServer\domains\localhost\views\admin\adminCategories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6183bf14e073e0_57099665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9496e6b6d168a7dd3264a3733ad260f5350fab60' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminCategories.tpl',
      1 => 1636024083,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6183bf14e073e0_57099665 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <style>
        td {vertical-align: middle;}
    </style>


<h1>Управление категориями товаров</h1>
<h2>Добавление новой категории</h2>

<div class="row gtr-uniform" id="newCategory">
    <div class="col-6 col-12-xsmall">
        <input type="text" name="CategoryNameUA" placeholder="Название на украинском">
    </div>
    <div class="col-6 col-12-xsmall">
        <input type="text" name="CaterotyNameRU" placeholder="Название на русском">
    </div>
    <div class="col-6 col-12-xsmall">
        <input type="text" name="CategoryURL" placeholder="Укажите URL категории">
    </div>
    <div class="col-6 col-12-xsmall">
        <ul class="actions">
            <li><a class="button primary" onclick="CreateNewCategory();">Добавить</a></li>
        </ul>
    </div>
</div>

<hr class="major">

<h2>Список категорий товаров</h2>
<table id="UpdateCategory">
    <thead>
        <tr>
            <th>#</th>
            <th>Название на украинском</th>
            <th>Название на русском</th>
            <th>URL категории</th>
            <th>Доступ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr>
                <td id="Category_ID_<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
</td>
                <td>
                    <input type="text" id="Category_Name_UA_<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_Name_UA'];?>
" />
                </td>
                <td>
                    <input type="text" id="Category_Name_RU_<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_Name_RU'];?>
" />
                </td>
                <td>
                    <input type="text" id="Category_URL_<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_URL'];?>
" />
                </td>
                <td width="150">
                    <select id="Category_Enable_<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
">
                        <option value="1" <?php if (($_smarty_tpl->tpl_vars['item']->value['Category_Enable'] == 1)) {?>selected<?php }?>>Вкл</option>
                        <option value="0" <?php if (($_smarty_tpl->tpl_vars['item']->value['Category_Enable'] == 0)) {?>selected<?php }?>>Выкл</option>
                    </select>
                </td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick="UpdateCategory(<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
)"></a></li>
                    </ul>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>


    <?php echo '<script'; ?>
>
        function CreateNewCategory() {
            var postData = GetData('#newCategory');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/categorycreate/203/",
                data: postData,
                dataType: 'json',
                success: function(data) {
                    if (data['success']) {
                        document.location.reload();
                    } else {
                        alert(data['message']);
                    }
                }
            });
        }

        function UpdateCategory(Category_ID) {
            var Category_Name_UA = $('#Category_Name_UA_' + Category_ID).val();
            var Category_Name_RU = $('#Category_Name_RU_' + Category_ID).val();
            var Category_URL = $('#Category_URL_' + Category_ID).val();
            var Category_Enable = $('#Category_Enable_' + Category_ID).val();
            var postData = {
                Category_ID: Category_ID, 
                Category_Name_UA: Category_Name_UA, 
                Category_Name_RU: Category_Name_RU,
                Category_URL: Category_URL,
                Category_Enable: Category_Enable};

            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/categoryupdate/201/",
                data: postData,
                dataType: 'json',
                success: function(data) {
                    if (data['success']) {
                        document.location.reload();
                    } else {
                        alert(data['message']);
                    }
                }
            });
        }
    <?php echo '</script'; ?>
>
<?php }
}

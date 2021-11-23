<?php
/* Smarty version 3.1.39, created on 2021-11-04 15:14:20
  from 'E:\OpenServer\domains\localhost\views\admin\adminManufacturer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6183ce9c1454e9_67303703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd44528fefa7dbb5d29d270c0f0e5cf8e003c03d1' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminManufacturer.tpl',
      1 => 1636028035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6183ce9c1454e9_67303703 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <style>
        td {vertical-align: middle;}
    </style>


<h1>Производители устройств</h1>

<h2>Добавление производителя устройств</h2>
<div class="row gtr-uniform" id="newManufacturer">
    <div class="col-6 col-12-xsmall">
        <select id="ManufacturerCategory" name="ManufacturerCategory">
            <option value="0">Выберите тип по категории</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CategoriesAndTypeDevice']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <optgroup label="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_Name_RU'];?>
">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['TypeDevice'], 'itemTD');
$_smarty_tpl->tpl_vars['itemTD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemTD']->value) {
$_smarty_tpl->tpl_vars['itemTD']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_Name_RU'];?>

                        </option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </optgroup>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>
    <div class="col-3 col-12-xsmall">
        <input type="text" name="ManufacturerName" placeholder="Название производителя">
    </div>
    <div class="col-3 col-12-xsmall">
        <ul class="actions">
            <li><a class="button primary" onclick="CreateNewManufacturer();">Добавить</a></li>
        </ul>
    </div>
</div>

<hr class="major">

<h2>Список производителей устройств</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Категория/тип устройства</th>
            <th>Производитель</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllManufacturer']->value, 'itemM');
$_smarty_tpl->tpl_vars['itemM']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemM']->value) {
$_smarty_tpl->tpl_vars['itemM']->do_else = false;
?>
            <tr>
                <td id="M_ID_<?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_ID'];?>
</td>
                <td>
                    <select id="M_TD_<?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_ID'];?>
">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CategoriesAndTypeDevice']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_Name_RU'];?>
">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['TypeDevice'], 'itemTD');
$_smarty_tpl->tpl_vars['itemTD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemTD']->value) {
$_smarty_tpl->tpl_vars['itemTD']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
" <?php if (($_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'] == $_smarty_tpl->tpl_vars['itemM']->value['M_TD'])) {?> selected <?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_Name_RU'];?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </optgroup>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </td>
                <td><input type="text" id="M_Name_<?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_Name'];?>
" /></td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick="UpdateTypeDevice(<?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_ID'];?>
);"></a></li>
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
        function CreateNewManufacturer() {
            var postData = GetData('#newManufacturer');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/manufacturer/create/203/",
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

        function UpdateTypeDevice(M_ID) {
            var M_TD = $('#M_TD_' + M_ID).val();
            var M_Name = $('#M_Name_' + M_ID).val();

            var postData = {
                M_ID: M_ID,
                M_TD: M_TD,
                M_Name: M_Name
            };

            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/updatemanufacturer/201/",
                data: postData,
                dataType: 'json',
                success: function(data) {
                    if (data['success']) {
                        alert(data['message']);
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

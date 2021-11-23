<?php
/* Smarty version 3.1.39, created on 2021-11-04 14:32:45
  from 'E:\OpenServer\domains\localhost\views\admin\adminTypeDevice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6183c4dd798b51_46164793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae502eb14a8611a2669cf5e7cf02ddf1747f2a28' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminTypeDevice.tpl',
      1 => 1636025564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6183c4dd798b51_46164793 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <style>
        td {vertical-align: middle;}
    </style>


<h1>Управление типами устройств</h1>

<h2>Добавление нового типа устройств</h2>
<div class="row gtr-uniform" id="newTypeDevice">
    <div class="col-6 col-12-xsmall">
        <select id="TypeDeviceCategory" name="TypeDeviceCategory">
            <option value="0">Выберите категорию для данного типа</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['Category_Name_RU'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>
    <div class="col-6 col-12-xsmall">
        <input type="text" name="TypeDeviceNameUA" placeholder="Название на украинском">
    </div>
    <div class="col-6 col-12-xsmall">
        <input type="text" name="TypeDeviceNameRU" placeholder="Название на русском">
    </div>
    <div class="col-6 col-12-xsmall">
        <input type="text" name="TypeDeviceImage" placeholder="Загрузите изображение для данной типа">
    </div>
    <div class="col-6 col-12-xsmall">
        <input type="text" name="TypeDeviceURL" placeholder="Укажите URL типа">
    </div>
    <div class="col-3 col-12-xsmall">
        <select id="TypeDeviceEnable" name="TypeDeviceEnable">
            <option value="1">Включить доступ</option>
            <option value="0">Выключить доступ</option>
        </select>
    </div>
    <div class="col-3 col-12-xsmall">
        <ul class="actions">
            <li><a class="button primary" onclick="CreateNewTypeDevice();">Добавить</a></li>
        </ul>
    </div>
</div>

<hr class="major">

<h2>Список типов устройств</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Категория</th>
            <th>Название на украинском</th>
            <th>Название на русском</th>
            <th>Изображение</th>
            <th>URL</th>
            <th>Доступ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllTypeDevice']->value, 'itemTD');
$_smarty_tpl->tpl_vars['itemTD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemTD']->value) {
$_smarty_tpl->tpl_vars['itemTD']->do_else = false;
?>
            <tr>
                <td id="TD_ID_<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
</td>
                <td>
                    <select id="TD_Category_<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Category_ID'];?>
"
                                <?php if (($_smarty_tpl->tpl_vars['item']->value['Category_ID'] == $_smarty_tpl->tpl_vars['itemTD']->value['TD_Category'])) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['Category_Name_RU'];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </td>

                <td><input type="text" id="TD_Name_UA_<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_Name_UA'];?>
" /></td>
                <td><input type="text" id="TD_Name_RU_<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_Name_RU'];?>
" /></td>
                <td><input type="text" id="TD_Image_<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_Image'];?>
" /></td>
                <td><input type="text" id="TD_URL_<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_URL'];?>
" /></td>
                <td>
                    <select id="TD_Enable_<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
">
                        <option value="1" <?php if (($_smarty_tpl->tpl_vars['itemTD']->value['TD_Enable'] == 1)) {?>selected<?php }?>>Вкл</option>
                        <option value="0" <?php if (($_smarty_tpl->tpl_vars['itemTD']->value['TD_Enable'] == 0)) {?>selected<?php }?>>Выкл</option>
                    </select>
                </td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick="UpdateTypeDevice(<?php echo $_smarty_tpl->tpl_vars['itemTD']->value['TD_ID'];?>
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
        function CreateNewTypeDevice() {
            var postData = GetData('#newTypeDevice');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/typedevice/create/203/",
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

        function UpdateTypeDevice(TD_ID) {
            var TD_Name_UA = $('#TD_Name_UA_' + TD_ID).val();
            var TD_Name_RU = $('#TD_Name_RU_' + TD_ID).val();
            var TD_Category = $('#TD_Category_' + TD_ID).val();
            var TD_Image = $('#TD_Image_' + TD_ID).val();
            var TD_URL = $('#TD_URL_' + TD_ID).val();
            var TD_Enable = $('#TD_Enable_' + TD_ID).val();

            var postData = {
                TD_ID: TD_ID,
                TD_Name_UA: TD_Name_UA,
                TD_Name_RU: TD_Name_RU,
                TD_Category: TD_Category,
                TD_Image: TD_Image,
                TD_URL: TD_URL,
                TD_Enable: TD_Enable
            };

            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/updatetypedevice/201/",
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

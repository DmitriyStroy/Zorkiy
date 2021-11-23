<?php
/* Smarty version 3.1.39, created on 2021-11-18 12:50:23
  from 'E:\OpenServer\domains\localhost\views\admin\adminProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619621df8c1fd8_75523632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28e694819c0043bfabf9c73514fb50d1edded84a' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminProduct.tpl',
      1 => 1637229021,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619621df8c1fd8_75523632 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <style>
        td {vertical-align: middle;}
    </style>

    <?php echo '<script'; ?>
 src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"><?php echo '</script'; ?>
>



<h1>Редактирование продукта</h1>

<div class="row gtr-uniform" id="Product">
    <input type="hidden" id="Model_ID" placeholder="Название модели" value="<?php echo $_smarty_tpl->tpl_vars['Products']->value['Model_ID'];?>
">

    <div class="col-6 col-12-small">
        <div class="row gtr-uniform">
            <div class="col-12 col-12-small">
                <select id="Model_Manufacturer">
                    <option value="0">Выберите тип по категории</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllTypeDeviceANDManufacturer']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['item']->value['TypeDevice'];?>
">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['Manufacturer'], 'itemM');
$_smarty_tpl->tpl_vars['itemM']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemM']->value) {
$_smarty_tpl->tpl_vars['itemM']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_ID'];?>
" <?php if (($_smarty_tpl->tpl_vars['Products']->value['Model_Manufacturer'] == $_smarty_tpl->tpl_vars['itemM']->value['M_ID'])) {?>
                                    selected <?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['TypeDevice'];?>
 / <?php echo $_smarty_tpl->tpl_vars['itemM']->value['M_Name'];?>

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
            <div class="col-12 col-12-small">
                <input type="text" id="Model_Name" name="Model_Name" placeholder="Название модели"
                    value="<?php echo $_smarty_tpl->tpl_vars['Products']->value['Model_Name'];?>
">
            </div>
        </div>
    </div>
    <div class="col-6 col-12-small">
        <div class="row gtr-uniform">
            <div class="col-6 col-12-small">
                <input type="tel" id="Model_OldPrice" name="Model_OldPrice" placeholder="Старая цена"
                    value="<?php echo $_smarty_tpl->tpl_vars['Products']->value['Model_OldPrice'];?>
">
            </div>
            <div class="col-6 col-12-small">
                <input type="tel" id="Model_Price" name="Model_Price" placeholder="Основная цена"
                    value="<?php echo $_smarty_tpl->tpl_vars['Products']->value['Model_Price'];?>
">
            </div>
            <div class="col-12 col-12-small">
                <select id="Model_Status" name="Model_Status">
                    <option value="0">Выберите статус товара</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllProductStatus']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['PS_ID'];?>
" <?php if (($_smarty_tpl->tpl_vars['Products']->value['Model_Status'] == $_smarty_tpl->tpl_vars['item']->value['PS_ID'])) {?> selected <?php }?>>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['PS_Name'];?>

                        </option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-12-small">
        <textarea id="Сharacteristic-editor" style="font-size: 12px;">
                <?php echo $_smarty_tpl->tpl_vars['Products']->value['Model_Сharacteristic'];?>

        </textarea>
    </div>
    <div class="col-12 col-12-small">
        <ul class="actions">
            <li><a class="button primary" onclick="UpdateProduct();">Редактировать</a></li>
        </ul>
    </div>
    <div class="col-12 col-12-small">
        <div class="row gtr-50 gtr-uniform">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ProductPhoto']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <div class="col-2 col-3-small">
                    <span class="image fit">
                        <img src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
" alt="">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>

                    </span>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <br>
        <label>Укажите главное изображение продукта:</label>
        <div class="row gtr-50 gtr-uniform">            
            <div class="col-6 col-12-small">
                <select id="Picture_ID">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ProductPhoto']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_ID'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>

                        </option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <div class="col-6 col-12-small">
                <ul class="actions">
                    <li><a class="button primary" onclick="UpdateMainImageProduct();">Изменить</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-12 col-12-small">
        <label>Добавление нового изображения продукта:</label>
        <form action="/admin/upload/" enctype="multipart/form-data" method="post">
            <input type="file" name="filename">
            <input type="hidden" name="Model_ID" value="<?php echo $_smarty_tpl->tpl_vars['Products']->value['Model_ID'];?>
">
            <input type="submit" value="Отправить">
        </form>
    </div>


</div>





    <?php echo '<script'; ?>
>
        var editor = CKEDITOR.replace('Сharacteristic-editor');

        function UpdateProduct() {
            var Model_ID = $('#Model_ID').val();
            var Model_Manufacturer = $('#Model_Manufacturer').val();
            var Model_Name = $('#Model_Name').val();
            var Model_Сharacteristic = editor.getData();
            var Model_OldPrice = $('#Model_OldPrice').val();
            var Model_Price = $('#Model_Price').val();
            var Model_Status = $('#Model_Status').val();


            var postData = {
                Model_ID: Model_ID,
                Model_Manufacturer: Model_Manufacturer,
                Model_Name: Model_Name,
                Model_OldPrice: Model_OldPrice,
                Model_Price: Model_Price,
                Model_Status: Model_Status,
                Model_Сharacteristic: Model_Сharacteristic
            };


            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/updateproduct/201/",
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

        function UpdateMainImageProduct() {           
            var postData = {
                Picture_ID: $('#Picture_ID').val(),
                DP_Device: $('#Model_ID').val()
            };

            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/updatemainimageproduct/201/",
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

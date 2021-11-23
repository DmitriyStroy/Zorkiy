<?php
/* Smarty version 3.1.39, created on 2021-11-04 15:52:15
  from 'E:\OpenServer\domains\localhost\views\admin\adminProducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6183d77feb9bb2_67992650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '832d46e54badedbfdfe6568c7c681aae0141bfd3' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminProducts.tpl',
      1 => 1636030326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6183d77feb9bb2_67992650 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <style>
        td {vertical-align: middle;}
    </style>


<h1>Управление продукцией</h1>
<h2>Добавление новой продукции</h2>

<div class="row gtr-uniform" id="newProduct">
    <div class="col-6 col-12-xsmall">
        <select id="ManufacturerProduct" name="ManufacturerProduct">
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
"><?php echo $_smarty_tpl->tpl_vars['item']->value['TypeDevice'];?>
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

    <div class="col-6 col-12-xsmall">
        <input type="text" name="ModelName" placeholder="Название модели">
    </div>
    <div class="col-4 col-12-xsmall">
        <input type="tel" name="ProductPrice" placeholder="Цена">
    </div>
    <div class="col-4 col-12-xsmall">
        <select id="ProductStatus" name="ProductStatus">
            <option value="0">Выберите статус товара</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllProductStatus']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['PS_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['PS_Name'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>
    <div class="col-3 col-12-xsmall">
        <ul class="actions">
            <li><a class="button primary" onclick="CreateNewProduct();">Добавить</a></li>
        </ul>
    </div>
</div>

<hr class="major">

<h2>Список продукции</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Продукт</th>
            <th>Старая цена</th>
            <th>Цена</th>
            <th>Статус товара</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllProducts']->value, 'itemP');
$_smarty_tpl->tpl_vars['itemP']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemP']->value) {
$_smarty_tpl->tpl_vars['itemP']->do_else = false;
?>
            <tr>
                <td id="Model_ID_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['itemP']->value['ProductName'];?>
</td>
                <td width="120"><input type="text" id="Model_OldPrice_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_OldPrice'];?>
" /></td>
                <td width="120"><input type="text" id="Model_Price_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_Price'];?>
" /></td>
                <td width="200">
                    <select id="Model_Status_<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllProductStatus']->value, 'itemStatus');
$_smarty_tpl->tpl_vars['itemStatus']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemStatus']->value) {
$_smarty_tpl->tpl_vars['itemStatus']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['itemStatus']->value['PS_ID'];?>
" <?php ob_start();
echo $_smarty_tpl->tpl_vars['itemP']->value['Model_Status'];
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['itemStatus']->value['PS_ID'] == $_prefixVariable1) {?> selected
                                <?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['itemStatus']->value['PS_Name'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </td>
                <td width="200">
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-edit" href="/admin/products/<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
"></a></li>
                        <li><a class="icon fas fa-save" onclick="FastUpdateProduct(<?php echo $_smarty_tpl->tpl_vars['itemP']->value['Model_ID'];?>
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
        function CreateNewProduct() {
            var postData = GetData('#newProduct');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/createproduct/203/",
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

        function FastUpdateProduct(Model_ID) {
            var Model_OldPrice = $('#Model_OldPrice_' + Model_ID).val();
            var Model_Price = $('#Model_Price_' + Model_ID).val();
            var Model_Status  = $('#Model_Status_' + Model_ID).val();

            var postData = {
                Model_ID: Model_ID,               
                Model_OldPrice: Model_OldPrice,
                Model_Price: Model_Price,
                Model_Status: Model_Status
            };

            $.ajax({
                type: 'POST',
                async: false,
                url: "/admin/fastupdateproductr/201/",
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

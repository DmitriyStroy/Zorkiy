<?php
/* Smarty version 3.1.39, created on 2021-11-02 19:16:31
  from 'E:\OpenServer\domains\localhost\views\admin\adminNews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6181645fdfd809_48350376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce4e97687966888aab8ba400f83f54d1f34fde86' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminNews.tpl',
      1 => 1635869790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6181645fdfd809_48350376 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <style>
        td {vertical-align: middle;}
    </style>


<h1>Новости</h1>

<div class="row gtr-uniform" id="newNews">
    <div class="col-12 col-12-xsmall">
        <input type="text" name="N_Image" placeholder="Изображение">
    </div>

    <div class="col-6 col-12-xsmall">
        <input type="text" name="N_Name" placeholder="Заголовок на украинском">
    </div>
    <div class="col-6 col-12-xsmall">
        <input type="text" name="N_ru_Name" placeholder="Заголовок на русском">
    </div>

    <div class="col-6 col-12-xsmall">
        <textarea name="N_ShortDescription" placeholder="Краткое описание на украинском" rows="2"></textarea>
    </div>
    <div class="col-6 col-12-xsmall">
        <textarea name="N_ru_ShortDescription" placeholder="Краткое описание на русском" rows="2"></textarea>
    </div>

    <div class="col-6 col-12-xsmall">
        <textarea name="N_Description" placeholder="Полное описание на украинском" rows="5"></textarea>
    </div>
    <div class="col-6 col-12-xsmall">
        <textarea name="N_ru_Description" placeholder="Полное описание на русском" rows="5"></textarea>
    </div>


    <div class="col-6 col-12-xsmall">
        <ul class="actions">
            <li><a class="button primary" onclick="CreatedNewNews();">Добавить</a></li>
        </ul>
    </div>
</div>

<hr class="major">

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Заголовок на украинском</th>
            <th>Заголовок на русском</th>

            <th>Описание на украинском</th>
            <th>Описание на русском</th>


            <th>Дата</th>
            <th>Доступ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AllNews']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr>
                <td name="CategoryID" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Id_News'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['Id_News'];?>
</td>

                <td><input type="text" name="HeaderNameUA" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['N_Name'];?>
" /></td>
                <td><input type="text" name="HeaderNameRU" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['N_ru_Name'];?>
" /></td>

                <td><input type="text" name="CategoryURL" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['N_Description'];?>
" />
                <td><input type="text" name="CategoryURL" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['N_ru_Description'];?>
" />


                <td> <label><?php echo $_smarty_tpl->tpl_vars['item']->value['N_Date'];?>
</label> </td>
                <td>
                    <select id="CategoryEnable" name="CategoryEnable">
                        <option value="1">Вкл</option>
                        <option value="0">Выкл</option>
                    </select>
                </td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save"></a></li>
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
        function CreatedNewNews() {
            var postData = GetData('#newNews');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/news/create/203/",
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

        function UpdateDataStatus() {
            var postData = GetData('#OrderController');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/category/update/201/",
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

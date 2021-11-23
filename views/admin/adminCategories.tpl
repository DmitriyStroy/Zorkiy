{literal}
    <style>
        td {vertical-align: middle;}
    </style>
{/literal}

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
        {foreach $AllCategories as $item}
            <tr>
                <td id="Category_ID_{$item['Category_ID']}" value="{$item['Category_ID']}">{$item['Category_ID']}</td>
                <td>
                    <input type="text" id="Category_Name_UA_{$item['Category_ID']}" value="{$item['Category_Name_UA']}" />
                </td>
                <td>
                    <input type="text" id="Category_Name_RU_{$item['Category_ID']}" value="{$item['Category_Name_RU']}" />
                </td>
                <td>
                    <input type="text" id="Category_URL_{$item['Category_ID']}" value="{$item['Category_URL']}" />
                </td>
                <td width="150">
                    <select id="Category_Enable_{$item['Category_ID']}">
                        <option value="1" {if ($item['Category_Enable'] == 1)}selected{/if}>Вкл</option>
                        <option value="0" {if ($item['Category_Enable'] == 0)}selected{/if}>Выкл</option>
                    </select>
                </td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick="UpdateCategory({$item['Category_ID']})"></a></li>
                    </ul>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

{literal}
    <script>
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
    </script>
{/literal}
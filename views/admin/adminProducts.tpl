{literal}
    <style>
        td {vertical-align: middle;}
    </style>
{/literal}

<h1>Управление продукцией</h1>
<h2>Добавление новой продукции</h2>

<div class="row gtr-uniform" id="newProduct">
    <div class="col-6 col-12-xsmall">
        <select id="ManufacturerProduct" name="ManufacturerProduct">
            <option value="0">Выберите тип по категории</option>
            {foreach $AllTypeDeviceANDManufacturer as $item}
                <optgroup label="{$item['TypeDevice']}">
                    {foreach $item['Manufacturer'] as $itemM}
                        <option value="{$itemM['M_ID']}">{$item['TypeDevice']} / {$itemM['M_Name']}
                        </option>
                    {/foreach}
                </optgroup>
            {/foreach}
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
            {foreach $AllProductStatus as $item}
                <option value="{$item['PS_ID']}">{$item['PS_Name']}</option>
            {/foreach}
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
        {foreach $AllProducts as $itemP}
            <tr>
                <td id="Model_ID_{$itemP['Model_ID']}" value="{$itemP['Model_ID']}">{$itemP['Model_ID']}</td>
                <td>{$itemP['ProductName']}</td>
                <td width="120"><input type="text" id="Model_OldPrice_{$itemP['Model_ID']}" value="{$itemP['Model_OldPrice']}" /></td>
                <td width="120"><input type="text" id="Model_Price_{$itemP['Model_ID']}" value="{$itemP['Model_Price']}" /></td>
                <td width="200">
                    <select id="Model_Status_{$itemP['Model_ID']}">
                        {foreach $AllProductStatus as $itemStatus}
                            <option value="{$itemStatus['PS_ID']}" {if $itemStatus['PS_ID']=={$itemP['Model_Status']}} selected
                                {/if}>
                                {$itemStatus['PS_Name']}</option>
                        {/foreach}
                    </select>
                </td>
                <td width="200">
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-edit" href="/admin/products/{$itemP['Model_ID']}"></a></li>
                        <li><a class="icon fas fa-save" onclick="FastUpdateProduct({$itemP['Model_ID']});"></a></li>
                    </ul>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

{literal}
    <script>
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
    </script>
{/literal}
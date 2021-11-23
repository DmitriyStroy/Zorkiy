{literal}
    <style>
        td {vertical-align: middle;}
    </style>
{/literal}

<h1>Производители устройств</h1>

<h2>Добавление производителя устройств</h2>
<div class="row gtr-uniform" id="newManufacturer">
    <div class="col-6 col-12-xsmall">
        <select id="ManufacturerCategory" name="ManufacturerCategory">
            <option value="0">Выберите тип по категории</option>
            {foreach $CategoriesAndTypeDevice as $item}
                <optgroup label="{$item['Category_Name_RU']}">
                    {foreach $item['TypeDevice'] as $itemTD}
                        <option value="{$itemTD['TD_ID']}">{$itemTD['TD_Name_RU']}
                        </option>
                    {/foreach}
                </optgroup>
            {/foreach}
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
        {foreach $AllManufacturer as $itemM}
            <tr>
                <td id="M_ID_{$itemM['M_ID']}" value="{$itemM['M_ID']}">{$itemM['M_ID']}</td>
                <td>
                    <select id="M_TD_{$itemM['M_ID']}">
                        {foreach $CategoriesAndTypeDevice as $item}
                            <optgroup label="{$item['Category_Name_RU']}">
                                {foreach $item['TypeDevice'] as $itemTD}
                                    <option value="{$itemTD['TD_ID']}" {if ($itemTD['TD_ID'] == $itemM['M_TD'])} selected {/if}>
                                        {$itemTD['TD_Name_RU']}
                                    </option>
                                {/foreach}
                            </optgroup>
                        {/foreach}
                    </select>
                </td>
                <td><input type="text" id="M_Name_{$itemM['M_ID']}" value="{$itemM['M_Name']}" /></td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick="UpdateTypeDevice({$itemM['M_ID']});"></a></li>
                    </ul>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

{literal}
    <script>
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
    </script>
{/literal}
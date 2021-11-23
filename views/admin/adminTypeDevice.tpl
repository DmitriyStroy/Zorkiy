{literal}
    <style>
        td {vertical-align: middle;}
    </style>
{/literal}

<h1>Управление типами устройств</h1>

<h2>Добавление нового типа устройств</h2>
<div class="row gtr-uniform" id="newTypeDevice">
    <div class="col-6 col-12-xsmall">
        <select id="TypeDeviceCategory" name="TypeDeviceCategory">
            <option value="0">Выберите категорию для данного типа</option>
            {foreach $AllCategories as $item}
                <option value="{$item['Category_ID']}">{$item['Category_Name_RU']}</option>
            {/foreach}
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
        {foreach $AllTypeDevice as $itemTD}
            <tr>
                <td id="TD_ID_{$itemTD['TD_ID']}" value="{$itemTD['TD_ID']}">{$itemTD['TD_ID']}</td>
                <td>
                    <select id="TD_Category_{$itemTD['TD_ID']}">
                        {foreach $AllCategories as $item}
                            <option value="{$item['Category_ID']}"
                                {if ($item['Category_ID'] == $itemTD['TD_Category'])}selected{/if}>
                                {$item['Category_Name_RU']}
                            </option>
                        {/foreach}
                    </select>
                </td>

                <td><input type="text" id="TD_Name_UA_{$itemTD['TD_ID']}" value="{$itemTD['TD_Name_UA']}" /></td>
                <td><input type="text" id="TD_Name_RU_{$itemTD['TD_ID']}" value="{$itemTD['TD_Name_RU']}" /></td>
                <td><input type="text" id="TD_Image_{$itemTD['TD_ID']}" value="{$itemTD['TD_Image']}" /></td>
                <td><input type="text" id="TD_URL_{$itemTD['TD_ID']}" value="{$itemTD['TD_URL']}" /></td>
                <td>
                    <select id="TD_Enable_{$itemTD['TD_ID']}">
                        <option value="1" {if ($itemTD['TD_Enable'] == 1)}selected{/if}>Вкл</option>
                        <option value="0" {if ($itemTD['TD_Enable'] == 0)}selected{/if}>Выкл</option>
                    </select>
                </td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick="UpdateTypeDevice({$itemTD['TD_ID']});"></a></li>
                    </ul>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

{literal}
    <script>
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
    </script>
{/literal}
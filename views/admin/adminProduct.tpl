{literal}
    <style>
        td {vertical-align: middle;}
    </style>

    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

{/literal}

<h1>Редактирование продукта</h1>

<div class="row gtr-uniform" id="Product">
    <input type="hidden" id="Model_ID" placeholder="Название модели" value="{$Products['Model_ID']}">

    <div class="col-6 col-12-small">
        <div class="row gtr-uniform">
            <div class="col-12 col-12-small">
                <select id="Model_Manufacturer">
                    <option value="0">Выберите тип по категории</option>
                    {foreach $AllTypeDeviceANDManufacturer as $item}
                        <optgroup label="{$item['TypeDevice']}">
                            {foreach $item['Manufacturer'] as $itemM}
                                <option value="{$itemM['M_ID']}" {if ($Products['Model_Manufacturer'] == $itemM['M_ID'])}
                                    selected {/if}>
                                    {$item['TypeDevice']} / {$itemM['M_Name']}
                                </option>
                            {/foreach}
                        </optgroup>
                    {/foreach}
                </select>
            </div>
            <div class="col-12 col-12-small">
                <input type="text" id="Model_Name" name="Model_Name" placeholder="Название модели"
                    value="{$Products['Model_Name']}">
            </div>
        </div>
    </div>
    <div class="col-6 col-12-small">
        <div class="row gtr-uniform">
            <div class="col-6 col-12-small">
                <input type="tel" id="Model_OldPrice" name="Model_OldPrice" placeholder="Старая цена"
                    value="{$Products['Model_OldPrice']}">
            </div>
            <div class="col-6 col-12-small">
                <input type="tel" id="Model_Price" name="Model_Price" placeholder="Основная цена"
                    value="{$Products['Model_Price']}">
            </div>
            <div class="col-12 col-12-small">
                <select id="Model_Status" name="Model_Status">
                    <option value="0">Выберите статус товара</option>
                    {foreach $AllProductStatus as $item}
                        <option value="{$item['PS_ID']}" {if ($Products['Model_Status'] == $item['PS_ID'])} selected {/if}>
                            {$item['PS_Name']}
                        </option>
                    {/foreach}
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-12-small">
        <textarea id="Сharacteristic-editor" style="font-size: 12px;">
                {$Products['Model_Сharacteristic']}
        </textarea>
    </div>
    <div class="col-12 col-12-small">
        <ul class="actions">
            <li><a class="button primary" onclick="UpdateProduct();">Редактировать</a></li>
        </ul>
    </div>
    <div class="col-12 col-12-small">
        <div class="row gtr-50 gtr-uniform">
            {foreach $ProductPhoto as $item}
                <div class="col-2 col-3-small">
                    <span class="image fit">
                        <img src="/templates/default/images/products/{$item['DP_Device']}/{$item['DP_Image']}" alt="">
                        {$item['DP_Image']}
                    </span>
                </div>
            {/foreach}
        </div>
        <br>
        <label>Укажите главное изображение продукта:</label>
        <div class="row gtr-50 gtr-uniform">            
            <div class="col-6 col-12-small">
                <select id="Picture_ID">
                    {foreach $ProductPhoto as $item}
                        <option value="{$item['DP_ID']}">
                            {$item['DP_Image']}
                        </option>
                    {/foreach}
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
            <input type="hidden" name="Model_ID" value="{$Products['Model_ID']}">
            <input type="submit" value="Отправить">
        </form>
    </div>


</div>




{literal}
    <script>
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
    </script>
{/literal}
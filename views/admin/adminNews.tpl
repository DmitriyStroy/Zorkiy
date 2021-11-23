{literal}
    <style>
        td {vertical-align: middle;}
    </style>
{/literal}

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
        {foreach $AllNews as $item}
            <tr>
                <td name="CategoryID" value="{$item['Id_News']}">{$item['Id_News']}</td>

                <td><input type="text" name="HeaderNameUA" value="{$item['N_Name']}" /></td>
                <td><input type="text" name="HeaderNameRU" value="{$item['N_ru_Name']}" /></td>

                <td><input type="text" name="CategoryURL" value="{$item['N_Description']}" />
                <td><input type="text" name="CategoryURL" value="{$item['N_ru_Description']}" />


                <td> <label>{$item['N_Date']}</label> </td>
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
        {/foreach}
    </tbody>
</table>

{literal}
    <script>
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
    </script>
{/literal}
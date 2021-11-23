{foreach $DataOrders as $item}
    <div id="OrderController">
        <h1>Заказ №: {$item['Checkout_ID']} </h1><b class="date">Дата создания:</b> {$item['Checkout_Date']}<br>
        <b>Статус заказа:</b>
        <span style="color: {$item['OS_Color']};">{$item['OS_Name']} </span> ---
        <b>Дата изменения:</b> {$item['Checkout_Date_Modification']}<br><br>


        <b>Статус оплаты:</b> {if isset($item['Checkout_DateOfPayment'])}
            <span style="color: green;">Оплата подтверждена</span> Когда: {$item['Checkout_DateOfPayment']}
        {else}
            <span style="color: red;">Оплата не подтверждена</span>


            <ul class="actions">
                <li><input type="button" class="button big popups-link" onclick="confirm();" value="Подтвердить оплату" />
                </li>
            </ul>
        {/if}<br>

        <div id="OrderStatus">
            <label>Укажите новый статус заказ:</label>
            <input type="hidden" name="OrderId" value="{$item['Checkout_ID']}">
            <ul class="actions">
                <li>
                    <select id="ControlStatus" name="ControlStatus">
                        {foreach $status as $itemS}
                            <option value="{$itemS['OS_ID']}" {if ($item['Checkout_Status'] == $itemS['OS_ID'])} selected {/if}
                                onclick="selectMethod();">{$itemS['OS_Name']}
                            </option>
                        {/foreach}
                    </select>
                </li>
                <li><input type="button" class="button big popups-link" onclick="UpdateDataStatus();" value="Изменить" />
                </li>
            </ul>
        </div>

        <dl>
            <dt>Информация о получателе:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Фамилия</label>
                        <input type="text" id="Surname" name="Surname" value="{$item['Checkout_Surname']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Имя</label>
                        <input type="text" id="Name" name="Name" value="{$item['Checkout_Name']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Отчество</label>
                        <input type="text" id="Patronymic" name="Patronymic" value="{$item['Checkout_Patronymic']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Телефон</label>
                        <input type="text" id="Phone" name="Phone" value="{$item['Checkout_Phone']}">
                    </div>
                    <div class="col-12 col-12-xsmall">
                        <input type="button" class="button big popups-link" onclick="UpdateOrderUserInfo();"
                            value="Изменить" />
                    </div>
                </div>
                <br>
            </dd>
            <dt>Способ доставки:</dt>
            <dd>
                <b>На данный момент:</b> {$item['DM_Name']}<b> : </b>

                {if $item['Checkout_House'] != null}
                    г.{$item['Checkout_City']}, ул.{$item['Checkout_Street']}, дом.{$item['Checkout_House']}
                    {if $item['Checkout_Apartment'] != null}, кв.{$item['Checkout_Apartment']}{/if}<br>
                {else}
                    г.{$item['Checkout_City']}, отделение: {$item[Checkout_Branch]}<br>
                {/if}
                <br>
                <div class="row gtr-uniform">
                    <div class="col-12 col-12-xsmall">
                        <label>Выберите cпособ доставки для изменения</label>
                        <select id="PostalServise" name="PostalServise">
                            {foreach $PSandDM as $itemPS}
                                <optgroup label="{$itemPS['PS_Name']}">
                                    {foreach $itemPS['DM'] as $itemDM}
                                        <option value="{$itemDM['DM_ID']}" onclick="selectDeliverMethod();">{$itemDM['DM_Name']}
                                        </option>
                                    {/foreach}
                                </optgroup>
                            {/foreach}
                        </select>
                    </div>



                    <div id="PS_1" class="col-12 col-12-xsmall">
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <label>Выберите наш магазин</label>
                                <select id="OurStore">
                                    {foreach $store as $itemStore}
                                        <option value="{$itemStore['SA_ID']}">г.{$itemStore['SA_City']},
                                            {$itemStore['SA_Street']}, {$itemStore['SA_House']}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="PS_2" class="col-12 col-12-xsmall" style="display: none;">
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Город</label>
                                <input type="text" id="City" name="City" value="{$item['Checkout_City']}">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Улица</label>
                                <input type="text" id="Street" name="Street" value="{$item['Checkout_Street']}">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Дом</label>
                                <input type="text" id="House" name="House" value="{$item['Checkout_House']}">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Квартира</label>
                                <input type="text" id="Apartment" name="Apartment" value="{$item['Checkout_Apartment']}">
                            </div>
                        </div>
                    </div>

                    <div id="PS_3" class="col-12 col-12-xsmall" style="display: none;">
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Город</label>
                                <input type="text" id="PO_City" name="PO_City" value="{$item['Checkout_City']}">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Отделение</label>
                                <input type="text" id="Branch" name="Branch" value="{$item['Checkout_Branch']}">
                            </div>
                        </div>
                    </div>

                </div>
                <br>
            </dd>
            <dt>Способ оплаты:</dt>
            <dd>
                <b>На данный момент:</b> {$item['PM_Name']}
                <br><br>
                <label>Выберите cпособ оплаты для изменения</label>
                <select id="Delivery_method" name="Delivery_method">
                    {foreach $PayMeth as $itemPM}
                        <option value="{$itemPM['PM_ID']}">{$itemPM['PM_Name']}</option>
                    {/foreach}
                </select>
            </dd>
            {if $item['Checkout_Comment'] != null}
                <dt>Комментарий:</dt>
                <dd>

                    {$item['Checkout_Comment']}

                </dd>
            {/if}
        </dl>
        <h2>Список продуктов</h2>
        <br>
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Товар</th>
                    <th>Кол.</th>
                    <th>Цена за од.</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                {foreach $item['Product'] as $itemP name=product}
                    <tr>
                        <td>{$smarty.foreach.product.iteration}</td>
                        <td><a href="/product/{$itemP['Purchase_Product']}/">{$itemP['ProductName']}</a></td>
                        <td>
                            <span id="itemCnt_{$itemP['Purchase_Product']}" name="itemCnt_{$itemP['Purchase_Product']}"
                                style="font-size: ;">
                                <input name="itemCnt_{$itemP['Purchase_Product']}" type="hidden" value="2">
                                {$itemP['Purchase_Amount']}
                            </span>
                        </td>
                        <td>
                            <span id="itemPrice_{$itemP['Purchase_Product']}">
                                <input name="itemCnt_{$itemP['Purchase_Product']}" type="hidden"
                                    value="{$itemP['Purchase_Price']}">
                                {$itemP['Purchase_Price']} ₴
                            </span>
                        </td>
                        <td>
                            <span id="itemRealPrice_{$itemP['Purchase_Product']}">
                                <input name="itemRealCnt_{$itemP['Purchase_Product']}" type="hidden"
                                    value="{$itemP['Purchase_Amount']*$itemP['Purchase_Price']}">
                                {$itemP['Purchase_Amount']*$itemP['Purchase_Price']} ₴
                            </span>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        <br>

    </div>
{/foreach}

{literal}
    <script>
        function selectDeliverMethod() {
            var select = document.getElementById("PostalServise");


            if (select.selectedIndex == -1)
                return null;
            var numb = select.options[select.selectedIndex].text;
            //var numb = select.value;

            if (numb == 'Самовывоз') {
                $('#PS_2').hide();
                $('#PS_3').hide();
                $('#PS_1').show();
            } else if (numb == 'Доставка курьером') {
                $('#PS_1').hide();
                $('#PS_3').hide();
                $('#PS_2').show();
            } else if (numb == 'Самовывоз из отделений почтовых операторов') {
                $('#PS_1').hide();
                $('#PS_2').hide();
                $('#PS_3').show();
            }

        }

        function confirm() {
            var postData = GetData('#OrderController');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/checkout/confirm/354/",
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
                url: "/checkout/updatestatus/201/",
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

        function UpdateOrderUserInfo() {
            var postData = GetData('#OrderController');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/checkout/orderuserinfo/202/",
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
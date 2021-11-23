<h1>Корзина</h1>
{$hide = ""}
<div class="table-wrapper">
    <div id="form-checkout">
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Товар</th>
                    <th>Кол.</th>
                    <th>Цена за од.</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {foreach $rsProducts as $item name=products}
                    <tr>
                        <td>{$smarty.foreach.products.iteration}</td>
                        <td><a href="/product/{$item['Model_ID']}/">{$item['ProductName']}</a></td>
                        <td>
                            <span id="itemCnt_{$item['Model_ID']}" name="itemCnt_{$item['Model_ID']}">
                                <input name="itemCnt_{$item['Model_ID']}" type="hidden" value="{$item['cnt']}" />
                                {$item['cnt']}
                            </span>
                        </td>
                        <td>
                            <span id="itemPrice_{$item['Model_ID']}">
                                <input name="itemCnt_{$item['Model_ID']}" type="hidden" value="{$item['Model_Price']}" />
                                {$item['Model_Price']} ₴
                            </span>
                        </td>
                        <td>
                            <span id="itemRealPrice_{$item['Model_ID']}">
                                <input name="itemRealCnt_{$item['Model_ID']}" type="hidden" value="{$item['RealPrice']}" />
                                {$item['RealPrice']} ₴
                            </span>
                        </td>
                    </tr>
                {/foreach}

        </table>

        <hr class="major">

        <h2>Оформление заказа</h2>
        <div id="OrederUserInfoBox">
            {if isset($arUser)}
                {$Surname = $arUser['U_Surname']}
                {$Name = $arUser['U_Name']}
                {$Patronymic = $arUser['U_Patronymic']}

                {$Phone = $arUser['U_Phone']}

                {$City = $arUser['U_City']}
                {$Street = $arUser['U_Street']}
                {$House = $arUser['U_House']}
                {$Apartment = $arUser['U_Apartment']}

                {$Branch = $arUser['U_Branch']}

                {$hide = ""}
                <dl>
                    <dt>Информация о получателе:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Фамилия</label>
                                <input type="text" id="Surname" name="Surname" value="{$Surname}">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Имя</label>
                                <input type="text" id="Name" name="Name" value="{$Name}">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Отчество</label>
                                <input type="text" id="Patronymic" name="Patronymic" value="{$Patronymic}">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Телефон</label>
                                <input type="text" id="Phone" name="Phone" value="{$Phone}">
                            </div>
                        </div>
                    </dd>

                    <hr class="major">

                    <dt>Способ доставки:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <label>Выберите cпособ доставки</label>
                                <select id="Delivery_method" name="Delivery_method">
                                    {foreach $PSandDM as $itemPS}
                                        <optgroup label="{$itemPS['PS_Name']}">
                                            {foreach $itemPS['DM'] as $itemDM}
                                                <option value="{$itemDM['DM_ID']}" onclick="selectMethod();">{$itemDM['DM_Name']}
                                                </option>
                                            {/foreach}
                                        </optgroup>
                                    {/foreach}
                                </select>
                            </div>

                            <div id="OurStoreBox" class="col-12 col-12-xsmall">
                                <div class="row gtr-uniform">
                                    <div class="col-12 col-12-xsmall">
                                        <label>Выберите наш магазин</label>
                                        <select id="OurStore" name="OurStore">
                                            {foreach $store as $itemStore}
                                                <option value="{$itemStore['SA_ID']}">г.{$itemStore['SA_City']},
                                                    {$itemStore['SA_Street']}, {$itemStore['SA_House']}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="PostOfficeBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="PO_City" name="PO_City" value="{$City}">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Отделение</label>
                                        <input type="text" id="Branch" name="Branch" value="{$Branch}">
                                    </div>
                                </div>
                            </div>

                            <div id="TargetedDeliveryBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="City" name="City" value="{$City}">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Улица</label>
                                        <input type="text" id="Street" name="Street" value="{$Street}">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Дом</label>
                                        <input type="text" id="House" name="House" value="{$House}">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Квартира</label>
                                        <input type="text" id="Apartment" name="Apartment" value="{$Apartment}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    </dd>

                    <hr class="major">

                    <dt>Способ оплаты:</dt>
                    <dd>
                        <label>Выберите cпособ оплаты</label>
                        <select id="Payment_method" name="Payment_method">
                            {foreach $PayMeth as $itemPM}
                                <option value="{$itemPM['PM_ID']}">{$itemPM['PM_Name']}
                                </option>
                            {/foreach}
                        </select>
                    </dd>

                    <hr class="major">

                    <dt>Комментарий:</dt>
                    <dd>
                        <div class="col-12">
                            <textarea id="Comment" name="Comment" placeholder="Уточнение к заказу" rows="6"></textarea>
                        </div>
                    </dd>


                </dl>
            {else}
                {$hide = "style='display: none;'"}
                <dl>
                    <dt>Информация о получателе:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <label>Фамилия</label>
                                <input type="text" id="Surname" name="Surname">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Имя</label>
                                <input type="text" id="Name" name="Name">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Отчество</label>
                                <input type="text" id="Patronymic" name="Patronymic">
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <label>Телефон</label>
                                <input type="tel" id="Phone" name="Phone">
                            </div>
                        </div>
                    </dd>

                    <hr class="major">

                    <dt>Способ доставки:</dt>
                    <dd>
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <label>Выберите cпособ доставки</label>
                                <select id="Delivery_method" name="Delivery_method">
                                    {foreach $PSandDM as $itemPS}
                                        <optgroup label="{$itemPS['PS_Name']}">
                                            {foreach $itemPS['DM'] as $itemDM}
                                                <option value="{$itemDM['DM_ID']}" onclick="selectMethod();">{$itemDM['DM_Name']}
                                                </option>
                                            {/foreach}
                                        </optgroup>
                                    {/foreach}
                                </select>
                            </div>

                            <div id="OurStoreBox" class="col-12 col-12-xsmall">
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

                            <div id="PostOfficeBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="PO_City" name="PO_City">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Отделение</label>
                                        <input type="text" id="Branch" name="Branch">
                                    </div>
                                </div>
                            </div>

                            <div id="TargetedDeliveryBox" class="col-12 col-12-xsmall" style="display: none;">
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label>Город</label>
                                        <input type="text" id="City" name="City">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Улица</label>
                                        <input type="text" id="Street" name="Street">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Дом</label>
                                        <input type="text" id="House" name="House">
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <label>Квартира</label>
                                        <input type="text" id="Apartment" name="Apartment">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    </dd>

                    <hr class="major">

                    <dt>Способ оплаты:</dt>
                    <dd>
                        <label>Выберите cпособ оплаты</label>
                        <select id="Payment_method" name="Payment_method">
                            {foreach $PayMeth as $itemPM}
                                <option value="{$itemPM['PM_ID']}">{$itemPM['PM_Name']}
                                </option>
                            {/foreach}
                        </select>
                    </dd>

                    <hr class="major">

                    <dt>Комментарий:</dt>
                    <dd>
                        <div class="col-12">
                            <textarea id="Comment" name="Comment" placeholder="Уточнение к заказу" rows="6"></textarea>
                        </div>
                    </dd>
                </dl>

            {/if}
        </div>

        <hr class="major">

        {if !isset($arUser)}
            <div id="regBox" style="text-align: center;">
                <a href="#authorization" class="popups-link">Вход</a>
                |
                <a href="#registerBox" class="popups-link">Регистрация</a>
                <p>Для заказа необходимо выполнить авторизацию или зарегистрироваться.</p>
            </div>
        {/if}

        <input id="BtnSaveOrder" type="submit" class="button" {$hide} value="Оформить заказ" onclick="SaveOrder();" />
    </div>
    <hr class="major">
</div>
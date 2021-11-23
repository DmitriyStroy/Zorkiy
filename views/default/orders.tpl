{foreach $DataOrders as $item}
    <div class="accordion-container" style="border: 2px solid {$item['OS_Color']};">
        <h4>Заказ №: {$item['Checkout_ID']} </h4>
        <b>Статус заказа:</b> 
        <span style="color: {$item['OS_Color']};">{$item['OS_Name']}</span> <br>
        <b class="date">Дата изменения:</b> {$item['Checkout_Date_Modification']}
        <dl>
            <dt>Информация о получателе:</dt>
            <dd>
                <b>ФИО:</b> {$item['Checkout_Surname']} {$item['Checkout_Name']} {$item['Checkout_Patronymic']}<br>
                <b>Телефон:</b> {$item['Checkout_Phone']}<br>
                <b>Способ оплаты:</b> {$item['PM_Name']}
                <b>Способ доставки:</b> {$item['DM_Name']}<br>
                <b>Адрес доставки:</b> {if $item['Checkout_House'] != null}
                    г.{$item['Checkout_City']}, ул.{$item['Checkout_Street']}, дом.{$item['Checkout_House']}
                    {if $item['Checkout_Apartment'] != null}, кв.{$item['Checkout_Apartment']}{/if}<br>
                {else}
                    г.{$item['Checkout_City']}, отделение: {$item[Checkout_Branch]}<br>
                {/if}

                {if $item['Checkout_Comment'] != null}
                    <b>Комментарий:</b> {$item['Checkout_Comment']}<br>
                {/if}

                <b class="date">Дата создания:</b> {$item['Checkout_Date']}
            </dd>
        </dl>


        <a class="button accordion">Список продуктов</a>
        <div class="panel">
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
                                <span id="itemCnt_{$itemP['Purchase_Product']}" name="itemCnt_{$itemP['Purchase_Product']}" style="font-size: ;">
                                    <input name="itemCnt_{$itemP['Purchase_Product']}" type="hidden" value="2">
                                    {$itemP['Purchase_Amount']}
                                </span>
                            </td>
                            <td>
                                <span id="itemPrice_{$itemP['Purchase_Product']}">
                                    <input name="itemCnt_{$itemP['Purchase_Product']}" type="hidden" value="{$itemP['Purchase_Price']}">
                                    {$itemP['Purchase_Price']} ₴
                                </span>
                            </td>
                            <td>
                                <span id="itemRealPrice_{$itemP['Purchase_Product']}">
                                    <input name="itemRealCnt_{$itemP['Purchase_Product']}" type="hidden" value="{$itemP['Purchase_Amount']*$itemP['Purchase_Price']}">
                                    {$itemP['Purchase_Amount']*$itemP['Purchase_Price']} ₴
                                </span>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
            <br>
        </div>
    </div>
{/foreach}
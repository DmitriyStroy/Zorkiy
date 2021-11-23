<h1>Заказы пользователей</h1>

<div class="row">


    <table>
        <thead>
            <tr>
                <th>Заказ №</th>
                <th>Статус</th>
                <th>Оплата</th>
                <th>Дата создания</th>
                <th>Дата изменения</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {foreach $DataOrders as $item}
                <tr>
                    <td>{$item['Checkout_ID']}</td>
                    <td><span style="color: {$item['OS_Color']};">{$item['OS_Name']} </span></td>
                    <td>
                        {if isset($item['Checkout_DateOfPayment'])}
                            <span style="color: green;">Подтверждена</span>
                        {else}
                            <span style="color: red;">Не подтверждена</span>

                        {/if}
                    </td>
                    <td>{$item['Checkout_Date']}</td>
                    <td>{$item['Checkout_Date_Modification']}</td>
                    <td><a href=" /admin/orders/{$item['Checkout_ID']}/">Перейти к заказу</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
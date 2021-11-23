{if !$rsProducts}
    В корзине пусто
{else}
    <div class="table-wrapper">
        <form action="/checkout/" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Кол.</th>
                        <th style="display: none;">Цена за од.</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $rsProducts as $item name=products}
                        <tr>                           
                            <td width="35%">
                                <a href="/product/{$item['Model_ID']}/">{$item['ProductName']}</a>
                            </td>
                            <td width="20%">
                                <input name="itemCnt_{$item['Model_ID']}" id="itemCnt_{$item['Model_ID']}" type="number"
                                    value="1" min="1" max="20" onchange="conversionPrice({$item['Model_ID']});" required />
                            </td>
                            <td style="display: none;">
                                <span id="itemPrice_{$item['Model_ID']}" value="{$item['Model_Price']}">
                                    {$item['Model_Price']} ₴
                                </span>
                            </td>
                            <td width="25%">
                                <span id="itemRealPrice_{$item['Model_ID']}" value="{$item['Model_Price']}">
                                    {$item['Model_Price']}
                                </span> ₴
                            </td>
                            <td width="10%">
                                <ul class="icons">
                                    <li>
                                        <a id="removeCart_{$item['Model_ID']}" alt="Удалить из корзины" class="fas fa-trash"
                                            onclick="removeFromCart({$item['Model_ID']}); return false;"></a>
                                        <a id="addCart_{$item['Model_ID']}" style="display: none;" alt="Добавить в корзину"
                                            class="fas fa-trash-restore"
                                            onclick="addToCart({$item['Model_ID']}); return false;"></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </tfoot>
            </table>


            <ul class="actions">
                <li><input type="submit" class="button" value="Оформить заказ" /></li>
            </ul>
            <? } ?>
        </form>
    </div>
{/if}
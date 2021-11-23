<h1>{$Page_Header}</h1>

{if $GetTypeDevice}
    <div class="row catalog-row">
        {foreach $GetTypeDevice as $item name=typedevice}
            <div class="col-4 col-12-small catalog-grid">
                <div class="tile_inner">
                    <a href="/product/{$item['Model_ID']}/" class="image">
                        <img src="/templates/default/images/products/{$item['Model_ID']}/{$item['DP_Image']}" alt=""></a>

                    <a class="tile_heading" href="/product/{$item['Model_ID']}/">
                        <span class="tile_title">{$item['ProductName']}</span>
                    </a>
                    <b class="align-right">{$item['PS_Name']}</b>

                    <div> Рейтинг:
                        <div class="rating-mini">
                            <span
                                {if isset($item['AverageRating']) and (
                                                                                                                floor($item['AverageRating']) > 0)}
                            class="active" {/if}></span>
                        <span {if isset($item['AverageRating']) and (floor($item['AverageRating'])  > 1)} class="active"
                            {/if}></span>
                        <span {if isset($item['AverageRating']) and (floor($item['AverageRating'])  > 2)} class="active"
                            {/if}></span>
                        <span {if isset($item['AverageRating']) and (floor($item['AverageRating'])  > 3)} class="active"
                            {/if}></span>
                        <span {if isset($item['AverageRating']) and (floor($item['AverageRating'])  > 4)} class="active"
                            {/if}></span>
                    </div>
                </div>
                <div>
                    Отзывов: {if isset($item['Rating'])} {$item['Rating']} {else}0 {/if}
                </div>
                <div>
                    <div class="tile_price_old price_gray">
                        {if $item['Model_OldPrice'] > 0 }
                            {$item['Model_OldPrice']} ₴
                        {/if}
                    </div>
                    <div class="tile_price {if $item['Model_OldPrice'] > 0 }price_red {/if}">
                        <p><span class="tile_price_value"> {$item['Model_Price']} ₴</span></p>
                        <ul class="actions">
                            <li>
                                <a href="/product/{$item['Model_ID']}/" class="button ">Подробнее</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    {/foreach}
</div>
{else}
На данный момент времени товары отсутствуют в данной категории.
{/if}
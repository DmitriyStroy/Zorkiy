<h1>{$Page_Header}</h1>

<div class="row">
    <div class="col-6 col-12-small">
        <div>
            <ul class="actions">
                <li><a href="/product/{$Product['Model_ID']}/">Все о товаре</a></li>
                <li><a href="/product/{$Product['Model_ID']}/characteristic/">Характеристики</a></li>
                <li><a href="/product/{$Product['Model_ID']}/comments/">Отзывы</a></li>
            </ul>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-8 col-12-small">
        <div class="table-wrapper">
            <span>
                {$Product['Model_Сharacteristic']}
            </span>



        </div>
    </div>

    <div class="col-4 col-12-small">
        <div class="row">
            <div class="col-12 col-12-small">
                <div class="container-picture">
                    {foreach $Product['Picture'] as $item name=picture}
                        <div class="mySlides-images">
                            <img src="/templates/default/images/products/{$item['DP_Device']}/{$item['DP_Image']}"
                                style="width:100%">
                        </div>
                    {/foreach}
                    {foreach $Product['Picture'] as $item name=picture}
                        <div class="column-images">
                            <img class="demo-images cursor"
                                src="/templates/default/images/products/{$item['DP_Device']}/{$item['DP_Image']}"
                                style="width:100%" onclick="currentSlide({$smarty.foreach.picture.iteration})">
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <hr>
        <p><i class="fas fa-clipboard-check"></i> Есть в наличии</p>

        <h2>{$Product['Model_Price']} ₴</h2>

        <ul class="actions">
            <li>
                <a id="removeCart_{$Product['Model_ID']}" {if ! $itemInCart} style="display: none;" {/if}
                    alt="Удалить из корзины" class="button"
                    onclick="removeFromCart({$Product['Model_ID']}); return false;">
                    Удалить из корзины</a>

                <a id="addCart_{$Product['Model_ID']}" {if $itemInCart} style="display: none;" {/if}
                    alt="Добавить в корзину" class="button primary"
                    onclick="addToCart({$Product['Model_ID']}); return false;"> Добавить в корзину</a>
            </li>
            <li>
                <ul class="icons">
                    <li>
                        <a class="like-active fa fa-heart" aria-hidden="true"></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
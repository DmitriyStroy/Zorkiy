<div id="result">
    <h1>Отзывы покупателей о {$Product['M_Name']} {$Product['Model_Name']}</h1>

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
            <div class="row">
                <div class="col-12 col-12-small">
                    {if (isset($GetCOUNTRatingByProduct['Rating']) AND $GetCOUNTRatingByProduct['Rating'] > 0)}
                        <b>Рейтинг товара:</b>
                        <div class="rating-result">
                            <span {if (floor($GetAverageRatingByProduct['RatintDevice']) > 0)} class="active" {/if}></span>
                            <span {if (floor($GetAverageRatingByProduct['RatintDevice']) > 1)} class="active" {/if}></span>
                            <span {if (floor($GetAverageRatingByProduct['RatintDevice']) > 2)} class="active" {/if}></span>
                            <span {if (floor($GetAverageRatingByProduct['RatintDevice']) > 3)} class="active" {/if}></span>
                            <span {if (floor($GetAverageRatingByProduct['RatintDevice']) > 4)} class="active" {/if}></span>
                        </div>

                        <p>Всего оценок:{$GetCOUNTRatingByProduct['Rating']} Средний рейтинг:
                            {$GetAverageRatingByProduct['RatintDevice']}</p>
                        {$star5 = (($GetCOUNTRatingByProduct['Rating5']/$GetCOUNTRatingByProduct['Rating'])*100)|string_format:"%d"}
                        {$star4 = (($GetCOUNTRatingByProduct['Rating4']/$GetCOUNTRatingByProduct['Rating'])*100)|string_format:"%d"}
                        {$star3 = (($GetCOUNTRatingByProduct['Rating3']/$GetCOUNTRatingByProduct['Rating'])*100)|string_format:"%d"}
                        {$star2 = (($GetCOUNTRatingByProduct['Rating2']/$GetCOUNTRatingByProduct['Rating'])*100)|string_format:"%d"}
                        {$star1 = (($GetCOUNTRatingByProduct['Rating1']/$GetCOUNTRatingByProduct['Rating'])*100)|string_format:"%d"}
                    {else}
                        <p>Всего оценок: 0 Средний рейтинг: 0</p>
                        <div style="text-align: center; width: 100%">
                            <p><b>Отзывов для даного товара еще нет</b></p>
                        </div>
                    {/if}
                </div>
                {if (isset($GetCOUNTRatingByProduct['Rating']) AND $GetCOUNTRatingByProduct['Rating'] > 0)}
                    <div class="col-12 col-12-small">
                        <div class="row">
                            <div class="side right">
                                <div>5</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-5" style="width: {$star5}%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div>{$GetCOUNTRatingByProduct['Rating5']} - {$star5}%</div>
                            </div>
                            <div class="side right">
                                <div>4</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-4" style="width: {$star4}%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div>{$GetCOUNTRatingByProduct['Rating4']} - {$star4}%</div>
                            </div>
                            <div class="side right">
                                <div>3</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-3" style="width: {$star3}%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div>{$GetCOUNTRatingByProduct['Rating3']} - {$star3}%</div>
                            </div>
                            <div class="side right">
                                <div>2</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-2" style="width: {$star2}"></div>
                                </div>
                            </div>
                            <div class=" side left">
                                <div>{$GetCOUNTRatingByProduct['Rating2']} - {$star2}%</div>
                            </div>
                            <div class="side right">
                                <div>1</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-1" style="width: {$star1}%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div>{$GetCOUNTRatingByProduct['Rating1']} - {$star1}%</div>
                            </div>
                        </div>
                        <br>
                    </div>
                {/if}
                <div class="col-12 col-12-small">
                    <br>
                    {if !isset($arUser)}
                        <div id="regBox" style="text-align: center;">
                            <p>
                                <a href="#authorization" class="popups-link">Вход</a>
                                |
                                <a href="#registerBox" class="popups-link">Регистрация</a>
                            </p>
                            <p>Для того чтобы опубликовать отзыв необходимо войти в личный кабинет.</p>
                        </div>
                    {/if}

                    <div id="product-add-comments" {if !isset($arUser)}class="hideme" {/if}>
                        <h2>Оставьте свой отзыв об этом товаре</h2>
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-small">
                                <input id="device" name="device" type="hidden" value="{$Product['Model_ID']}" />
                            </div>
                            <div class="col-12 col-12-small">
                                <div class="rating-area">
                                    <input type="radio" id="star-5" name="rating" value="5">
                                    <label for="star-5" title="Оценка «5»"></label>
                                    <input type="radio" id="star-4" name="rating" value="4">
                                    <label for="star-4" title="Оценка «4»"></label>
                                    <input type="radio" id="star-3" name="rating" value="3">
                                    <label for="star-3" title="Оценка «3»"></label>
                                    <input type="radio" id="star-2" name="rating" value="2">
                                    <label for="star-2" title="Оценка «2»"></label>
                                    <input type="radio" id="star-1" name="rating" value="1">
                                    <label for="star-1" title="Оценка «1»"></label>
                                </div>
                            </div>
                            <div class="col-12 col-12-small">
                                <textarea id="text_comment" placeholder="Комментарий" rows="5"></textarea>
                            </div>
                            <div class="col-12 col-12-small">
                                <ul class="actions">
                                    <li><input type="submit" value="Оставить отзыв" class="primary"
                                            onclick="CreateCommets()"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
            <div>
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
    </div>

    <hr>


    {if ($GetCOUNTRatingByProduct AND ($GetCOUNTRatingByProduct['Rating'] > 0))}
        <h2>Отзывы</h2>
        {foreach $GetReviewsByProduct as $itemReviews}
            <div id="Comment_{$itemReviews['DR_ID']}" class="box">
                <div style="width: 100%; height: 100px; padding: 5px;">
                    <div style="width: 10%; float:left">
                        <img src="/templates/default/images/user.png" alt="Avatar" style="width:100%">
                    </div>
                    <div style="width: 90%; float:left; padding: 5px;">
                        <div style="text-align: right;">{$itemReviews['DR_Date']}</div>
                        <div>Клиент: <span>{$itemReviews['U_Login']}</span></div>
                        <div>Оценка:
                            <div class="rating-mini">
                                <span {if ($itemReviews['DR_Rating'] > 0)} class="active" {/if}></span>
                                <span {if ($itemReviews['DR_Rating'] > 1)} class="active" {/if}></span>
                                <span {if ($itemReviews['DR_Rating'] > 2)} class="active" {/if}></span>
                                <span {if ($itemReviews['DR_Rating'] > 3)} class="active" {/if}></span>
                                <span {if ($itemReviews['DR_Rating'] > 4)} class="active" {/if}></span>
                            </div>
                        </div>
                    </div>
                </div>
                {if $itemReviews['DR_Comment'] != null}
                    <div style="width: 100%; padding: 5px;">
                        <p>{$itemReviews['DR_Comment']}</p>
                    </div>

                {/if}
                {if isset($itemReviews['Answer']) AND ($itemReviews['Answer'] == "34232")}
                    <a class="accordion">Показать ответы</a>
                    <div class="panel">
                        {foreach $itemReviews['Answer'] as $itemAnswer}
                            <div class="container-message darker">
                                <div style="width: 100%; height: 100px; padding: 5px;">
                                    <div>
                                        <img src="/templates/default/images/user.png" alt="Avatar" style="width:100%;">
                                    </div>
                                    <div style="width: 90%; float:left; padding: 5px;">
                                        <div class="right">{$itemAnswer['DRA_Date']}</div>
                                        <div>Клиент: <span>{$itemAnswer['U_Login']}</span></div>
                                    </div>
                                </div>
                                <div style="width: 100%; padding: 5px;">
                                    <p>{$itemAnswer['DRA_Comment']}</p>
                                </div>
                            </div>
                        {/foreach}
                        <br>
                    </div>
                {/if}
            </div>
        {/foreach}
    {/if}

</div>





{literal}
    <script>
        function CreateCommets() {
            var postData;
            var radios = document.getElementsByName('rating');
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    postData = {
                        'device': document.getElementById('device').value,
                        'rating': radios[i].value,
                        'text_comment': document.getElementById('text_comment').value
                    };
                }
            }

            $.ajax({
                type: 'POST',
                async: false,
                url: "/product/addcomments/200/",
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
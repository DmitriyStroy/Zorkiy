<div id="sidebar">
    <div class="inner">
        <section class="alt" style>
            <span class="image fit logo">
                <a href="/"><img src="/templates/default/images/logo_rus.jpg" alt="logo"></a>
            </span>
            <br>


            {if isset($arUser)}
                <div id="userBox">
                    <a href="/user/" id="userLink"> {$arUser['displayName']}</a><br />
                    <a href="/user/logout/">Выход</a>
                </div>

            {else}
                {if ! isset($hideLoginBox)}
                    <div id="regBox" class="align-center">
                        <a href="#authorization" class="popups-link">Вход</a>
                        |
                        <a href="#registerBox" class="popups-link">Регистрация</a>
                        <p>Авторизуйтесь для получения расширенных возможностей </p>
                    </div>
                {/if}
                <div id="userBox" class="hideme">
                    <a href="#" id="userLink"></a><br />
                    <a href="/user/logout/">Выход</a>
                </div>
            {/if}

        </section>
        <nav id="menu">
            <ul>
                <li>
                    <span class="opener">Каталог товаров</span>
                    <ul>
                        <li><a style="font-weight: bold;" href="/category/">Все категории</a></li>
                        <li>
                            {foreach $MenuCategory  as $itemCategory}
                                <span>
                                    <a style="font-weight: bold;"
                                        href="/category/{$itemCategory['Category_URL']}/">{$itemCategory['Category_Name_RU']}
                                    </a>
                                </span>
                                {if isset($itemCategory['TypeDevice'])}
                                    <ul>
                                        {foreach $itemCategory['TypeDevice'] as $itemTypeDevice}
                                            <li>
                                                <a
                                                    href="/typedevice/{$itemTypeDevice['TD_URL']}/">{$itemTypeDevice['TD_Name_RU']}</a>
                                            </li>

                                        {/foreach}
                                    </ul>
                                {/if}

                            {/foreach}


                        </li>
                    </ul>
                </li>
                <li>
                    <span class="opener">Сферы применения</span>
                    <ul>
                        <li><a href="/video-surveillance-in-shops/">Видеонаблюдение в магазинах</a></li>
                        <li><a href="/video-surveillance-in-offices/">Видеонаблюдение в офисах</a></li>
                        <li><a href="/video-surveillance-at-enterprises/">Видеонаблюдение на предприятиях</a></li>
                        <li><a href="/video-surveillance-in-schools-and-kindergartens/">Видеонаблюдение в школах и
                                детских садах</a></li>
                        <li><a href="/video-surveillance-in-a-private-house/">Видеонаблюдение в частном доме</a></li>
                        <li><a href="/video-surveillance-in-parking-lots/">Видеонаблюдение на автостоянках</a></li>
                        <li><a href="/video-surveillance-in-restaurants/">Видеонаблюдение в ресторанах</a></li>
                        <li><a href="/osbb-security-video/">Видеонаблюдение для ОСББ и жилых комплексов под ключ</a>
                        </li>
                    </ul>
                </li>
                <li><a href="/news/">Новости</a></li>
                {if isset($arUser)}
                    <li><a href="/orders/">Мои заказы</a></li>
                {/if}

                <li><a href="/contacts/">Контакты</a></li>
            </ul>

            <a href="#popups_shopping_basket" class="popups-link" onclick="load_shopping_basket();">Корзина</a>
            <span id="cartCntItems">
                {if $cartCntItems > 0}
                    {$cartCntItems}
                {else}
                    0
                {/if}
            </span>
        </nav>
        <section>
            <ul class="contact">
                <li class="icon solid fas fa-phone-alt" style="display: block;"><a href="tel:+380 99 300 01 02"><span
                            class="label">+38(099) 300 01 02</span></a></li>
                <li class="icon solid fas fa-phone-alt" style="display: block;"><a href="tel:+380 44 334 32 92"> <span
                            class="label">+38(044) 334 32 92</span></a></li>
            </ul>
        </section>
    </div>
</div>
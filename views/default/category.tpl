<h1>{$Page_Header}</h1>

{if $GetCategor}
    <div class="row catalog-row">
        {foreach $GetCategor as $itemCategory}
            <div class="col-3 col-12-small catalog-grid">
                <div class="tile_inner">
                    <a href="/typedevice/{$itemCategory['TD_URL']}/" class="image">
                        <img src="/templates/default/images/TypeDevice/{$itemCategory['TD_Image']}"
                            alt="{$itemCategory['TD_Name_RU']}"></a>

                    <a class="tile_heading" href="/typedevice/{$itemCategory['TD_URL']}/">
                        <span class="tile_title">{$itemCategory['TD_Name_RU']}</span>
                    </a>
                </div>
            </div>
        {/foreach}
    </div>
{else}
    На данный момент времени товары отсутствуют в данной категории.
{/if}
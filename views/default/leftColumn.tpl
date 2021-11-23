<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">
            Меню
        </div>
        {foreach $rsCategory  as $itemCategory}
            <a style="font-weight: bold;"
                href="category/{$itemCategory['Category_ID']}">{$itemCategory['Category_Name_RU']}</a><br>

            {if isset($itemCategory['TypeDevice'])}
                {foreach $itemCategory['TypeDevice'] as $itemTypeDevice}
                    --- <a href="?controller=TypeDevice&id={$itemTypeDevice['TD_ID']}">{$itemTypeDevice['TD_Name_RU']}</a><br>
                {/foreach}
            {/if}

        {/foreach}
    </div>


  
</div>
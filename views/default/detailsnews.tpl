{foreach $rsNews as $item name=news}
    <header class="main">
        <h1>{$Page_Header}</h1>
    </header>


    <p>
        <span class="image left">
            <img src="/templates/default/images/news/{$item['N_Image']}" alt="{$item['N_ru_Name']}">
        </span>
    </p>
    {$item['N_ru_Description']}
    <hr class="major">
    <div class="align-right"><b>Дата публикации: </b>{$item['N_Date']}</div>

    <br>




{/foreach}
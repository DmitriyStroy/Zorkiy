<h1>{$Page_Header}</h1>

{foreach $rsNews as $item name=news}
    {if ($rsNews != null)}
        <div class="box">
            <div class="row">
                <div class="col-3 col-12-small">
                    <img src="/templates/default/images/news/{$item['N_Image']}" alt="{$item['N_ru_Name']}" style="width:100%">
                </div>
                <div class="col-9 col-12-small">
                    <br>
                    <a href="/news/{$item['Id_News']}">
                        <h3>{$item['N_ru_Name']}</h3>
                    </a>
                    <p style="text-align: justify;">
                        {$item['N_ru_ShortDescription']}
                    </p>
                    <div style="text-align: right;"><b>Дата публикации: </b>{$item['N_Date']}</div>
                </div>
                <div class="col-12 col-12-small align-center">
                    <a href="/news/{$item['Id_News']}">Подробнее</a>
                </div>
            </div>
        </div>
    {else}
        <section class="align-center">
            <h3>Новостей нет</h3>
        </section>
    {/if}
{/foreach}
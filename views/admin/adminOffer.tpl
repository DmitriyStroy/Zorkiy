<h1>Обращение по выгодном предложениям</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Телефон</th>
            <th>Статус</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach $GetAllOffer as $item}
            <tr>
                <td id="O_ID_{$item['O_ID']}" value="{$item['O_ID']}">{$item['O_ID']}</td>
                <td>{$item['O_Phone']}</td>
                <td>
                    <select id="O_Done_{$item['O_ID']}">
                        <option value="0" {if $item['O_Done'] == 0} selected {/if}>
                            Не выполнено
                        </option>
                        <option value="1" {if $item['O_Done'] == 1} selected {/if}>
                            Выполнено
                        </option>
                    </select>
                </td>
                <td>
                    <ul class="icons" style="cursor: pointer;">
                        <li><a class="icon fas fa-save" onclick=""></a></li>
                    </ul>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
<h1>Заявки обратной связи</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Електроная почта</th>
            <th>Телефон</th>
            <th>Дополнительное описание</th>
            <th>Статус</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach $AllFeedBack as $item}
            <tr>
                <td id="TD_ID_{$item['FB_ID']}" value="{$item['FB_ID']}">{$item['FB_ID']}</td>
                <td>{$item['FB_Name']}</td>
                <td>{$item['FB_Email']}</td>
                <td>{$item['FB_Phone']}</td>
                <td>{$item['FB_Description']}</td>
                <td>
                    <select id="O_Done_{$item['FB_ID']}">
                        <option value="0" {if $item['FB_Done'] == 0} selected {/if}>
                            Не выполнено
                        </option>
                        <option value="1" {if $item['FB_Done'] == 1} selected {/if}>
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
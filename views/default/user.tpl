    <div id="UserData">
        <h1>Профиль</h1>
        <dl>
            <dt>Личные данные:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Фамилия</label>
                        <input type="text" id="newSurname" name="newSurname" value="{$arUser['U_Surname']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Имя</label>
                        <input type="text" id="newName" name="newName" value="{$arUser['U_Name']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Отчество</label>
                        <input type="text" id="newPatronymic" name="newPatronymic" value="{$arUser['U_Patronymic']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Телефон</label>
                        <input type="text" id="newPhone" name="newPhone" value="{$arUser['U_Phone']}">
                    </div>
                </div>
            </dd>

            <hr class="major">

            <dt>Контакты:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Электронная почта </label>
                        <label>{$arUser['U_Login']}</label>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Статус почты</label>
                        {if $arUser['U_Confirmation']==1}
                            <label style="color: green;">Подтверждена</label>
                        {else}
                            <label style="color: red;">Не подтверждена</label>
                            <ul class="actions">
                                <li><a class="button primary" onclick="RequestConfirmationEmail();">Подтвердить почту</a></li>
                            </ul>
                        {/if}
                    </div>

                </div>
            </dd>

            <hr class="major">

            <dt>Адрес доставки:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label>Город</label>
                        <input type="text" id="newCity" name="newCity" value="{$arUser['U_City']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Улица</label>
                        <input type="text" id="newStreet" name="newStreet" value="{$arUser['U_Street']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Дом</label>
                        <input type="text" id="newHouse" name="newHouse" value="{$arUser['U_House']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Квартира</label>
                        <input type="text" id="newApartment" name="newApartment" value="{$arUser['U_Apartment']}">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label>Отделение новой почты</label>
                        <input type="text" id="newBranch" name="newBranch" value="{$arUser['U_Branch']}">
                    </div>
                </div>
            </dd>

            <hr class="major">

            <dt>Изменение пароля:</dt>
            <dd>
                <div class="row gtr-uniform">
                    <div class="col-4 col-12-xsmall">
                        <label>Текущий пароль</label>
                        <input type="password" id="oldpwd" name="oldpwd" value="">
                    </div>
                    <div class="col-4 col-12-xsmall">
                        <label>Новый пароль</label>
                        <input type="password" id="newpwd" name="newpwd" value="">
                    </div>
                    <div class="col-4 col-12-xsmall">
                        <label>Новый пароль еще раз</label>
                        <input type="password" id="newpwd2" name="newpwd2" value="">
                    </div>
                </div>
            </dd>
        </dl>
        <hr class="major">
        <P style="color: red;">Для сохранения изменений, введите текущий пароль.</P>
        <ul class="actions">
            <li><a class="button primary" onclick="UpdateUserData();">Сохранить</a></li>
        </ul>
</div>
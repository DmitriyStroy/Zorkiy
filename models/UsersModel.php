<?

function RegisterNewUser($email, $pwd, $surname, $name, $patronymic, $phone, $city, $street, $house, $apartment, $branch)
{
    //$email = htmlspecialchars(mysqli_real_escape_string($email));
    //$name = htmlspecialchars(mysqli_real_escape_string($name));
    //$phone = htmlspecialchars(mysqli_real_escape_string($phone));
    //$adress = htmlspecialchars(mysqli_real_escape_string($adress));

    $sql = "INSERT INTO `users` (
        `Id_User`, `U_Login`, `U_Password`, 
        `U_Surname`, `U_Name`, `U_Patronymic`, 
        `U_Phone`, `U_City`, `U_Street`, 
        `U_House`, `U_Apartment`,`U_Branch`, 
        `U_Confirmation`, `U_UserRights`) 
    VALUES (NULL, '{$email}', '{$pwd}', '{$surname}', 
    '{$name}', '{$patronymic}', '{$phone}', 
    '{$city}', '{$street}', '{$house}', '{$apartment}','{$branch}', 0, '3');";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);


    if ($rs) {
        $sql = "SELECT * FROM `users` WHERE (`U_Login` = '{$email}' and `U_Password` = '{$pwd}') LIMIT 1";

        $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
        $rs = createSmartyRsArray($rs);

        if (isset($rs[0])) {
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}

function CheckRegisterParams($email, $pwd1, $pwd2)
{
    $res = null;

    if (!$email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }

    if (!$pwd1) {
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }

    if (!$pwd2) {
        $res['success'] = false;
        $res['message'] = 'Введите повтор пароля';
    }

    if ($pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают';
    }

    return $res;
}

function CheckUserEmail($email)
{
    //$email = mysqli_real_escape_string($email);
    $sql = "SELECT `Id_User` FROM `users` WHERE `U_Login` = '{$email}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $rs = createSmartyRsArray($rs);

    return $rs;
}

function loginUser($email, $pwd)
{
    $email = check_correctness_string($email);
    $pwd = CreatePassword($email, $pwd);

    $sql = "SELECT * FROM `users` WHERE (`U_Login` = '{$email}' and `U_Password` = '{$pwd}') LIMIT 1";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $rs = createSmartyRsArray($rs);

    if (isset($rs[0])) {
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}

function ForgotPasswordUser($email, $pwd)
{
    $_email = check_correctness_string($email);
    $_newPassword = check_correctness_string($pwd);
    $sql = "UPDATE `users` SET `U_Password` = '{$_newPassword}' WHERE `U_Login`= '{$_email}' LIMIT 1";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function UpdateUserDate($email, $oldpwd, $pwd1, $pwd2, $surname, $name, $patronymic, $phone, $city, $street, $house, $apartment, $branch)
{
    $_surname = check_correctness_string($surname);
    $_name = check_correctness_string($name);
    $_patronymic = check_correctness_string($patronymic);
    $_phone = check_correctness_string($phone);
    $_city = check_correctness_string($city);
    $_street = check_correctness_string($street);
    $_house = check_correctness_string($house);
    $_apartment = check_correctness_string($apartment);
    $_branch = check_correctness_string($branch);
    $_pwd1 = trim($pwd1);
    $_pwd2 = trim($pwd2);


    $sql = "UPDATE `users` SET ";

    $sql .= "`U_Surname` = '{$_surname}',
    `U_Name` = '{$_name}',
    `U_Patronymic` = '{$_patronymic}',
    `U_Phone` = '{$_phone}',
    `U_City` = '{$_city}',
    `U_Street` = '{$_street}',
    `U_House` = '{$_house}',
    `U_Apartment` = '{$_apartment}',
    `U_Branch` = '{$_branch}' ";


    if ($_pwd1 && ($_pwd1 == $_pwd2)) {
        $_newPassword = CreatePassword($email, $_pwd1);
        $sql .= ", `U_Password` = '{$_newPassword}' WHERE `U_Login`= '{$email}' AND `U_Password` = '{$oldpwd}' LIMIT 1";
    } else {
        $sql .= " WHERE `U_Login`= '{$email}' LIMIT 1";
    }


    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return $rs;
}

function RequestConfirmationEmail($email)
{
    $sql = "UPDATE `users` SET `U_GUID`=(SELECT uuid()), `U_Confirmation`=0 WHERE `U_Login`= '{$email}' LIMIT 1";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function GetGuidByEmail($email)
{
    $sql = "SELECT `U_GUID` 
    FROM `users` 
    WHERE `U_Login`= '{$email}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function ConfirmationEmail($guid)
{
    $sql = "UPDATE `users` SET `U_Confirmation` = 1 WHERE `U_GUID`= '{$guid}' LIMIT 1";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $sql = "SELECT `U_Confirmation` 
    FROM `users` 
    WHERE `U_GUID`= '{$guid}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

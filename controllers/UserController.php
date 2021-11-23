<?
include_once '../models/CategoryModel.php';
include_once '../models/UsersModel.php';

function indexAction($smarty)
{
    if (!isset($_SESSION['user'])) {
        redirect('/');
    }

    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}


function loginAction()
{
    if (!isset($_REQUEST['email']) or !isset($_REQUEST['pwd'])) {
        redirect('/404/');
    }

    $email = check_correctness_string(isset($_REQUEST['email']) ? $_REQUEST['email'] : null);
    $pwd = check_correctness_string(isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null);
    $userData = loginUser($email, $pwd);

    if ($userData['success']) {
        $userData = $userData[0];

        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['U_Name'] ? $userData['U_Name'] : $userData['U_Login'];

        $resData =  $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Не верный логин или пароль';
    }
    echo json_encode($resData);
}

function registerAction()
{
    $email = check_correctness_string(isset($_REQUEST['email']) ? $_REQUEST['email'] : null);
    $pwd1 = trim(isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null);
    $pwd2 = trim(isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null);
    $surname = check_correctness_string(isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null);
    $name = check_correctness_string(isset($_REQUEST['name']) ? $_REQUEST['name'] : null);
    $patronymic = check_correctness_string(isset($_REQUEST['patronymic']) ? $_REQUEST['patronymic'] : null);
    $phone = check_correctness_string(isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null);
    $city = check_correctness_string(isset($_REQUEST['city']) ? $_REQUEST['city'] : null);
    $street = check_correctness_string(isset($_REQUEST['street']) ? $_REQUEST['street'] : null);
    $house = check_correctness_string(isset($_REQUEST['house']) ? $_REQUEST['house'] : null);
    $apartment = check_correctness_string(isset($_REQUEST['apartment']) ? $_REQUEST['apartment'] : null);
    $branch = check_correctness_string(isset($_REQUEST['branch']) ? $_REQUEST['branch'] : null);

    $resData = null;
    $resData = CheckRegisterParams($email, $pwd1, $pwd2);

    if (!$resData && CheckUserEmail($email)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже зарегистрирован.";
    }

    if (!$resData) {
        $pwd = CreatePassword($email, $pwd1);
        $userData = RegisterNewUser($email, $pwd, $surname, $name, $patronymic, $phone, $city, $street, $house, $apartment, $branch);

        if ($userData['success']) {
            $resData['message'] = "Пользователь успешно зарегистрировался.";
            $resData['success'] = 1;
            $userData = $userData[0];
            $resData['userName'] = $userData['U_Name'] ? $userData['U_Name'] : $userData['U_Login'];
            $resData['userEmail'] = $email;
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['U_Name'] ? $userData['U_Name'] : $userData['U_Login'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }
    echo json_encode($resData);
}

function logoutAction()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        redirect('/');
    } else {
        redirect('/404/');
    }
}

function ForgotPasswordAction()
{
    
    if (!isset($_REQUEST['email'])) {
        redirect('/404/');
    }

    $email = check_correctness_string(isset($_REQUEST['email']) ? $_REQUEST['email'] : null);
    $newPassword = random_password();
    $userData = ForgotPasswordUser($email, CreatePassword($email, $newPassword));

    if ($userData) {
        send_mail(
            $email,
            'Сброс пароля',
            "Новый пароль для входа: <b>{$newPassword}</b>"
        );

        $resData['success'] = 1;
        $resData['message'] = 'Пароль сброшен, проверьте почту.';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Проверьте правильность ввода электронной почты.';
    }
    echo json_encode($resData);
}

function updateAction()
{
    if (!isset($_SESSION['user'])) {
        redirect('/');
    }

    $resData = array();
    $_surname = check_correctness_string($_REQUEST['newSurname'] ? $_REQUEST['newSurname'] : null);
    $_name = check_correctness_string($_REQUEST['newName'] ? $_REQUEST['newName'] : null);
    $_patronymic = check_correctness_string($_REQUEST['newPatronymic'] ? $_REQUEST['newPatronymic'] : null);
    $_phone = check_correctness_string($_REQUEST['newPhone'] ? $_REQUEST['newPhone'] : null);
    $_city = check_correctness_string($_REQUEST['newCity'] ? $_REQUEST['newCity'] : null);
    $_street = check_correctness_string($_REQUEST['newStreet'] ? $_REQUEST['newStreet'] : null);
    $_house = check_correctness_string($_REQUEST['newHouse'] ? $_REQUEST['newHouse'] : null);
    $_apartment = check_correctness_string($_REQUEST['newApartment'] ? $_REQUEST['newApartment'] : null);
    $_branch = check_correctness_string($_REQUEST['newBranch'] ? $_REQUEST['newBranch'] : null);
    $_confirmation = 0;
    $oldpwd = trim($_REQUEST['oldpwd']);
    $_pwd1 = trim($_REQUEST['newpwd'] ? $_REQUEST['newpwd'] : null);
    $_pwd2 = trim($_REQUEST['newpwd2'] ? $_REQUEST['newpwd2'] : null);

    $_oldpwdHash = CreatePassword($_SESSION['user']['U_Login'], $oldpwd);

    if ($_oldpwdHash != $_SESSION['user']['U_Password']) {
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верный.';
        echo json_encode($resData);
        return false;
    }

    $res = UpdateUserDate($_SESSION['user']['U_Login'], $_oldpwdHash, $_pwd1, $_pwd2, $_surname, $_name, $_patronymic, $_phone, $_city, $_street, $_house, $_apartment, $_branch, $_confirmation);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Изменения сохранено.';
        $resData['displayName'] = $_name;

        $_SESSION['user']['U_Surname'] = $_surname;
        $_SESSION['user']['U_Name'] = $_name;
        $_SESSION['user']['U_Patronymic'] = $_patronymic;
        $_SESSION['user']['U_Phone'] = $_phone;
        $_SESSION['user']['U_City'] = $_city;
        $_SESSION['user']['U_Street'] = $_street;
        $_SESSION['user']['U_House'] = $_house;
        $_SESSION['user']['U_Apartment'] = $_apartment;
        $_SESSION['user']['U_Branch'] = $_branch;
        $_SESSION['user']['U_Confirmation'] = $_confirmation;
        $_SESSION['user']['displayName'] = $_name ? $_name : $_SESSION['user']['U_Login'];
        $newPwd = $_SESSION['user']['U_Password'];
        if ($_pwd1 && ($_pwd1 == $_pwd2)) {
            $newPwd = CreatePassword($_SESSION['user']['U_Login'], $_pwd1);
        }
        $_SESSION['user']['U_Password'] = $newPwd;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка сохранения данных';
    }
    echo json_encode($resData);
}

function ActivationAction($smarty)
{
    if (!isset($_GET['id'])) {
        redirect('/404');
    }

    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);

    $res = ConfirmationEmail($_GET['id']);

    if (isset($res[0]['U_Confirmation'])) {
        if (isset($_SESSION['user'])) {
            $_SESSION['user']['U_Confirmation'] = 1;
        }
        $smarty->assign('ConfirmationStatus', 1);
    } else {
        if (isset($_SESSION['user'])) {
            $_SESSION['user']['U_Confirmation'] = 0;
        }
        $smarty->assign('ConfirmationStatus', 0);
    }

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'activation');
    loadTemplate($smarty, 'footer');
}



function RequestConfirmationEmailAction()
{
    if (!isset($_SESSION['user'])) {
        redirect('/404');
    }
    $email = $_SESSION['user']['U_Login'];
    $resData = array();
    $_confirmation = 0;


    $res = RequestConfirmationEmail($email);
    if ($res) {
        $guid = GetGuidByEmail($email)[0]['U_GUID'];
        send_mail(
            $email,
            'Подтверждение электронной почты',
            "Нажмите <b><a href='zorkiy.com.ua/user/activation/{$guid}'>Подтвердить</a></b> что бы подтвердить, что данная почта пренадлежит Вам."
        );
        $resData['success'] = 1;
        $resData['message'] = 'Проверьте почту.';

        $_SESSION['user']['U_Confirmation'] = $_confirmation;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка отправки подтверждения на почту.';
    }
    echo json_encode($resData);
}

<?
include_once '../models/OfferModel.php';

function indexAction()
{
    if (!isset($_REQUEST['O_Phone'])) {
        redirect('/404/');
    }

    $O_Phone = isset($_REQUEST['O_Phone']) ? check_correctness_string($_REQUEST['O_Phone']) : null;

    SendOffer($O_Phone);
    $res = CreateOffer($O_Phone);

    if (!$res) {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка отправки заявки';
        echo json_encode($resData);
        return;
    }

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Заявка отправлена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка отправки заявки';
    }
    echo json_encode($resData);
}

function SendOffer($O_Phone)
{
    send_mail(
        'dmitriystroy18@gmail.com',
        'Выгодное предложение',
        "Телефон: {$O_Phone}"
    );

    /* 
    send_mail(
        'Admin@zorkiy.com.ua',
        'Заявка на подключение',
        "Имя: $FB_Name <br> Телефон: $FB_Phone <br> Email: $FB_Email <br> Сообщение: $FB_Description"
    );
    */
}

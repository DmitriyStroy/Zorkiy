<?
include_once '../models/FeedbackModel.php';

function indexAction()
{
    if (!isset($_REQUEST['FB_Name']) or !isset($_REQUEST['FB_Email']) or !isset($_REQUEST['FB_Phone'])) {
        redirect('/404/');
    }

    $FB_Name = isset($_REQUEST['FB_Name']) ? check_correctness_string($_REQUEST['FB_Name']) : null;
    $FB_Email = isset($_REQUEST['FB_Email']) ? check_correctness_string($_REQUEST['FB_Email']) : null;
    $FB_Phone = isset($_REQUEST['FB_Phone']) ? check_correctness_string($_REQUEST['FB_Phone']) : null;
    $FB_Description = isset($_REQUEST['FB_Description']) ? check_correctness_string($_REQUEST['FB_Description']) : null;

    SendFeedBack($FB_Name, $FB_Email, $FB_Phone, $FB_Description);
    $res = CreateFeedBack($FB_Name, $FB_Email, $FB_Phone, $FB_Description);

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

function SendFeedBack($FB_Name, $FB_Email, $FB_Phone, $FB_Description)
{
    send_mail(
        'dmitriystroy18@gmail.com',
        'Заявка на подключение',
        "Имя: $FB_Name <br> Телефон: $FB_Phone <br> Email: $FB_Email <br> Сообщение: $FB_Description"
    );

    /* 
    send_mail(
        'Admin@zorkiy.com.ua',
        'Заявка на подключение',
        "Имя: $FB_Name <br> Телефон: $FB_Phone <br> Email: $FB_Email <br> Сообщение: $FB_Description"
    );
    */
}

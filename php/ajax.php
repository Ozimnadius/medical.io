<?php
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/php/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/php/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/php/PHPMailer/src/SMTP.php';


$data = $_POST;
$action = $data['action'];
switch ($action) {
    case 'searchAjax':
        echo json_encode(array(
            'status' => true,
            'html' => getSearchResult()
        ));
        exit();
        break;
    case 'addRev':
        $result = getRevResult();
        echo json_encode(array(
            'status' => $result['status'],
            'html' => $result['html']
        ));
        exit();
        break;
    case 'addClinic':
        $result = getAddClinicResult();
        echo json_encode(array(
            'status' => $result['status'],
            'html' => $result['html']
        ));
        exit();
        break;
    case 'callback':
        echo json_encode(array(
            'status' => true,
            'html' => getCallbackResult()
        ));
        exit();
        break;
    default:
        echo json_encode(array(
            'status' => false,
        ));
        exit();
        break;
}

function checkRecaptcha()
{
    require_once('recaptcha-php/recaptchalib.php');
    $privatekey = "6LdvmLcUAAAAAAMBESxjPsZboWRo59L4OfaBOIHz";
    $resp = recaptcha_check_answer($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);
    return !$resp->is_valid;
}

function getSearchResult()
{
    ob_start();
    ?>
    <div class="item">
        <div class="item__top">
            <div class="item__img" style="fill:#3bc13a;">
                <svg class="item__svg">
                    <use xlink:href="/images/icons/sprite.svg#metro"></use>
                </svg>
            </div>
            <div class="item__right">
                <div class="item__title">Кожуховская</div>
                <div class="item__count">3 клиники рядом</div>
            </div>
        </div>
        <div class="item__bottom">
            <div class="item__list">
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin1.svg"></div>
                    <div class="subitem__right">
                        <div class="subitem__premium">Премиум клиника</div>
                        <a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Левобережная</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin2.svg"></div>
                    <div class="subitem__right"><a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Киевская</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin2.svg"></div>
                    <div class="subitem__right"><a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Нагорная</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="item__top">
            <div class="item__img" style="fill:#1f961e;">
                <svg class="item__svg">
                    <use xlink:href="/images/icons/sprite.svg#metro"></use>
                </svg>
            </div>
            <div class="item__right">
                <div class="item__title">Коломенская</div>
                <div class="item__count">8 клиник рядом</div>
            </div>
        </div>
        <div class="item__bottom">
            <div class="item__list">
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin1.svg"></div>
                    <div class="subitem__right">
                        <div class="subitem__premium">Премиум клиника</div>
                        <a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Левобережная</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin2.svg"></div>
                    <div class="subitem__right"><a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Киевская</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin2.svg"></div>
                    <div class="subitem__right"><a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Нагорная</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="item__top">
            <div class="item__img" style="fill:#e71e1e;">
                <svg class="item__svg">
                    <use xlink:href="/images/icons/sprite.svg#metro"></use>
                </svg>
            </div>
            <div class="item__right">
                <div class="item__title">Коммунарка</div>
                <div class="item__count">4 клиники рядом</div>
            </div>
        </div>
        <div class="item__bottom">
            <div class="item__list">
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin1.svg"></div>
                    <div class="subitem__right">
                        <div class="subitem__premium">Премиум клиника</div>
                        <a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Левобережная</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin2.svg"></div>
                    <div class="subitem__right"><a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Киевская</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
                <div class="subitem">
                    <div class="subitem__img"><img class="subitem__svg" src="images/icons/pin2.svg"></div>
                    <div class="subitem__right"><a class="subitem__link" href="tel:+ 7(925)455-25-25">ул. Нагорная</a>
                        <div class="subitem__road">5 минут от метро</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function getRevResult()
{


    if (checkRecaptcha()) {
        ob_start();
        ?>
        <table>
            <tr>
                <td>
                    Рейтинг: <?= $_POST['rating'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Отзыв: <?= $_POST['revComment'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Имя: <?= $_POST['revName'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Телефон: <?= $_POST['renTel'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Дата: <?= $_POST['revDate'] ?>
                </td>
            </tr>
        </table>
        <?
        $htmlMail = ob_get_contents();
        ob_end_clean();


        $status = mailTo(['client@web-comp.ru'], 'Добавление отзыва', $htmlMail);
        if ($status) {
            ob_start();
            ?>
            <div class="success">
                <button type="button" class="success__close">
                    <svg class="success__close-svg">
                        <use xlink:href="/images/icons/sprite.svg#close"></use>
                    </svg>
                </button>
                <div class="success__text">
                    Спасибо!
                    <br>
                    Ваш отзыв принят в обработку.
                </div>
            </div>
            <?
            $html = ob_get_contents();
            ob_end_clean();
            return ['html' => $html, 'status' => true];
        } else {
            return ['html' => '', 'status' => false];
        }
    } else {
        return ['html' => '', 'status' => false];
    }

}

function getAddClinicResult()
{
    if (checkRecaptcha()) {
        ob_start();
        ?>
        <table>
            <tr>
                <td>
                    Название: <?= $_POST['addTitle'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Сайт: <?= $_POST['addSite'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Город: <?= $_POST['addCity'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Адрес: <?= $_POST['addAddr'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    ФИО: <?= $_POST['addName'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Должность: <?= $_POST['addProf'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Телефон: <?= $_POST['addTel'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email: <?= $_POST['addEmail'] ?>
                </td>
            </tr>

        </table>
        <?
        $htmlMail = ob_get_contents();
        ob_end_clean();


        $status = mailTo(['client@web-comp.ru'], 'Добавление клиники', $htmlMail);
        if ($status) {
            ob_start();
            ?>
            <div class="success">
                <button type="button" class="success__close">
                    <svg class="success__close-svg">
                        <use xlink:href="/images/icons/sprite.svg#close"></use>
                    </svg>
                </button>
                <div class="success__text">
                    Спасибо!
                    <br>
                    Мы добавим Вашу <br>
                    клинику после обработки <br>
                    информации
                </div>
            </div>
            <?
            $html = ob_get_contents();
            ob_end_clean();
            return ['html' => $html, 'status' => true];
        } else {
            return ['html' => '', 'status' => false];
        }
    } else {
        return ['html' => '', 'status' => false];
    }
}

function getCallbackResult()
{
    ob_start();
    ?>
    <div class="success">
        <button type="button" class="success__close">
            <svg class="success__close-svg">
                <use xlink:href="/images/icons/sprite.svg#close"></use>
            </svg>
        </button>
        <div class="success__text">
            Спасибо!
            <br>
            Мы добавим Вашу <br>
            клинику после обработки <br>
            информации
        </div>
        <button type="button" class="success__button">
            ЖДУ ЗВОНКА
        </button>
    </div>
    <?
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function mailTo($addrs, $subject, $html, $file = [])
{
    $mail = new PHPMailer(true);
    $mail->CharSet = $mail::CHARSET_UTF8;
    try {
        //Recipients
        $mail->setFrom('info@web-comp.ru', 'Web-Comp');
        foreach ($addrs as $addr) {
            $mail->addAddress($addr, 'Joe User');
        }

        //Attachments
        if (!empty($file)) {
            $mail->addAttachment($file['src'], $file['name']);
        }

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $html;

        $result = $mail->send();
        return $result;
    } catch (Exception $e) {
        die(print_r($e));
        return false;
    }
}




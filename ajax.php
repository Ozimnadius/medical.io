<?php
header('Content-Type: application/json');

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
        echo json_encode(array(
            'status' => true,
            'html' => getRevResult()
        ));
        exit();
        break;
    case 'addClinic':
        echo json_encode(array(
            'status' => true,
            'html' => getAddClinicResult()
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
    return $html;
}

function getAddClinicResult()
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
    </div>
    <?
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
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




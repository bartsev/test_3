<?php

namespace Ylab\Fruits\Model\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\NumberWidget;
use DigitalWand\AdminHelper\Widget\StringWidget;

Loc::loadMessages(__FILE__);

class FruitsAdminInterface extends AdminInterface
{
    public function fields()
    {
        return array(
            'MAIN' => array(
                'NAME' => Loc::getMessage('YLAB_FRUITS_TAB_TITLE'),
                'FIELDS' => array(
                    'ID' => array(
                        'WIDGET' => new NumberWidget(),
                        'READONLY' => true,
                        'FILTER' => true,
                        'HIDE_WHEN_CREATE' => true
                    ),
                    'TITLE' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => 255,
                        'FILTER' => '%'
                    )
                )
            )
        );
    }

    public function helpers()
    {
        return array(
            '\Ylab\Fruits\Model\AdminInterface\FruitsListHelper' => array(
                'BUTTONS' => array(
                    'LIST_CREATE_NEW' => array(
                        'TEXT' => Loc::getMessage('YLAB_FRUITS_ADD'),
                    )
                )
            ),
            '\Ylab\Fruits\Model\AdminInterface\FruitsEditHelper' 
        );

    }
}
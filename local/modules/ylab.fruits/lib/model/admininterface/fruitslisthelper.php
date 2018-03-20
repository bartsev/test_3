<?php

namespace Ylab\Fruits\Model\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminListHelper;

Loc::loadMessages(__FILE__);

class FruitsListHelper extends AdminListHelper
{
    protected static $model = '\Ylab\Fruits\Model\FruitsTable';

    public function setTitle($title)
    {
        $title = Loc::getMessage('YLAB_FRUITS_LIST_TITLE');
        parent::setTitle($title);
    }

}
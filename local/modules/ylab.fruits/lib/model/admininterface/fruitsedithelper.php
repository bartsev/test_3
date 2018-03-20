<?php

namespace Ylab\Fruits\Model\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminEditHelper;

Loc::loadMessages(__FILE__);

class FruitsEditHelper extends AdminEditHelper
{
    protected static $model = '\Ylab\Fruits\Model\FruitsTable';

    public function setTitle($title)
    {
        if (!empty($this->data)) {
            $title = Loc::getMessage('YLAB_FRUITS_EDIT_TITLE', array('#ID#' => $this->data[$this->pk()]));
        }
        else {
            $title = Loc::getMessage('YLAB_FRUITS_NEW_TITLE');
        }
        
        parent::setTitle($title);
    }

}
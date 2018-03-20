<?php

use Bitrix\Main\Loader;
use Ylab\Fruits\Model\AdminInterface\FruitsListHelper;

if (!Loader::includeModule('digitalwand.admin_helper') || !Loader::includeModule('ylab.fruits')) return;

IncludeModuleLangFile(__FILE__);

return array(
    'parent_menu' => 'global_menu_content',
    'sort' => 300,
    'text' => GetMessage('YLAB_FRUITS_MENU_TEXT'),
    'title' => GetMessage('YLAB_FRUITS_MENU_TITLE'),
    'url' => FruitsListHelper::getUrl(),
    'icon' => 'learning_menu_icon',
    'page_icon' => 'learning_menu_icon',
    'items_id' => 'menu_ylab_fruits',
    'items' => array()
    );

<?php

use Bitrix\Main\Loader;

includeModuleLangFile(__FILE__);

if (class_exists('ylab_fruits'))
    return;

class ylab_fruits extends CModule
{
    var $MODULE_ID = 'ylab.fruits';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_GROUP_RIGHTS = 'Y';
    var $PARTNER_NAME = 'YLab';
    var $PARTNER_URI = 'http://ylab.io';

    public function __construct()
    {
        $arModuleVersion = array();

        $path = str_replace('\\', '/', __FILE__);
        $path = substr($path, 0, strlen($path) - strlen('/index.php'));
        include($path . '/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = getMessage('YLAB_FRUITS_MODULE_NAME');
        $this->MODULE_DESCRIPTION = getMessage('YLAB_FRUITS_MODULE_DESCRIPTION');
    }

    public function doInstall()
    {
        global $DB, $APPLICATION;

        $this->installFiles();
        $this->installDB();

        $APPLICATION->includeAdminFile(getMessage('YLAB_FRUITS_INSTALL_TITLE'), __DIR__ . '/step1.php');
    }

    public function installDB()
    {
        registerModule($this->MODULE_ID);
        Loader::includeModule($this->MODULE_ID);
        return true;
    }

    public function installEvents()
    {
        return true;
    }

    public function installFiles()
    {
        copyDirFiles(
            __DIR__ . '/components',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/components',
            true, true
        );

        return true;
    }

    function doUninstall()
    {
        global $APPLICATION;

        $this->uninstallDB();
        $this->uninstallFiles();
        $APPLICATION->includeAdminFile(
            getMessage('YLAB_FRUITS_UNINSTALL_TITLE'),
            __DIR__ . '/unstep1.php'
        );
    }

    function uninstallDB()
    {
        unregisterModule($this->MODULE_ID);
        return true;
    }

    function uninstallEvents()
    {
        return true;
    }

    function uninstallFiles()
    {
        deleteDirFiles(
            __DIR__ . '/components',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/components'
        );

        return true;
    }
}
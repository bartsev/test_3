<?php

use Ylab\Fruits\Model\FruitsTable;

class FruitsComponent extends CBitrixComponent
{
    private function getFruits()
    {
        return FruitsTable::getList()->fetchAll();
    }

    public function executeComponent()
    {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        $this->arResult = $this->getFruits();

        $this->includeComponentTemplate();
    }
}
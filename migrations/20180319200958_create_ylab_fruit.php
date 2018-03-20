<?php


use Phinx\Migration\AbstractMigration;

class CreateYlabFruit extends AbstractMigration
{
    public function change()
    {
        $fruit = $this->table('ylab_fruit');
        $fruit->addColumn('TITLE', 'string')->create();
        $rows = [
                    ['title'  => 'Apple'],
                    ['title'  => 'Lemon'],
                    ['title'  => 'Banana']
                ];
        $fruit->insert($rows)->saveData();
    }
}

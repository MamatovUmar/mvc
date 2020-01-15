<?php


namespace app\models;
use \R;

use app\core\DataBase;

class Test extends DataBase
{
    public $tableName = 'test';

    public function columns()
    {
        
    }

    public function rrr()
    {
        $this->table->age = 27;
        return R::store( $this->table );

    }
}
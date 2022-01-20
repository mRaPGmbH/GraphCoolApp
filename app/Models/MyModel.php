<?php

declare(strict_types=1);

namespace App\Models;

use Mrap\GraphCool\Definition\Field;
use Mrap\GraphCool\Definition\Relation;
use Mrap\GraphCool\Definition\Model;

class MyModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->field_name = Field::string()->nullable();

        $this->relation_name = Relation::hasMany(MyModel::class);
    }

}
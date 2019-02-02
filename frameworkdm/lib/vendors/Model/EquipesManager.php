<?php
/**
 * Created by PhpStorm.
 * User: lordo
 * Date: 09/01/2019
 * Time: 09:50
 */

namespace Model;

use Entity\Equipes;
use TheFrameWork\Manager;

abstract class EquipesManager extends Manager
{

    abstract public function getAll($offset = -1, $limit = -1);
    abstract public function get($id);
    abstract public function add(Equipes $equipes);
    abstract public function delete(Equipes $equipes);

    public function save(Equipes $equipes)
    {
        $equipes->isNew() ? $this->add($equipes) : $this->edit($equipes);
    }


}
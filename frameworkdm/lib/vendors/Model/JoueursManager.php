<?php
/**
 * Created by PhpStorm.
 * User: lordo
 * Date: 09/01/2019
 * Time: 09:50
 */

namespace Model;

use Entity\Joueurs;
use TheFrameWork\Manager;

abstract class JoueursManager extends Manager
{

    abstract public function get($id);
    abstract public function getAll($equipesid);
    abstract public function getAllJoueurs();
    abstract public function add(Joueurs $joueurs);


    public function save(Joueurs $joueurs)
    {
        $joueurs->isNew() ? $this->add($joueurs) : $this->edit($joueurs);
    }


}
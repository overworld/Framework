<?php
/**
 * Created by PhpStorm.
 * User: lordo
 * Date: 01/02/2019
 * Time: 22:25
 */

namespace Entity;

use TheFrameWork\Entity;

class Joueurs extends Entity
{
    protected $id;
    protected $name;
    protected $idEquipe;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * @param mixed $idEquipe
     */
    public function setIdEquipe($idEquipe)
    {
        $this->idEquipe = $idEquipe;
    }




}
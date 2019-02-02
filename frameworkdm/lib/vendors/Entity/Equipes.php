<?php
/**
 * Created by PhpStorm.
 * User: lordo
 * Date: 01/02/2019
 * Time: 22:23
 */

namespace Entity;

use TheFrameWork\Entity;

class Equipes extends Entity
{

    protected $id;
    protected $name;




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





}
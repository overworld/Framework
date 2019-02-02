<?php

namespace Model;

use Entity\Equipes;


class EquipesManagerPDO extends EquipesManager
{

    public function getAll($offset = -1, $limit = -1)
    {
        $sql = 'SELECT * FROM equipes ';

        if ($limit != -1)
        {
            $sql .= ' LIMIT ' . $limit;
        }

        if ($offset != -1)
        {
            $sql .= ' OFFSET ' . $offset;
        }

        $req = $this->dao->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS, 'Entity\Equipes');

        $equipes = $req->fetchAll();

        $req->closeCursor();

        return $equipes;
    }



    public function get($id)
    {
        $sql = 'SELECT * FROM equipes WHERE id = :id';

        $req = $this->dao->prepare($sql);
        $req->bindValue('id', $id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS, 'Entity\Equipes');

        if ($equipes = $req->fetch())
        {
            return $equipes;
        }

        return null;
    }

    public function delete(Equipes $equipes)
    {
        $sql = 'DELETE FROM equipes WHERE id = ' . $equipes->getId();
        $req = $this->dao->query($sql);
    }

    public function add(Equipes $equipes)
    {
        $sql = 'INSERT INTO equipes(name) VALUE(:name)';

        $req = $this->dao->prepare($sql);
        $req->bindValue('name', $equipes->getName());
        $req->execute();

        $equipes->setId($this->dao->lastInsertId());
    }





}
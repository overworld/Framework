<?php

namespace Model;

use Entity\Joueurs;
use Entity\Equipes;

class JoueursManagerPDO extends JoueursManager
{



    public function getAllJoueurs()
    {
        $sql = 'SELECT * FROM joueurs';

        $req = $this->dao->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS, 'Entity\Joueurs');
        $joueurs = $req->fetchAll();
        $req->closeCursor();

        return $joueurs;
    }



    public function getAll($equipesId)
    {
        $sql = 'SELECT * FROM joueurs WHERE idequipe = :idequipe';

        $req = $this->dao->prepare($sql);
        $req->bindValue('idequipe', $equipesId);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS, 'Entity\Joueurs');
        $joueurs = $req->fetchAll();

        $req->closeCursor();

        return $joueurs;
    }


    public function get($id)
    {
        $sql = 'SELECT * FROM joueurs WHERE id = :id';

        $req = $this->dao->prepare($sql);
        $req->bindValue('id', $id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS, 'Entity\Joueurs');

        if ($joueurs = $req->fetch())
        {
            return $joueurs;
        }

        return null;
    }


    public function add(Joueurs $joueurs)
    {
        $sql = 'INSERT INTO joueurs(name, idequipe) VALUE(:name, :idequipe)';

        $req = $this->dao->prepare($sql);
        $req->bindValue('name', $joueurs->getName());
        $req->bindValue('idequipe', $joueurs->getIdEquipe());
        $req->execute();

        $joueurs->setId($this->dao->lastInsertId());
    }




}
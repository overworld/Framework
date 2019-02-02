<?php

namespace App\Backend\modules\Equipes;

use Entity\Equipes;
use TheFrameWork\BackController;
use TheFrameWork\HTTPRequest;

class EquipesController extends BackController
{


    public function executeIndex(HTTPRequest $request)
    {
        $manager = $this->managers->getManagerOf('Equipes');
        $equipes = $manager->getAll();

        $manager = $this->managers->getManagerOf('Joueurs');
        $joueurs = $manager->getAllJoueurs();

        $this->getPage()->addVar('equipes', $equipes);
        $this->getPage()->addVar('joueurs', $joueurs);
    }

    public function executeAdd(HTTPRequest $request)
    {
        if ($request->getMethod() == 'POST')
        {
            $this->handleEquipe($request);
        }
    }


    private function handleEquipe(HTTPRequest $request)
    {
        $equipes = new Equipes([
            'name' => $request->getPost('name'),

        ]);

        if ($request->queryExists('id'))
        {
            $equipes->setId($request->getQuery('id'));
        }

        $flash = 'lequipe a bien été ';
        $equipes->isNew() ? $flash .= 'ajoutée' : $flash .= 'modifiée';
        $this->getApp()->getUser()->setFlash($flash);

        $manager = $this->managers->getManagerOf('Equipes');
        $manager->save($equipes);

        $this->getApp()->getHttpResponse()->redirect('/admin/equipes');
    }


    public function executeDelete(HTTPRequest $request)
    {
        $manager = $this->managers->getManagerOf('Equipes');
        $equipes = $manager->get($request->getQuery('id'));

        if ($request->getMethod() == 'GET')
        {
            $hash = md5($equipes->getName());
            $this->getPage()->addVar('hash', $hash);
        }

        if ($request->getMethod() == 'POST')
        {
            if ($request->postExists('hash') && $request->getPost('hash') == md5($equipes->getName()))
            {
                $manager->delete($equipes);

                $this->getApp()->getUser()->setFlash('L equipe a bien été supprimée');
                $this->getApp()->getHttpResponse()->redirect('/admin/equipes');
            }
        }
    }
}
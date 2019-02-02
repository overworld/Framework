<?php

namespace App\Backend\modules\Joueurs;

use Entity\Joueurs;
use TheFrameWork\BackController;
use TheFrameWork\HTTPRequest;

class JoueursController extends BackController
{


    public function executeIndex(HTTPRequest $request)
    {

        $manager = $this->managers->getManagerOf('Joueurs');
        $joueurs = $manager->getAllJoueurs();

        $this->getPage()->addVar('joueurs', $joueurs);
    }

    public function executeAdd(HTTPRequest $request)
    {
        if ($request->getMethod() == 'POST')
        {
            $this->handleJoueur($request);
        }
    }


    private function handleJoueur(HTTPRequest $request)
    {
        $joueurs = new Joueurs([
            'name' => $request->getPost('name'),
            'idEquipe' => $request->getPost('idEquipe'),


        ]);

        if ($request->queryExists('id'))
        {
            $joueurs->setId($request->getQuery('id'));
        }

        $flash = 'le joueur a bien été ';
        $joueurs->isNew() ? $flash .= 'ajoutée' : $flash .= 'modifiée';
        $this->getApp()->getUser()->setFlash($flash);

        $manager = $this->managers->getManagerOf('Joueurs');
        $manager->save($joueurs);

        $this->getApp()->getHttpResponse()->redirect('/admin/joueurs');
    }



}
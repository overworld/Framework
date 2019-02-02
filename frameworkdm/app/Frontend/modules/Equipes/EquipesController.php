<?php
/**
 * Created by PhpStorm.
 * User: lordo
 * Date: 09/01/2019
 * Time: 09:48
 */

namespace App\Frontend\Modules\Equipes;

use TheFrameWork\HTTPRequest;
use TheFrameWork\BackController;



class EquipesController extends BackController
{

    public function executeIndex(HTTPRequest $request)
    {
        $manager = $this->managers->getManagerOf('Equipes');

        $equipeList = $manager->getAll(0, 5);

        $this->page->addVar('equipes', $equipeList);
    }

    public function executeShow(HTTPRequest $request)
    {

        $manager = $this->managers->getManagerOf('Equipes');

        $equipes = $manager->get($request->getQuery('id'));

        if (empty($equipes))
        {
            $this->app->getHttpResponse()->redirect404();
        }

        $joueurManager = $this->managers->getManagerOf('Joueurs');
        $joueurs = $joueurManager->getAll($equipes->getId());


        $this->page->addVar('equipes', $equipes);
        $this->page->addVar('joueurs', $joueurs);

    }

}
<?php

namespace AchaMeuPet\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AchaMeuPetCoreBundle:Default:index.html.twig');
    }
}

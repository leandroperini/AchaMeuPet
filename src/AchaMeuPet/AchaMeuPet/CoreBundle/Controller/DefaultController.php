<?php

namespace AchaMeuPet\AchaMeuPet\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AchaMeuPetAchaMeuPetCoreBundle:Default:index.html.twig');
    }
}

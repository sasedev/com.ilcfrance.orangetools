<?php

namespace Ilcfrance\Orangetools\ResBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IlcfranceOrangetoolsResBundle:Default:index.html.twig');
    }
}

<?php

namespace Kaan\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Kaan\AppBundle\Entity\User;
class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $data = $em->getRepository('AppBundle:Product')->find(1);
        return $this->render('AppBundle:Default:index.html.twig',array(
            'data' => $data
        ));
    }
}

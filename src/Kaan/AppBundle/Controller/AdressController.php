<?php
namespace Kaan\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        return $this->render('AppBundle:User:index.html.twig');
    }

    public function adressAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('AppBundle:User:adress.html.twig',array(
            'user' => $user
        ));
    }
}
<?php
namespace Kaan\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Kaan\AppBundle\Entity\Adress;
use Kaan\AppBundle\Form\Type\AdressType;

class AdressController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('AppBundle:Adress:adress.html.twig',array(
            'user' => $user
        ));
    }
    public function newAction()
    {
        $adress = new Adress();

        $form = $this->createForm(new AdressType(),$adress);

        return $this->render('AppBundle:Adress:new.html.twig',array(
            'form' => $form->createView()
        ));
    }

    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $adress = $em->getRepository('AppBundle:Adress')->find($id);
        if(!$adress)
        {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('404');
        }
        $em->remove($adress);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','Adres Silindi');
        return $this->redirect($this->generateUrl('adress_homepage'));
    }

    public function createAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $user = $this->get('security.context')->getToken()->getUser();

        $adress = new Adress();

        $form = $this->createForm(new AdressType(),$adress);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $adress->setUser($user);
                $em->persist($adress);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice','Adres Eklendi');
                return $this->redirect($this->generateUrl('adress_homepage'));
            }
        }

        return $this->render('AppBundle:Adress:new.html.twig',array(
            'form' => $form->createView()
        ));
    }
}
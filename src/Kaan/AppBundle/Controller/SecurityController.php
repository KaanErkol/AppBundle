<?php
namespace Kaan\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Kaan\AppBundle\Entity\User;
use Kaan\AppBundle\Form\Type\UserType;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
class SecurityController extends Controller
{
    public function loginAction()
    {
        if($this->get('security.context')->isGranted('ROLE_ADMIN') || $this->get('security.context')->isGranted('ROLE_USER'))
        {
            return $this->redirect($this->generateUrl('dev_homepage'));
        }
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }


        return $this->render('AppBundle:Security:login.html.twig', array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error' => $error
        ));
    }

    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(),$user);
        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $user->setSalt(md5(time()));
                $role = $em->getRepository('AppBundle:Role')->find(1);
                $user->addUserRole($role);
                $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
                $em->persist($user);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Succesfuly Registered!');
                return $this->redirect($this->generateUrl('dev_homepage'));
            }
        }

        return  $this->render('AppBundle:Security:register.html.twig',array(
            'form' => $form->createView()
        ));
    }

}
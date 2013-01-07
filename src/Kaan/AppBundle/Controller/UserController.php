<?php
namespace Kaan\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kaan\AppBundle\Entity\Product;

class ProductController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $products = $em->getRepository('AppBundle:Product')->findAll();

        return $this->render('AppBundle:Product:index.html.twig',array(
            'products' => $products
        ));
    }
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('AppBundle:Product')->find($id);

        if(!$product)
        {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Bulunamadı');
        }

        return $this->render('AppBundle:Product:show.html.twig',array(
            'product' => $product
        ));
    }
}
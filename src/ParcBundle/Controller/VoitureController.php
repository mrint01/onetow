<?php

namespace ParcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
class VoitureController extends Controller
{
    /**
     * @Route("/list_Voiture", name="list_v")
     */
    public function list_voitureAction()
    {
        $em = $this ->container->get('doctrine')->getEntityManager();
        $voitures = $em->getRepository('ParcBundle:Voiture')->findAll();
        return $this->render('@Parc/Default/list_voiture.html.twig',
            array(
                'voitures'=>$voitures
            ));
    }

    /**
     * @Route("/supp_Voiture/{id}", name="supp_v")
     */

    public function supp_voitureAction($id){
        $em = $this->getDoctrine()->getManager();
        $vo = $em->getRepository('ParcBundle:Voiture')->find($id);
        $em->remove($vo);
        $em->flush();
        return $this->redirectToRoute('list_v');
    }

}

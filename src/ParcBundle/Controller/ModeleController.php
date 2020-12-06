<?php

namespace ParcBundle\Controller;

use ParcBundle\Entity\Modele;
use ParcBundle\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ModeleController extends Controller
{
    public function listAction()
    {
        $em = $this ->container->get('doctrine')->getEntityManager();
        $modeles = $em->getRepository('ParcBundle:Modele')->findAll();
        return $this->render('@Parc/Default/list.html.twig',
            array(
                'modeles'=>$modeles
            ));
    }

    public function suppModelAction($id){
     $em = $this->getDoctrine()->getManager();
     $Modele = $em->getRepository(Modele::class)->find($id);
     $em->remove($Modele);
     $em->flush();
     return $this->redirectToRoute('parc_affichage_modele');
    }

    public function list_modele_byIDAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modeles = $em->getRepository('ParcBundle:Modele')->find($id);
        return $this->render('@Parc/Default/modeleById.html.twig',
            array(
                'id'=>$modeles->getId(),
                'Libelle'=>$modeles->getLibelle(),
                'Pays'=>$modeles->getPays(),
            ));
    }
}

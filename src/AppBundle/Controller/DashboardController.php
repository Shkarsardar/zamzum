<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard",name="dashboard")
     *
     * @return void
     */
    public function dashboardAction()
    {
        $currentUserId=$this->getUser();
        $em=$this->getDoctrine()->getManager();
        $query=$em->createQuery(" SELECT video from AppBundle:Video video where video.uploaderId = :id")->setParameter('id',$currentUserId);
        return $this->render("dashboard/index.html.twig",['videos'=>$query->getResult()]);


    }


}








?>
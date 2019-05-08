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
        return $this->render("dashboard.html.twig");

    }


}








?>
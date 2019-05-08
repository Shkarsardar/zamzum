<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class WatchController extends AbstractController
{
    /**
     * @Route("/dashboard/watch/{watch_id}")
     */
    public function watchVideoAction($watch_id)
    {

        return $this->render('dashboard/watch.html.twig');
        

    }
}






?>
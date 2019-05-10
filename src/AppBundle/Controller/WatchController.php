<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class WatchController extends AbstractController
{
    /**
     * @Route("/watch/{video_id}",name="watch")
     */
    public function watchVideoAction($video_id)
    {
        $video='/videos/'.$video_id.".mp4";

        return $this->render('dashboard/watch.html.twig',['video'=>$video]);
        
        

    }
}






?>
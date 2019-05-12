<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Video;
use AppBundle\Entity\Subscribe;

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
        $query=$em->createQuery(" SELECT video from AppBundle:Video video LEFT JOIN AppBundle:User user WITH user.id=video.uploaderId where video.uploaderId=:id ")->setParameter('id',$currentUserId);
        
        return $this->render("dashboard/index.html.twig",['videos'=>$query->getResult()]);


    }
    /**
     * @Route("/dashboard/user/{user}",name="show_user")
     */
    public function showUserAction(int $user)
    {
        $findUser=$this->getDoctrine()->getRepository(User::class)->find($user);
        $userVideos=$this->getDoctrine()->getRepository(Video::class)->getUserVideos($user);
        $userSubscribes=$this->getDoctrine()->getRepository(Subscribe::class)->countSubscribe($user);
        

        if($findUser)
        {
            $isUserSubscribed=$this->getDoctrine()->getRepository(Subscribe::class)->isChannelSubscribed($this->getUser()->getID(),$user);
            return $this->render('user/userchannel.html.twig',['user'=>$findUser,'videos'=>$userVideos,'isSubscribed'=>$isUserSubscribed,'userSubCount'=>$userSubscribes[1]]);


        }
        else
        {
            throw new NotFoundHttpException("Your Page is Looking For is not Found");
            
        }
        
        

    }


}








?>
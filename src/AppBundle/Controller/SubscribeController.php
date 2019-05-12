<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Subscribe;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class SubscribeController extends AbstractController
{
    /**
     * @Route("/dashboard/subscribe/{channelId}",name="subscribe")
     * 
     */
    public function subscribeAction($channelId)
    {
        
        $currentUser=$this->getUser()->getID();

        $em=$this->getDoctrine()->getManager();
        $subscribe=new Subscribe;
        $user=$this->getDoctrine()->getRepository(Subscribe::class)->searchForUser($channelId);
        if(null!==$user)
        {
            $checkUserSubscribe=$this->getDoctrine()->getRepository(Subscribe::class)->isChannelSubscribed($currentUser,$channelId);
            if(null==$checkUserSubscribe)
            {
                $subscribe->setSubscriber($currentUser);
                $subscribe->setChannler($channelId);
                $em->persist($subscribe);
                $em->flush();
        
                $this->addFlash("info","Channel Subscribed");
                return $this->redirectToRoute('show_user',['user'=>$channelId]);
                
            }
            else
            {
                $this->addFlash("danger","Channle is Subscribed And no Longer need ");
                return $this->redirectToRoute('show_user',['user'=>$channelId]);
                
            }
        }
        
        

    }

}






?>
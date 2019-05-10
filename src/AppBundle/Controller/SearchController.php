<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Video;

class SearchController extends AbstractController
{
    /**
     * @Route("search",name="search")
     */
    public function searchAction(Request $request)
    {
        $repo=$this->getDoctrine()->getRepository(Video::class);

        $form=$this->createFormBuilder()->add('search')->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $formData=$form->getData();
            $result=$repo->searchVideo($formData['search']);
            
            return $this->render('search/search.html.twig',['result'=>$result]);


        }
    }

}







?>
<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\User;
use AppBundle\Form\UserType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Entity\User as AppBundleUser;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render("home/index.html.twig");

    }
    /**
     * @Route("/register",name="register")
     *
     * @return void
     */
    public function register(Request $request,UserPasswordEncoderInterface $encoder)
    {
        $user=new AppBundleUser();

        $form=$this->createForm(UserType::class,$user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $password=$encoder->encodePassword($user,$user->getPlainPassword());
            $user->setPassword($password);
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('login');

        }
        return $this->render("home/register.html.twig",['form'=>$form->createView()]);


    }
    /**
     * @Route("/login",name="login")
     *
     * @return void
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error=$authenticationUtils->getLastAuthenticationError();
        $lastUser=$authenticationUtils->getLastUsername();
        return $this->render('home/login.html.twig',[
            'last_user'=>$lastUser,
            'error'=>$error
        ]);


    }
    /**
     * @Route("/logout",name="logout")
     *
     * @return void
     */
    public function logout()
    {

    }
}

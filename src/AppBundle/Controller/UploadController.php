<?php
namespace AppBundle\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UploadType;
use AppBundle\Entity\Video;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UploadController extends Controller
{
    /**
     * @Route("/dashboard/upload",name="upload")
     */
    public function upload(Request $request)
    {
        
        $videoUpload=new Video();
        $form=$this->createForm(UploadType::class,$videoUpload);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $file=$videoUpload->getVideoFileName();
            $filename=$this->generateUniqueFileName().'.'.$file->guessExtension();
            try
            {
                $file->move(
                    $this->getParameter('videos_dir'),
                    $filename
                );
            }
            catch(FileException $e)
            {

            }
            $videoUpload->setUploaderId($this->getUser());

            $videoUpload->setVideoFileName($filename);
            $videoUpload->setPublishDate();

            $em=$this->getDoctrine()->getManager();
            $em->persist($videoUpload);
            $em->flush();
            return $this->redirectToRoute("dashboard");

        }
        return $this->render("dashboard/upload.html.twig",['form'=>$form->createView()]);

    }
    private function generateUniqueFileName()
    {
        return md5(uniqid());

    }
}






?>
<?php
namespace AppBundle\Form;
use AppBundle\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UploadType extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder,$options)
    {
        $builder->add('videoFileName',FileType::class,['label'=>'Upload Your Video','attr'=>['class'=>'form-control']])->add('title',TextType::class)->add('description',TextType::class);

    }
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Video::class
        ]);
    }
}






?>
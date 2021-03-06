<?php

namespace AppBundle\Repository;

/**
 * VideoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VideoRepository extends \Doctrine\ORM\EntityRepository
{
    public function searchVideo($text)
    {
        return $this->getEntityManager()->createQuery(
            'SELECT video FROM AppBundle:Video video where video.title like :title'
        )->setParameter('title',"%".$text."%")->getResult();

    }
    public function getVideoAndUser()
    {
        return $this->getEntityManager()->createQuery('SELECT video FROM AppBundle:Video video LEFT JOIN AppBundle:User user WITH video.uploaderId=user.id ')->getResult();

    }
    public function getUserVideos($id)
    {
        return $this->getEntityManager()->createQuery('SELECT video FROM AppBundle:Video video where video.uploaderId=:id ')->setParameter('id',$id)->getResult();
        
    }
}

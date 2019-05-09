<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideoRepository")
 */
class Video
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="uploader_id",referencedColumnName="id")
     */
    private $uploaderId;
    /**
     * @ORM\Column(name="publishDate",type="datetime")
     *
     * 
     */
    private $publishDate;
    /**
     * @ORM\Column(name="filename",type="string",length=255)
     *
     * 
     */
    private $videoFileName;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Video
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set uploaderId
     *
     * @param integer $uploaderId
     *
     * @return Video
     */
    public function setUploaderId($uploaderId)
    {
        $this->uploaderId = $uploaderId;

        return $this;
    }

    /**
     * Get uploaderId
     *
     * @return int
     */
    public function getUploaderId()
    {
        return $this->uploaderId;
    }

    /**
     * Get the value of publishDate
     */ 
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Set the value of publishDate
     *
     * @return  self
     */ 
    public function setPublishDate()
    {
        $this->publishDate = new DateTime();
        
        return $this;
    }
}


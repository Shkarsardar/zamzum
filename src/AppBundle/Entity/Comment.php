<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumn(name="video_id",referencedColumnName="id")
     */
    private $videoId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_description", type="text")
     */
    private $commentDescription;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $userId;


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
     * Set videoId
     *
     * @param integer $videoId
     *
     * @return Comment
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;

        return $this;
    }

    /**
     * Get videoId
     *
     * @return int
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * Set commentDescription
     *
     * @param string $commentDescription
     *
     * @return Comment
     */
    public function setCommentDescription($commentDescription)
    {
        $this->commentDescription = $commentDescription;

        return $this;
    }

    /**
     * Get commentDescription
     *
     * @return string
     */
    public function getCommentDescription()
    {
        return $this->commentDescription;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Comment
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }
}


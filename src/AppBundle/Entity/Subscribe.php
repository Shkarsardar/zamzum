<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscribe
 *
 * @ORM\Table(name="subscribe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubscribeRepository")
 */
class Subscribe
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
     * @ORM\Column(name="subscriber_id", type="integer")
     */
    private $subscriberId;

    /**
     * @var int
     *
     * @ORM\Column(name="channel_id", type="integer")
     */
    private $channelId;


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
     * Set subscriberId
     *
     * @param integer $subscriberId
     *
     * @return Subscribe
     */
    public function setSubscriberId($subscriberId)
    {
        $this->subscriberId = $subscriberId;

        return $this;
    }

    /**
     * Get subscriberId
     *
     * @return int
     */
    public function getSubscriberId()
    {
        return $this->subscriberId;
    }

    /**
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return Subscribe
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return int
     */
    public function getChannelId()
    {
        return $this->channelId;
    }
}


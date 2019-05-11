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
     * @ORM\Column(name="subscriber", type="integer")
     */
    private $subscriber;

    /**
     * @var int
     *
     * @ORM\Column(name="channler", type="integer")
     */
    private $channler;


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
     * Set subscriber
     *
     * @param integer $subscriber
     *
     * @return Subscribe
     */
    public function setSubscriber($subscriber)
    {
        $this->subscriber = $subscriber;

        return $this;
    }

    /**
     * Get subscriber
     *
     * @return int
     */
    public function getSubscriber()
    {
        return $this->subscriber;
    }

    /**
     * Set channler
     *
     * @param integer $channler
     *
     * @return Subscribe
     */
    public function setChannler($channler)
    {
        $this->channler = $channler;

        return $this;
    }

    /**
     * Get channler
     *
     * @return int
     */
    public function getChannler()
    {
        return $this->channler;
    }
}


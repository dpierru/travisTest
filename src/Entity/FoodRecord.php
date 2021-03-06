<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FoodRecordRepository::class)
 * @ORM\Table
 */
class FoodRecord
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $recordedAt;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Veuillez indiquer un intitulé pour ce qui a été consommé")
     */
    private $entitled;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Veuillez indiquer un nombre de calories")
     * @Assert\Range(min=0, minMessage="Les calories ne peuvent pas être négatives.")
     */
    private $calories;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    public function __construct(UserInterface $user)
    {
        $this->recordedAt = new \DateTime();
        $this->userId = $user->getId();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRecordedAt(): \DateTimeInterface
    {
        return $this->recordedAt;
    }

    public function setRecordedAt(\Datetime $recordedAt)
    {
        $this->recordedAt = $recordedAt;
    }

    public function getCalories()
    {
        return $this->calories;
    }

    public function setCalories($calories)
    {
        $this->calories = $calories;
    }

    public function getEntitled()
    {
        return $this->entitled;
    }

    public function setEntitled($entitled)
    {
        $this->entitled = $entitled;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CalendarRepository")
 */
class Calendar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $attributeName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $directoryName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $googleCalendarId;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAttributeName(): ?string
    {
        return $this->attributeName;
    }

    public function setAttributeName(string $attributeName): self
    {
        $this->attributeName = $attributeName;

        return $this;
    }

    public function getDirectoryName(): ?string
    {
        return $this->directoryName;
    }

    public function setDirectoryName(string $directoryName): self
    {
        $this->directoryName = $directoryName;

        return $this;
    }

    public function getGoogleCalendarId(): ?string
    {
        return $this->googleCalendarId;
    }

    public function setGoogleCalendarId(string $googleCalendarId): self
    {
        $this->googleCalendarId = $googleCalendarId;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CostumerRepository")
 */
class Costumer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lastname1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lastname2;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone1;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone2;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $province;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="costumer", orphanRemoval=true)
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

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

    public function getLastname1(): ?string
    {
        return $this->lastname1;
    }

    public function setLastname1(?string $lastname1): self
    {
        $this->lastname1 = $lastname1;

        return $this;
    }

    public function getLastname2(): ?string
    {
        return $this->lastname2;
    }

    public function setLastname2(?string $lastname2): self
    {
        $this->lastname2 = $lastname2;

        return $this;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(?string $phone1): self
    {
        $this->phone1 = $phone1;

        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): self
    {
        $this->phone2 = $phone2;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(?string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setCostumer($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getCostumer() === $this) {
                $order->setCostumer(null);
            }
        }

        return $this;
    }
}

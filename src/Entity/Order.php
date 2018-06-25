<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $emissionDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $closeDate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalPrice;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $paymentType;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $discount;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $payed;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="orderReference")
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Costumer", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $costumer;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmissionDate(): ?\DateTimeInterface
    {
        return $this->emissionDate;
    }

    public function setEmissionDate(?\DateTimeInterface $emissionDate): self
    {
        $this->emissionDate = $emissionDate;

        return $this;
    }

    public function getCloseDate(): ?\DateTimeInterface
    {
        return $this->closeDate;
    }

    public function setCloseDate(?\DateTimeInterface $closeDate): self
    {
        $this->closeDate = $closeDate;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(?float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(?string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(?string $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getPayed(): ?bool
    {
        return $this->payed;
    }

    public function setPayed(?bool $payed): self
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setOrderReference($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getOrderReference() === $this) {
                $product->setOrderReference(null);
            }
        }

        return $this;
    }

    public function getCostumer(): ?Costumer
    {
        return $this->costumer;
    }

    public function setCostumer(?Costumer $costumer): self
    {
        $this->costumer = $costumer;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order", indexes={@ORM\Index(name="fk_order_customer1_idx", columns={"customer_idcustomer"}), @ORM\Index(name="fk_order_address1_idx", columns={"address_idaddress"})})
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="idorder", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idorder;

    /**
     * @var string
     *
     * @ORM\Column(name="libell", type="string", length=45, nullable=false)
     */
    private $libell;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_delivery", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateDelivery = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reception", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateReception = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="billing", type="string", length=45, nullable=false)
     */
    private $billing;

    /**
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_idaddress", referencedColumnName="idaddress")
     * })
     */
    private $addressIdaddress;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_idcustomer", referencedColumnName="idcustomer")
     * })
     */
    private $customerIdcustomer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="orderIdorder")
     */
    private $productIdproduct;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productIdproduct = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdorder(): ?int
    {
        return $this->idorder;
    }

    public function getLibell(): ?string
    {
        return $this->libell;
    }

    public function setLibell(string $libell): self
    {
        $this->libell = $libell;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateDelivery(): ?\DateTimeInterface
    {
        return $this->dateDelivery;
    }

    public function setDateDelivery(\DateTimeInterface $dateDelivery): self
    {
        $this->dateDelivery = $dateDelivery;

        return $this;
    }

    public function getDateReception(): ?\DateTimeInterface
    {
        return $this->dateReception;
    }

    public function setDateReception(\DateTimeInterface $dateReception): self
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    public function getBilling(): ?string
    {
        return $this->billing;
    }

    public function setBilling(string $billing): self
    {
        $this->billing = $billing;

        return $this;
    }

    public function getAddressIdaddress(): ?Address
    {
        return $this->addressIdaddress;
    }

    public function setAddressIdaddress(?Address $addressIdaddress): self
    {
        $this->addressIdaddress = $addressIdaddress;

        return $this;
    }

    public function getCustomerIdcustomer(): ?Customer
    {
        return $this->customerIdcustomer;
    }

    public function setCustomerIdcustomer(?Customer $customerIdcustomer): self
    {
        $this->customerIdcustomer = $customerIdcustomer;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductIdproduct(): Collection
    {
        return $this->productIdproduct;
    }

    public function addProductIdproduct(Product $productIdproduct): self
    {
        if (!$this->productIdproduct->contains($productIdproduct)) {
            $this->productIdproduct[] = $productIdproduct;
            $productIdproduct->addOrderIdorder($this);
        }

        return $this;
    }

    public function removeProductIdproduct(Product $productIdproduct): self
    {
        if ($this->productIdproduct->contains($productIdproduct)) {
            $this->productIdproduct->removeElement($productIdproduct);
            $productIdproduct->removeOrderIdorder($this);
        }

        return $this;
    }

}

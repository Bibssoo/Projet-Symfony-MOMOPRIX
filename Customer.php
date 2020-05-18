<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer", uniqueConstraints={@ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})})
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcustomer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcustomer;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=60, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=60, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=70, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=80, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=false)
     */
    private $dateOfBirth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $created = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updated = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="bank_details", type="string", length=45, nullable=false)
     */
    private $bankDetails;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="customerIdcustomer")
     */
    private $productIdproduct;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productIdproduct = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdcustomer(): ?int
    {
        return $this->idcustomer;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getBankDetails(): ?string
    {
        return $this->bankDetails;
    }

    public function setBankDetails(string $bankDetails): self
    {
        $this->bankDetails = $bankDetails;

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
            $productIdproduct->addCustomerIdcustomer($this);
        }

        return $this;
    }

    public function removeProductIdproduct(Product $productIdproduct): self
    {
        if ($this->productIdproduct->contains($productIdproduct)) {
            $this->productIdproduct->removeElement($productIdproduct);
            $productIdproduct->removeCustomerIdcustomer($this);
        }

        return $this;
    }

}

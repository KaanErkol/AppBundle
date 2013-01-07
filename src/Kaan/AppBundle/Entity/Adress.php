<?php
namespace Kaan\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="userAdress")
 */
class Adress
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="Adress")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     * @var array $user
     */
    protected $user;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $country;
    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $city;
    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $postcode;
    /**
     * @ORM\Column(type="text")
     */
    protected $adress;

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $shippingname;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdat;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Adress
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Adress
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Adress
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Adress
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    
        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return Adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    
        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set user
     *
     * @param \Kaan\AppBundle\Entity\User $user
     * @return Adress
     */
    public function setUser(\Kaan\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Kaan\AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Adress
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    
        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Adress
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set shippingname
     *
     * @param string $shippingname
     * @return Adress
     */
    public function setShippingname($shippingname)
    {
        $this->shippingname = $shippingname;
    
        return $this;
    }

    /**
     * Get shippingname
     *
     * @return string 
     */
    public function getShippingname()
    {
        return $this->shippingname;
    }
}
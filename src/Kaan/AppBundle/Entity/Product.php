<?php
namespace Kaan\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
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
     * @ORM\Column(type="string",length=255)
     * @var string $name
     */
    protected $name;
    /**
     * @ORM\Column(type="text")
     * @var text $description;
     */
    protected $description;
    /**
     * @ORM\Column(type="string",length=255)
     * @var string $permalink
     */
    protected $permalink;
    /**
     * @ORM\Column(type="datetime")
     * @var datetime $availableon
     */
    protected $availableon;
    /**
     * @ORM\Column(type="datetime")
     * @var datetime $deletedat
     */
    protected $deletedat;
    /**
     * @ORM\Column(type="text")
     * @var text $metadesc;
     */
    protected $metadesc;
    /**
     * @ORM\Column(type="text")
     * @var text $metakeyword;
     */
    protected $metakeyword;

    /**
     * @ORM\OneToMany(targetEntity="ProductAttribute", mappedBy="product",cascade={"remove"})
     */
    protected  $attribute;

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
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set permalink
     *
     * @param string $permalink
     * @return Product
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    
        return $this;
    }

    /**
     * Get permalink
     *
     * @return string 
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Set availableon
     *
     * @param \DateTime $availableon
     * @return Product
     */
    public function setAvailableon($availableon)
    {
        $this->availableon = $availableon;
    
        return $this;
    }

    /**
     * Get availableon
     *
     * @return \DateTime 
     */
    public function getAvailableon()
    {
        return $this->availableon;
    }

    /**
     * Set deletedat
     *
     * @param \DateTime $deletedat
     * @return Product
     */
    public function setDeletedat($deletedat)
    {
        $this->deletedat = $deletedat;
    
        return $this;
    }

    /**
     * Get deletedat
     *
     * @return \DateTime 
     */
    public function getDeletedat()
    {
        return $this->deletedat;
    }

    /**
     * Set metadesc
     *
     * @param string $metadesc
     * @return Product
     */
    public function setMetadesc($metadesc)
    {
        $this->metadesc = $metadesc;
    
        return $this;
    }

    /**
     * Get metadesc
     *
     * @return string 
     */
    public function getMetadesc()
    {
        return $this->metadesc;
    }

    /**
     * Set metakeyword
     *
     * @param string $metakeyword
     * @return Product
     */
    public function setMetakeyword($metakeyword)
    {
        $this->metakeyword = $metakeyword;
    
        return $this;
    }

    /**
     * Get metakeyword
     *
     * @return string 
     */
    public function getMetakeyword()
    {
        return $this->metakeyword;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attribute = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add attribute
     *
     * @param \Kaan\AppBundle\Entity\ProductAttribute $attribute
     * @return Product
     */
    public function addAttribute(\Kaan\AppBundle\Entity\ProductAttribute $attribute)
    {
        $this->attribute[] = $attribute;
    
        return $this;
    }

    /**
     * Remove attribute
     *
     * @param \Kaan\AppBundle\Entity\ProductAttribute $attribute
     */
    public function removeAttribute(\Kaan\AppBundle\Entity\ProductAttribute $attribute)
    {
        $this->attribute->removeElement($attribute);
    }

    /**
     * Get attribute
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttribute()
    {
        return $this->attribute;
    }
}
<?php
namespace Kaan\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="productattribute")
 */
class ProductAttribute
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
     * @var string $value;
     */
    protected $value;
    /**
     * @ORM\OneToMany(targetEntity="Attribute", mappedBy="productattribute")
     * *
     * @var ArrayCollection $attribute
     */
    protected $attribute;
}

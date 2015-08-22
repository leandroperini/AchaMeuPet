<?php

namespace AchaMeuPet\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 */
class Color
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $hexCode;


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
     * @return Color
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
     * Set hexCode
     *
     * @param string $hexCode
     * @return Color
     */
    public function setHexCode($hexCode)
    {
        $this->hexCode = $hexCode;

        return $this;
    }

    /**
     * Get hexCode
     *
     * @return string 
     */
    public function getHexCode()
    {
        return $this->hexCode;
    }
}

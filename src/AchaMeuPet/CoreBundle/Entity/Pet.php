<?php

namespace AchaMeuPet\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 *  Pet
 * @Vich\Uploadable
 */
class Pet {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Breed
     */
    private $breed;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var Color
     */
    private $color;

    /**
     * @var float
     */
    private $weight;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * @var datetime
     */
    private $lostDate;
    
    /**
     * @var Image
     * 
     *
     */
    private $picture;
    
    /**
     * @Vich\UploadableField(mapping="pet_picture", fileNameProperty="picture")
     * @var File 
     */
    private $pictureFile;

    /**
     *
     * @var \DateTime
     */
    private $updatedAt;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Get name
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get breed
     * 
     * @return Breed
     */
    public function getBreed() {
        return $this->breed;
    }

    /**
     * Get age
     * 
     * @return intege
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Get color
     * 
     * @return Color
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * Get weight
     * 
     * @return float
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * Get width
     * 
     * @return float
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * Get height
     * 
     * @return float
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * Get lostDate
     * 
     * @return datetime
     */
    public function getLostDate() {
        return $this->lostDate;
    }

    /**
     * Set name
     * 
     * @param string $name
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set breed
     * 
     * @param Breed $breed
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setBreed($breed) {
        $this->breed = $breed;
        return $this;
    }

    /**
     * Set age
     * 
     * @param integer $age
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

    /**
     * Set color
     * 
     * @param Color $color
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

    /**
     * Set weight
     * 
     * @param float $weight
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Set width
     * 
     * @param float $width
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    /**
     * Set height
     * 
     * @param float $height
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    /**
     * Set lostDate
     * 
     * @param datetime $lostDate
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setLostDate(datetime $lostDate) {
        $this->lostDate = $lostDate;
        return $this;
    }
    
     /**
     * Get picture
     * @return Image
     */
    public function getPicture() {
        return $this->picture;
    }

    /**
     * Set picture
     * @param Image $picture
     * @return \AchaMeuPet\CoreBundle\Entity\Pet
     */
    public function setPicture($picture) {
        $this->picture = $picture;
        return $this;
    }
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function getPictureFile() {
        return $this->pictureFile;
    }
    
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $pictureFile
     * @return \AchaMeuPet\CoreBundle\Entity\Breed
     */
    public function setPictureFile(File $pictureFile = null) {
        $this->pictureFile = $pictureFile;

        if ($pictureFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    

}

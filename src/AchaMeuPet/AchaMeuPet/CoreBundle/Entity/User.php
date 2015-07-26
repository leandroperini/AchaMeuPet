<?php

namespace AchaMeuPet\AchaMeuPet\CoreBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    protected $facebookId;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    public function getId() {
        return $this->id;
    }

    public function getFacebookId() {
        return $this->facebookId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFacebookId($facebookId) {
        $this->facebookId = $facebookId;
    }

    public function getParent() {
        return 'FOSUserBundle';
    }

}

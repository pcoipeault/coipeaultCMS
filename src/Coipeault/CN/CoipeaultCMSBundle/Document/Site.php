<?php

namespace Coipeault\CN\CoipeaultCMSBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Description of Site
 *
 * @author pako
 * 
 * @PHPCR\Document()
 */
class Site {
    
    /**
     * @PHPCR\Id()
     */
    protected $id;
    
    /**
     * @PHPCR\ReferenceOne(targetDocument="Coipeault\CN\CoipeaultCMSBundle\Document\Page")
     */
    protected $homepage;
    
    public function getHomepage() {
        
        return $this->homepage;
    }
    
    public function setHomepage($homepage) {
        $this->homepage = $homepage;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
}

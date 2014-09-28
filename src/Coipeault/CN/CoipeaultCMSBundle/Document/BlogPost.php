<?php

namespace Coipeault\CN\CoipeaultCMSBundle\Document;

use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Description of BlogPost
 *
 * @PHPCR\Document(referenceable=true)
 * 
 * @author pako
 */
class BlogPost implements RouteReferrersReadInterface {

    use ContentTrait;
    
    /**
     * @PHPCR\Date()
     */
    protected $date;
    
    /**
     * @PHPCR\PrePersist()
     */
    public function updateDate() {
        
        if (!$this->date)
            $this->date = new \DateTime ();
    }
    
    public function getDate() {
        
        return $this->date;
    }
    
    public function setDate(\DateTime $date) {
        $this->date = $date;
    }
    
}

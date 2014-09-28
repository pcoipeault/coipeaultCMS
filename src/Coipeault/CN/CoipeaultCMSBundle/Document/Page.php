<?php

namespace Coipeault\CN\CoipeaultCMSBundle\Document;

use Knp\Menu\NodeInterface;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
use Doctrine\ODM\Phpcr\Mapping\Annotations as PHPCR;

/**
 * Description of Page
 *
 * @PHPCR\Document(referenceable=true)
 * 
 * @author pako
 */
class Page implements RouteReferrersReadInterface, NodeInterface {

    use ContentTrait;
    
    /**
     * @PHPCR\Children()
     */
    protected $children;
    
    public function getName() {
        
        return $this->title;
    }
    
    public function getChildren() {
        
        return $this->children;
    }
    
    public function getOptions() {
        
        return array(
            'label'                 => $this->title,
            'content'               => $this,
            'attributes'            => array(),
            'childrenAttributes'    => array(),
            'displayChildren'       => TRUE,
            'linkAttributes'        => array(),
            'labelAttributes'       => array(),
        );
    }
}

<?php

namespace Coipeault\CmsBundle\Document;

use Knp\Menu\NodeInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;

/**
 * Description of Page
 * 
 * @PHPCR\Document(referenceable=true)
 *
 * @author pako
 */
class Page implements RouteReferrersReadInterface, NodeInterface {
    
    /**
     * @PHPCR\Id()
     */
    protected $id;
    
    /**
     * @PHPCR\ParentDocument()
     */
    protected $parent;
    
    /**
     * @PHPCR\NodeName()
     */
    protected $title;
    
    /**
     * @PHPCR\String(nullable=true)
     */
    protected $content;
    
    protected $routes;
    
    public function getId() {
        
        return $this->id;
    }
    
    public function getParentDocument() {
        
        return $this->parent;
    }
    
    public function setParentDocument($parent) {
        $this->parent = $parent;
    }
    
    public function getTitle() {
        
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getContent() {
        
        return $this->content;
    }
    
    public function setContent($content) {
        $this->content = $content;
    }
    
    public function getRoutes() {
        
        return $this->routes;
    }
}

<?php

namespace Coipeault\CmsBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;

/**
 * Description of Post
 * 
 * @PHPCR\Document(referenceable=true)
 *
 * @author pako
 */
class Post implements RouteReferrersReadInterface {
    
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

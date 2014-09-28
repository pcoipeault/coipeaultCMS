<?php

namespace Coipeault\CN\CoipeaultCMSBundle\Initializer;

use Doctrine\Bundle\PHPCRBundle\Initializer\InitializerInterface;
use PHPCR\Util\NodeHelper;
use Doctrine\Bundle\PHPCRBundle\ManagerRegistry;
use Coipeault\CN\CoipeaultCMSBundle\Document\Site;

/**
 * Description of SiteInitializer
 *
 * @author pako
 */
class SiteInitializer implements InitializerInterface {
    
    private $basepath;
    
    public function __construct($basepath = '/cms') {
        $this->basepath = $basepath;
    }
    
    public function init(ManagerRegistry $registry) {
        $dm = $registry->getManagerForClass('Coipeault\CN\CoipeaultCMSBundle\Document\Site');
        
        if ($dm->find(NULL, $this->basepath))
            return;
        
        $site = new Site();
        $site->setId($this->basepath);
        $dm->persist($site);
        $dm->flush();
        
        $session = $registry->getConnection();
        
        NodeHelper::createPath($session, $this->basepath . '/pages');
        NodeHelper::createPath($session, $this->basepath . '/posts');
        NodeHelper::createPath($session, $this->basepath . '/routes');
        
        $session->save();
    }
    
    public function getName() {
        
        return 'Coipeault Site Initializer';
    }
}

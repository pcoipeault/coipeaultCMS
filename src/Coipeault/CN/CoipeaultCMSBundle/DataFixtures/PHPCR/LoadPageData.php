<?php

namespace Coipeault\CN\CoipeaultCMSBundle\DataFixtures\PHPCR\LoadPageData;

use Coipeault\CN\CoipeaultCMSBundle\Document\Page;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of LoadPageData
 *
 * @author pako
 */
class LoadPageData implements FixtureInterface {
    
    public function load(ObjectManager $manager) {
        $parent = $manager->find(NULL, '/cms/pages');
        
        $root_page = new Page();
        $root_page->setTitle('Main');
        $root_page->setParentDocument($parent);
        $manager->persist($root_page);
        
        $page = new Page();
        $page->setTitle('Home');
        $page->setParentDocument($root_page);
        $page->setContent(<<<HERE
Here's the content of the homepage loaded in fixtures.
HERE
        );
        $manager->persist($page);
        
        $page = new Page();
        $page->setTitle('About');
        $page->setParentDocument($root_page);
        $page->setContent(<<<HERE
Here's the content of the about page loaded in fixtures.
HERE
        );
        $manager->persist($page);
        $manager->flush();
    }
}

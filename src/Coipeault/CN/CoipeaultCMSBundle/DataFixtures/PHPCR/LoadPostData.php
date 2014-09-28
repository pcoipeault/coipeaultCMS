<?php

namespace Coipeault\CN\CoipeaultCMSBundle\DataFixtures\PHPCR\LoadPageData;

use Coipeault\CN\CoipeaultCMSBundle\Document\BlogPost;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of LoadPostData
 *
 * @author pako
 */
class LoadPostData implements FixtureInterface {
    
    public function load(ObjectManager $manager) {
        $parent = $manager->find(NULL, '/cms/posts');
        
        foreach (array('First', 'Second', 'Third', 'Fourth') as $title) {
            $post = new BlogPost();
            $post->setTitle(sprintf('My %s Post', $title));
            $post->setParentDocument($parent);
            $post->setContent(<<<HERE
Here's the content of the ' . $title . ' BlogPost
HERE
            );
            
            $manager->persist($post);
        }
        
        $manager->flush();
    }
}

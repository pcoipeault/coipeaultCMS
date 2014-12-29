<?php

namespace Coipeault\CN\CoipeaultCMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {
    
    /**
     * @Route("/")
     */
    public function indexAction() {
        $dm = $this->get('doctrine_phpcr')->getManager();
        $site = $dm->find('Coipeault\CN\CoipeaultCMSBundle\Document\Site', '/cms');
        $homepage = $site->getHomepage();
        
        if (!$homepage)
            throw $this->createNotFoundException ('No Homepage configured');
        
        return $this->forward('CoipeaultCNCoipeaultCMSBundle:Default:Page', array(
            'contentDocument' => $homepage,
        ));
    }

    /**
     * @Route(
     *      name="make_homepage",
     *      pattern="/cms/make_homepage/{id}",
     *      requirements={"id": ".+"}
     * )
     */
    public function makeHomepageAction($id) {
        $dm = $this->get('doctrine_phpcr')->getManager();
        
        $site = $dm->find(NULL, '/cms');
                
        if (!$site)
            throw $this->createNotFoundException ('Could not find /cms document');
        
        $page = $dm->find(NULL, $id);
        
        if (!$page)
            throw $this->createNotFoundException ('Could not find page with ID ' . $id);

        $site->setHomepage($page);
        $dm->persist($page);
        $dm->flush();
        
        return $this->redirect($this->generateUrl('admin_coipeault_page_edit', array(
            'id' => $page->getId(),
        )));
    }

    /**
     * @Template("CoipeaultCNCoipeaultCMS:Default:page.html.twig")
     */
    public function pageAction($document) {
        $dm = $this->get('doctrine_phpcr')->getManagerForClass('Coipeault');
        $posts = $dm->getRepository('CoipeaultCNCoipeaultCMSBundle:BlogPost')->findAll();
        
        return array(
            'page'  => $document,
            'posts' => $posts,
        );
    }
}

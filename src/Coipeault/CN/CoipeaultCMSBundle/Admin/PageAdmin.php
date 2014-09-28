<?php

namespace Coipeault\CN\CoipeaultCMSBundle\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;

/**
 * Description of PageAdmin
 *
 * @author pako
 */
class PageAdmin extends Admin {
    
    protected function configureListFields(ListMapper $list) {
        $list->addIdentifier('title', 'text');
    }
    
    protected function configureFormFields(FormMapper $form) {
        $form->with('form.group_general')
            ->add('title', 'text')
            ->add('content', 'textarea')
            ->end();
    }
    
    public function prePersist($object) {
        $parent = $this->getModelManager()->find(NULL, '/cms/pages');
        $object->setParentDocument($parent);
    }
    
    protected function configureDatagridFilters(DatagridMapper $filter) {
        $filter->add('title', 'doctrine_phpcr_string');
    }
    
    protected function configureSideMenu(ItemInterface $menu, $action, AdminInterface $childAdmin = null) {
        
        if ('edit' !== $action)
            return;
        
        $page = $this->getSubject();
        
        $menu->addChild('make-homepage', array(
            'label'             => 'Make Homepage',
            'attributes'        => array(
                'class' => 'btn'
            ),
            'route'             => 'make_homepage',
            'routeParameters'   => array(
                'id' => $page->getId()
            ),
        ));
    }

    public function getExportFormats() {
        
        return array();
    }
}

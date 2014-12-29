<?php


namespace Coipeault\CN\CoipeaultCMSBundle\Admin;

use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Description of BlogPostAdmin
 *
 * @author pako
 */
class BlogPostAdmin extends PageAdmin {
    
    protected function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form->with('form.group_general')
            ->add('date', 'date')
            ->end();
    }
}

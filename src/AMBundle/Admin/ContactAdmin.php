<?php
/**
 * Created by PhpStorm.
 * User: amaddah
 * Date: 03/08/16
 * Time: 19:26
 */
 namespace AMBundle\Admin;

 use Sonata\AdminBundle\Admin\AbstractAdmin;
 use Sonata\AdminBundle\Datagrid\ListMapper;
 use Sonata\AdminBundle\Datagrid\DatagridMapper;
 use Sonata\AdminBundle\Form\FormMapper;

 class ContactAdmin extends AbstractAdmin
 {
     protected function configureFormFields(FormMapper $formMapper)
     {
         $formMapper->add('nom')
            ->add('email')
            ->add('titre')
            ->add('message');
     }

     protected function configureDatagridFilters(DatagridMapper $datagridMapper)
     {
         $datagridMapper->add('nom')
            ->add('email')
            ->add('titre')
            ->add('message');
     }

     protected function configureListFields(ListMapper $listMapper)
     {
         $listMapper->addIdentifier('nom')
            ->addIdentifier('email')
            ->addIdentifier('titre')
            ->addIdentifier('message')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                )
            ));
     }
 }
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

 class FormationAdmin extends AbstractAdmin
 {
     protected function configureFormFields(FormMapper $formMapper)
     {
         $formMapper->add('institut')
            ->add('diplome')
            ->add('dateDebut', 'datetime')
            ->add('dateFin', 'datetime');
     }

     protected function configureDatagridFilters(DatagridMapper $datagridMapper)
     {
         // $datagridMapper->add()
     }

     protected function configureListFields(ListMapper $listMapper)
     {
         $listMapper->add('institut')
            ->add('diplome')
            ->add('dateDebut', null, array(), 'sonata_type_datetime_picker', array(
                    'format'                => 'dd/MM/yyyy HH:mm',
                    'dp_side_by_side'       => true,
                    'dp_use_current'        => false,
                    'dp_use_seconds'        => false,
                    ))
            ->add('dateFin', null, array(), 'sonata_type_datetime_picker', array(
                    'format'                => 'dd/MM/yyyy HH:mm',
                    'dp_side_by_side'       => true,
                    'dp_use_current'        => false,
                    'dp_use_seconds'        => false,
                    ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                    'edit' => array(),
                )
            ));
     }
 }
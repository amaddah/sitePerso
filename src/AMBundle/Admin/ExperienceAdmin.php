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

 class ExperienceAdmin extends AbstractAdmin
 {
     protected function configureFormFields(FormMapper $formMapper)
     {
         $formMapper->add('titre')
            ->add('description')
            ->add('dateDebut', 'datetime')
            ->add('dateFin', 'datetime')
            ->add('motsCles')
            ->add('membres');
     }

     protected function configureDatagridFilters(DatagridMapper $datagridMapper)
     {
         // $datagridMapper->add()
     }

     protected function configureListFields(ListMapper $listMapper)
     {
         $listMapper->add('titre')
            ->add('description')
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
            ->add('motsCles')
            ->add('membres')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                    'edit' => array(),
                )
            ));
     }
 }
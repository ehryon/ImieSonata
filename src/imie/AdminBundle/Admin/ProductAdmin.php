<?php
namespace imie\AdminBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
* 
*/
class ProductAdmin extends Admin
{
	/**
	* create or edit a product
	*/
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('name')
			->add('price')
			->add('description')
		;
	}

	/**
	* filter product
	*/
	protected function configureDataGridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('name')
			->add('price')
			->add('description')
		;	
	}

	/**
	* list product
	*/
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('name')
			->add('price')
			->add('description')
		;
	}
}
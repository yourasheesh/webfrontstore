<?php 

/**
 * Dev Asheesh Singh
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category    Asheesh
 * @package     Asheesh_WebFrontStore
 * @author 		Asheesh Singh <yourasheesh@gmail.com>
 * @copyright   Copyright Asheesh Singh
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */ 
 
class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	const VAR_NAME_FILTER = 'slider_image_filter';
	
	public function __construct()
	{
	  parent::__construct();
	  $this->setId('productGrid');
	  $this->setDefaultSort('image_order');
	  $this->setDefaultDir('ASc');
	  $this->_varNameFilter = self::VAR_NAME_FILTER;
	  $this->setSaveParametersInSession(true);
	  $this->setUseAjax(true);
	}

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('webfrontstore_models/products')->getCollection();
	  $this->setCollection($collection); 
	  return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
		$this->addColumn('productid', array(
			'header'    => Mage::helper('webfrontstore_helpers')->__('ProductId#'),
			'align'     =>'right',
			'width'     => '50px',
			'index'     => 'productid',
			'filter_index' => 'productid',
			'type'	  => 'text',
        ));
		
	    $this->addColumn('groupid', array(
            'header'        => Mage::helper('webfrontstore_helpers')->__('GroupId'),
            'align'         => 'left',
            'type'          => 'text',
            'index'         => 'groupid',
			'filter_index' => 'groupid',
        ));
		
		$this->addColumn('movietitle', array(
            'header'        => Mage::helper('webfrontstore_helpers')->__('MovieTitle'),
            'align'         => 'right',
            'type'          => 'text',
            'index'         => 'movietitle',
			'filter_index' => 'movietitle',
        ));
		
		$this->addColumn('store', array(
            'header'        => Mage::helper('webfrontstore_helpers')->__('Store'),
            'align'         => 'left',
            'type'          => 'text',
            'index'         => 'store',
			'filter_index' => 'store',
        ));
		
		$this->addColumn('category', array(
            'header'        => Mage::helper('webfrontstore_helpers')->__('Category'),
            'align'     	=> 'left',
			'index'         => 'categories',
			'filter_index' => 'categories',
            'type'          => 'options',
			'options'		=> Mage::getModel('webfrontstore_models/system_config_source_categories')->toFilterableOptionArray(),
        ));
		
		$this->addColumn('subcategory', array(
            'header'        => Mage::helper('webfrontstore_helpers')->__('Subcategory'),
            'align'     	=> 'left',
			'index'         => 'categories',
			'filter_index' => 'categories',
            'type'          => 'options',
			'options'		=> Mage::getModel('webfrontstore_models/system_config_source_categories')->toFilterableOptionArray(1),
        ));
		
		$this->addColumn('price', array(
            'header'        => Mage::helper('webfrontstore_helpers')->__('Price'),
            'align'     	=> 'left',
			'index'         => 'price',
			'filter_index' => 'price',
            'type'          => 'text',
        ));
		
		$this->addColumn('shippingduration', array(
            'header'        => Mage::helper('webfrontstore_helpers')->__('ShippingDuration'),
            'align'     	=> 'left',
			'index'         => 'shippingduration',
			'filter_index' => 'shippingduration',
            'type'          => 'number',
        ));
		
		
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('webfrontstore_helpers')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
					array(
                        'caption'   => Mage::helper('webfrontstore_helpers')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('webfrontstore_helpers')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('webfrontstore_helpers')->__('XML'));
	  
      return parent::_prepareColumns();
  }
  
  protected function _prepareMassaction()
  {
  	$this->setMassactionIdField('id');
  	$this->getMassactionBlock()->setFormFieldName('id');
  
  	$this->getMassactionBlock()->addItem('delete', array(
  			'label'    => Mage::helper('webfrontstore_helpers')->__('Delete Slider Image(s)'),
  			'url'      => $this->getUrl('*/*/massDelete'),
  			'confirm'  => Mage::helper('webfrontstore_helpers')->__('Are you sure to delete Slider Image?')
  	));
	
  	return $this;
  }
  
  public function getGridUrl() {
        return $this->getUrl('*/*/grid', array('_secure'=>true, '_current'=>true));
    }
	
  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}
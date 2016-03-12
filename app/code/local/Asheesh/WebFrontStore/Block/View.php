<?php

class Asheesh_WebFrontStore_Block_View extends Mage_Core_Block_Template
{
	public function currentProductData(){
		$id = $this->getRequest()->getParam('id',0);
		$product = Mage::getModel('webfrontstore_models/products')->load($id);
		if($product && $product->getId()){
			return $product->getData();
		}
		return array();
		
	}
	
	public function currentProductDataVersions($groupid = ''){
		$id = $this->getRequest()->getParam('id',0);
		$collection = array();
		if(strlen($groupid) > 0){
			$collection = Mage::getResourceModel('webfrontstore_models/products_collection')
								->addfieldToFilter('groupid',array('eq'=>$groupid))
								->addfieldToFilter('id',array('neq'=>$id))
			;
		}
		return $collection;
	}
}

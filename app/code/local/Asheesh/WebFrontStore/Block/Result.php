<?php

class Asheesh_WebFrontStore_Block_Result extends Mage_Core_Block_Template
{
	public function getLoadedCollection(){
		$query = $this->getRequest()->getParam('q','');
		$collection = array();
		if(strlen($query) > 0){
			$collection = Mage::getResourceModel('webfrontstore_models/products_collection')->addfieldToFilter('movietitle',array('like'=>"%".$query."%"));
			$collection->getSelect()->group('groupid');
		}
		return $collection;
	}
}

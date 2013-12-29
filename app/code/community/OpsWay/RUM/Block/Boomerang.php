<?php

class OpsWay_RUM_Block_Boomerang extends Mage_Core_Block_Template
{
    public function getPageType()
    {
        $handles = $this->getLayout()->getUpdate()->getHandles();\
        # Home page can be found also by  stristr(Mage::getSingleton('cms/page')->getIdentifier(),"home")
        if (in_array("cms_page", $handles) 
        	&& Mage::getSingleton('cms/page')->getIdentifier() == "home") {
        	$pagetype = "Home page";
        } elseif (in_array("catalog_product_view", $handles)) {
        	$pagetype = "Product page";
        } elseif (in_array("catalog_category_view", $handles)) {
        	$pagetype = "Category page";
        } elseif (in_array("checkout_cart_index", $handles)) {
        	$pagetype = "Shopping cart";
        } elseif (in_array("checkout_onepage_index", $handles)) {
        	$pagetype = "Onepage checkout";
        } elseif (in_array("customer_account_login", $handles)) {
        	$pagetype = "Account login page";
        } elseif (in_array("customer_account_index", $handles)) {
        	$pagetype = "My account";
        } else {
			$pagetype = "Other";        	
        }

        return $pagetype;
    }
}

<?php

class OpsWay_RUM_Block_Boomerang extends Mage_Core_Block_Template
{
    private $pagetype;

    public function getPageType()
    {
        if (!$this->pagetype) {
            $handles = $this->getLayout()->getUpdate()->getHandles();
            if (in_array("cms_page", $handles) 
                && stristr(Mage::getSingleton('cms/page')->getIdentifier(),"home")) {
                $this->pagetype = "Home page";
            } elseif (in_array("cms_page", $handles)) {
                $this->pagetype = "CMS page";
            } elseif (in_array("catalog_product_view", $handles)) {
                $this->pagetype = "Product page";
            } elseif (in_array("catalog_category_view", $handles)) {
                $this->pagetype = "Category page";
            } elseif (in_array("checkout_cart_index", $handles)) {
                $this->pagetype = "Shopping cart";
            } elseif (in_array("checkout_onepage_index", $handles)) {
                $this->pagetype = "Onepage checkout";
            } elseif (in_array("customer_account_login", $handles)) {
                $this->pagetype = "Account login page";
            } elseif (in_array("customer_account_index", $handles)) {
                $this->pagetype = "My account";
            } else {
                $this->pagetype = "Other";            
            }
        }

        return $this->pagetype;
    }
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SpadeWorx\CustomApi\Observer;

use Magento\Framework\Event\ObserverInterface;

class OrderPlaceAfter implements ObserverInterface
{
    /**
     * Order Model
     *
     * @var \Magento\Sales\Model\Order $order
     */
    protected $order;

     public function __construct(
        \Magento\Sales\Model\Order $order
    )
    {
        
        $this->order = $order;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        
        $orderId = $observer->getEvent()->getOrderIds();
        $orderObj = $this->order->load($orderId);

        //get Order All Item
        //$itemCollection = $orderObj->getItemsCollection();
        //$customer = $orderObj->getCustomerId(); // using this id you can get customer name
		
		$orderData = array();
		$orderdata['order_id'] = $orderObj->getEntityId();
		$orderdata['customer_id']  =  $orderObj->getCustomerId();
		$orderdata['customer_email'] = $orderObj->getCustomerEmail();
		$orderdata['customer_firstname'] = $orderObj->getCustomerFirstname();
		$orderdata['customer_lastname'] = $orderObj->getCustomerLastname();
		$orderdata['status'] = $orderObj->getStatus();
		$orderdata['total_qty_ordered'] = $orderObj->getTotalQtyOrdered();
		$orderdata['grand_total'] = $orderObj->getGrandTotal();
		
		
		
		
		

  /*
		//$url = 'http://localhost/magento22/testapi.php';
		$url = 'http://104.211.89.57:8080/api/User/UserAuthentication?userInfo=dXNlck5hbWU9c2FyYW5nLmt1bGthcm5pQHNwYWRld29yeC5jb20mUGFzc3dvcmQ9c3BhZGVAMTIz';
		$fields_string = json_encode($orderdata);
		$fields = sizeof($orderData);


		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		//curl_setopt($ch,CURLOPT_POST, count($fields));
		//curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE); 

		$result = curl_exec($ch);
		if(!$result){
			print_r("Connection Failure"); die;
		}else{
			echo "<result>";print_r($result); echo "</br>";
		}
		curl_close($ch);
		*/
    }
}
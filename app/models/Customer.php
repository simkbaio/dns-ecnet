<?php

class Customer extends \User {

	public function product(){
	    $product = ProductUser::whereUserId($this->id)->first();
		if($product){
			return Product::find($product->product_id);
		}else{
			return null;
		}

	}

	//Set product package to User
	public function setProduct(Product $product){
		$current_product = ProductUser::whereUserId($this->id)->first();

		//Update if Current product package is existed.
		if($current_product){
			$current_product->update([
				'product_id'=>$product->id,
				'max_domains'=>$product->domains_amounts,
				'begin_date'=>\Carbon\Carbon::now()->toDateTimeString(),
				'expired_date'=>\Carbon\Carbon::now()->addDays($product->duration),
			]);
		}else{
			//Create new Product package
			$current_product = ProductUser::create([
				'product_id'=>$product->id,
				'max_domains'=>$product->domains_amounts,
				'begin_date'=>\Carbon\Carbon::now()->toDateTimeString(),
				'expired_date'=>\Carbon\Carbon::now()->addDays($product->duration),
			]);
		}
		return $current_product;
	}
	function domains(){
		return $this->hasMany('Domain','user_id','id');
	}




	/**
	 * return current online Customer.
	 * @return bool|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
	 */
	public static  function current(){
	    if(Sentry::check()){
		    $customer = Customer::find(Sentry::getUser()->id);
		    return $customer;
	    }else{
		    return false;
	    }
	}


}
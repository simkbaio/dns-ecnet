<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/5/2014
 * Time: 3:27 PM
 */

class Product extends Eloquent {
	protected $guarded = [];




	// Get Attributes

	public function getPriceAttribute(){
	    return number_format($this->attributes['price'],0,',','.');
	}

} 
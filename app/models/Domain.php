<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/19/2014
 * Time: 3:57 PM
 */

class Domain extends Eloquent {
	protected $guarded =[];

	public function records(){
	    return $this->hasMany('Record','domain_id','id');
	}

} 
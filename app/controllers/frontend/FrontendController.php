<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/6/2014
 * Time: 9:41 AM
 */

namespace frontend;


class FrontendController extends \BaseController {
	public $user;
	public $customer;
	function __construct() {
	if(\Sentry::check()){
		$this->user = \Sentry::getUser();
		$this->customer = \Customer::find($this->user->id);
	}
}


} 
<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/6/2014
 * Time: 9:41 AM
 */

namespace frontend;
use \Sentry;


class PagesController extends FrontendController {
	function __construct() {

	}

	public function home(){
		if(\Sentry::check()){
			return \Redirect::route('customer_dashbroad');
		}
	    Return \View::make('frontend.pages.home');
	}
} 
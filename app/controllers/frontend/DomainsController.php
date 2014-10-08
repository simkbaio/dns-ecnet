<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/20/2014
 * Time: 11:00 AM
 */

namespace frontend;


class DomainsController extends FrontendController {

	public function index(){
		return \View::make('frontend.customer.pages.domains');

	}

	public function show($id){
		$domain = \Domain::whereUserId($this->customer->id)->whereId($id)->firstOrFail();
		return \View::make('frontend.customer.domains.show')
			->withDomain($domain);
	}

	public function create(){

	}
	public function store(){


	}
	public function destroy($id){

	}
} 
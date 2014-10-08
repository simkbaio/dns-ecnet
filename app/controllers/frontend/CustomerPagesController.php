<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/18/2014
 * Time: 2:50 PM
 */

namespace frontend;
use Acme\Forms\Modules\DomainForm;
use \Sentry;


class CustomerPagesController extends FrontendController {
	public $customer_group;
	public $domainForm;


	function __construct(DomainForm $domainForm) {
		parent::__construct();
		if(!\Auth::check()){
			return \Redirect::route('home');
		}
		$this->customer_group = Sentry::FindGroupByName('Customer');
		if(!$this->customer_group){
			return Redirect::to('home');
			Log::debug('[CustomerPagesController]The group: Customer not found');
		}

		$this->domainForm = $domainForm;


	}

	public function dashbroad(){
		if(!$this->customer->product()){
			$free_product = \Product::find(1);
			$this->customer->setProduct($free_product);

		}
	    return \View::make('frontend.customer.pages.domains');
	}



	public function store_domain(){
		$rules = [
			'domain'=>'required',
		];
		$messages = [
			'domain.required'=>'Bạn chưa nhập domain',
			'domain.unique'=>'Domain đã có trong hệ thống',
		];


		$Valid = \Validator::make(\Input::all(),$rules,$messages);



		if($Valid->passes()) {
			$domain = \Domain::create( [
				'name'    => \Input::get( 'domain' ),
				'user_id' => $this->customer->id,
				'type'=>'MASTER',
			] );
			//Plus in Product_user record
			$product_user = \ProductUser::whereUserId($this->customer->id)->first();
			if($product_user){
				$product_user->update([
					'domains'=>($product_user->domains ++),
				]);
			}else{
				$free_product = \Product::findOrFail(1);
				$this->customer->setProduct($free_product);

			}



		}else{
			return \Redirect::back()
				->withFlashMessage([
					'type'=>'danger',
					'content'=>$Valid->errors()->first('domain'),
				]);
		}

		return \Redirect::back()
			->withFlashMessage([
				'type'=>'success',
				'content'=>'Bạn thêm thành công domain: '.$domain->name,
			]);
	}

	function deleteDomain($id){
		$domain  = \Domain::whereId($id)->whereUserId($this->customer->id)->first();
		if($domain){
			$domain->delete();
			return \Redirect::back()
				->withFlashMessage([
					'type'=>'success',
					'content'=>'Bạn đã xóa thành công domain: '.$domain->name,
				]);
		}else{

		}
	}

} 
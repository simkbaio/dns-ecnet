<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/12/2014
 * Time: 2:55 AM
 */

namespace frontend;


use Acme\Forms\RegistrationForm;

class RegisterController extends FrontendController {
	protected  $registerForm;

	function __construct(RegistrationForm $registerForm ) {
		$this->registerForm = $registerForm;
	}


	public function create(){
	    return \View::make('frontend.pages.register');
	}
	public function store(){
		$input = \Input::only('first_name','last_name','username', 'email', 'password');

		$this->registerForm->validate(\Input::all());

		// Lựa chọn giữa xác thực email hay không

		//Tạo tài khoản customer
		$user = \User::createUser($input);
		\Sentry::login($user);
		// nội dung thông báo
		$notice_title = 'Bạn đã đăng kí thành công!';
		$notice_body = 'Chúng tôi đã gửi mail đến hòm thư bạn đăng kí tài khoản. Xin mời kiểm tra mail để kích hoạt tài khoản của mình';


		return \View::make('frontend.layouts.notice')
		           ->withTitle($notice_title)
		           ->withBody($notice_body);
	}
	public function active(){
	}
} 
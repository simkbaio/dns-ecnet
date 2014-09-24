<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/13/2014
 * Time: 9:32 AM
 */

namespace frontend;


use Acme\Forms\LoginForm;

class SessionController extends FrontendController {
	protected $loginForm;

	function __construct( LoginForm $loginForm ) {
		$this->loginForm = $loginForm;
	}


	public function customer_create() {
		return \View::make( 'frontend.pages.customer_login' );
	}

	public function customer_store() {
		try {
			// Login credentials
			$credentials = array(
				'email'    => \Input::get( 'email' ),
				'password' => \Input::get( 'password' ),
			);

			// Authenticate the user
			( \Input::has( 'remember' ) ) ? $remember = true: $remember = false;

			$user = \Sentry::authenticate( $credentials,$remember );
		} catch ( Cartalyst\Sentry\Users\LoginRequiredException $e ) {
			echo 'Login field is required.';
		} catch ( Cartalyst\Sentry\Users\PasswordRequiredException $e ) {
			echo 'Password field is required.';
		} catch ( Cartalyst\Sentry\Users\WrongPasswordException $e ) {
			echo 'Wrong password, try again.';
		} catch ( Cartalyst\Sentry\Users\UserNotFoundException $e ) {
			echo 'User was not found.';
		} catch ( Cartalyst\Sentry\Users\UserNotActivatedException $e ) {
			echo 'User is not activated.';
		} // The following is only required if the throttling is enabled
		catch ( Cartalyst\Sentry\Throttling\UserSuspendedException $e ) {
			echo 'User is suspended.';
		} catch ( Cartalyst\Sentry\Throttling\UserBannedException $e ) {
			echo 'User is banned.';
		}

		return \Redirect::route('customer_dashbroad');

	}
	public function customer_destroy(){
	    \Sentry::logout();
		return \Redirect::route('home');
	}
} 
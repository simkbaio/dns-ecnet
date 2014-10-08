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
		// Login credentials
		$credentials = array(
			'email'    => \Input::get( 'email' ),
			'password' => \Input::get( 'password' ),
		);

		// Authenticate the user
		( \Input::has( 'remember' ) ) ? $remember = true : $remember = false;

		try {

			$user = \Sentry::authenticate( $credentials, $remember );

		} catch ( \Cartalyst\Sentry\Users\LoginRequiredException $e ) {
			return \Redirect::back()->withFlashMessage('Login field is required.');
		} catch ( \Cartalyst\Sentry\Users\PasswordRequiredException $e ) {
			return \Redirect::back()->withFlashMessage('Password field is required.');
		} catch ( \Cartalyst\Sentry\Users\WrongPasswordException $e ) {
			return \Redirect::back()->withFlashMessage('Wrong password, try again.');
		} catch ( \Cartalyst\Sentry\Users\UserNotFoundException $e ) {
			return \Redirect::back()->withFlashMessage('User was not found.');
		} catch ( \Cartalyst\Sentry\Users\UserNotActivatedException $e ) {
			return \Redirect::back()->withFlashMessage('User is not activated.');
		} // The following is only required if the throttling is enabled
		catch ( \Cartalyst\Sentry\Throttling\UserSuspendedException $e ) {
			return \Redirect::back()->withFlashMessage('User is suspended.');
		} catch ( \Cartalyst\Sentry\Throttling\UserBannedException $e ) {
			return \Redirect::back()->withFlashMessage('User is banned.');
		}catch( \Cartalyst\Sentry\ Users\WrongPasswordException $e){
			return \Redirect::back()->withFlashMessage('Sai mật khẩu.');

		}

		return \Redirect::route( 'customer_dashbroad' );

	}

	public function customer_destroy() {
		\Sentry::logout();

		return \Redirect::route( 'home' );
	}
} 
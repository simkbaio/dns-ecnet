<?php

class ProductsController extends \BaseController {

	protected $productForm;

	function __construct(\Acme\Forms\Modules\ProductForm $productForm ) {
		$this->productForm = $productForm;
	}


	/**
	 * Display a listing of the products.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('modules.products.index');

	}


	/**
	 * Show the form for creating a new products.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('modules.products.create');

	}


	/**
	 * Store a newly created products in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name','domains_amount','duration','status','price');
		$this->productForm->validate($input);
		Product::create($input);

		return Redirect::route('admin.products.index')
			->withFlashMessage('Tạo sản phẩm mới thành công!');


	}


	/**
	 * Display the specified products.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified products.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return View::make('modules.products.edit')
			->withProduct($product);

	}


	/**
	 * Update the specified products in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}


	/**
	 * Remove the specified products from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

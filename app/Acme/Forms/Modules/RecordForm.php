<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/20/2014
 * Time: 3:59 PM
 */

namespace Acme\Forms\Modules;


use Laracasts\Validation\FormValidator;

class RecordForm  extends FormValidator{
	protected $rules = [
		'name'=>'required|max:120',
		'content'=>'required|max:255',
		'ttl'=>'required|numeric:between:60,600',
	];
} 
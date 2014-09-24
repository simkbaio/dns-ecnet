<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/20/2014
 * Time: 4:05 PM
 */

namespace frontend;


use Acme\Forms\Modules\RecordForm;

class RecordsController extends FrontendController {
	protected $recordForm;

	function __construct( RecordForm $recordForm ) {
		$this->recordForm = $recordForm;
	}

	public function store(){
		$this->recordForm->validate(\Input::all());
		$input = \Input::only('domain_id','name','type','content','ttl');
		$record = \Record::create($input);
		if($record){
			return \Redirect::back()
				->withFlashMessage([
					'type'=>'success',
					'content'=>'Tạo thêm bản ghi thành công: ['.$record->type.'] : '.$record->content,
				]);
		}

	    return dd(\Input::all());
	}
	public function update($id){
	    $record = \Record::find($id);
		return dd($record);
	}
} 
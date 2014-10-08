<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/20/2014
 * Time: 4:05 PM
 */

namespace frontend;


use Acme\Forms\Modules\RecordForm;
use Laracasts\Flash\Flash;
use Laracasts\Validation\FormValidationException;

class RecordsController extends FrontendController {
	protected $recordForm;

	function __construct( RecordForm $recordForm ) {
		$this->recordForm = $recordForm;
	}

	public function store(){
		$this->recordForm->validate(\Input::all());
		$input = \Input::only('domain_id','name','type','content','ttl');
		try{
			$domain = \Domain::findOrFail($input['domain_id']);
		}catch (\Exception $e){
			Flash::error('Có lỗi trong quá trình tạo bản ghi');
			return \Redirect::back();
		}
		switch($input['name']){
			case '@':
				$input['name'] = $domain->name;
				break;
			default:
				$input['name'] = $input['name'].".".$domain->name;
		}
		$record = \Record::create($input);
		if($record){
			Flash::success('Bạn đã tạo thành công bản ghi mới!');
			return \Redirect::back();
		}else{
			return \Redirect::back();
		}

	    return dd(\Input::all());
	}
	public function update($id){
		$input = \Input::only('name','type','content','ttl');
		try{
			$this->recordForm->UpdateValidate(\Input::all());
		}catch (FormValidationException $e){
			Flash::error($e->getErrors()->first());
			return \Redirect::back();

		}
	    $record = \Record::find($id);
		if($record){
			$result = $record->update($input);
			if($result){
				Flash::success('Bạn Đã cập nhật thành công bản ghi');
				return \Redirect::back();
			}
		}else{
			return \Redirect::back();
		}
	}
	public function destroy($id){
	        try{
		        $record = \Record::whereId($id)->firstOrfail();
		        $record->delete();
	        }catch (\Exception $e){
		        Flash::warning('Không tìm thấy bản ghi cần xóa');
		        return \Redirect::back();
	        }
		Flash::success('Bạn xóa thành công bản ghi!');
		return \Redirect::back();
	}
} 
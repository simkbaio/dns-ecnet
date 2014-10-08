<?php

/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/19/2014
 * Time: 3:57 PM
 */
class Domain extends Eloquent {
	protected $connection = 'powerdns';
	public $timestamps = false;
	protected $guarded = [ ];

	public function records() {
		return $this->hasMany( 'Record', 'domain_id', 'id' );
	}

	public function addRecord( $record_data ) {
//		$record_data = [
//			'domain_id'=>$this->id,
//			'name'=>'',
//			'content'=>'',
//			'ttl'=>'',
//			'prio','0',
//			'change_date'=>time(),
//		];

		try {
			$data = array_merge( [
				'domain_id'   => $this->id,
				'prio'        => '0',
				'change_data' => time(),
			], $record_data );

			$record = Record::create( $data );

			return $record;
		} catch ( Exception $e ) {
			die( 'Error when add Record to domain: ' . $this->name );
		}


	}

}
<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/20/2014
 * Time: 4:03 PM
 */

class Record extends Eloquent {
	protected $connection = 'powerdns';

	public $timestamps = false;
	protected $guarded = [];
} 
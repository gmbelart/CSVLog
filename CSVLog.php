<?php

/**
 * Write csv log based on date format
 *
 * example: 
 *
 * $data = array(
 * 	array(5, 6, 'tujuh'),
 * 	array('senin', 2, "jum'at")
 * 	);
 * $log = new Log('log', '2014-08-02');
 * foreach($data as $v){
 * 	$log->write($v);
 * }
 * $log->close();
 *
 * will create folder and file log/2014/August/02.csv
 *
 *
 * @author      Ahmad Hajar <karyakudi@gmail.com>
 * @copyright   2014 Ahmad Hajar
 * @version     1.0
 */

class CSVLog{
	public $handler;

	/**
	* init log
	*
	* @param $root String root folder for saving log
	* @param $date String string with date format yyyy-mm-dd for generating folder and file
	*/
	public function __construct($root, $date){
		$year = date('Y', strtotime($date));
		$month = date('F', strtotime($date));
		$day = date('d', strtotime($date));

		if(!is_dir($root . '/' . $year . '/' . $month)){
			mkdir($root . '/' . $year . '/' . $month, 0775, true);
		}

		$this->handler = fopen($root . '/' . $year . '/' . $month . '/' . $day . '.csv', 'a+');
	}

	/**
	* write data to csv file
	* 
	* @param $data Array data to be written on csv
	*/
	public function write($data){
		fputcsv($this->handler, $data);
	}

	/**
	* close file
	* 
	*/
	public function close(){
		fclose($this->handler);
	}
}

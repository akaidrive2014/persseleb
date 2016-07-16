<?php
Class Timer{
	public static function countPasTime($timeData){
		$date1 = date('Y-m-d H:i:s',strtotime($timeData));
		$dateNow = date('Y-m-d H:i:s');
		$datetime1 = new DateTime($date1);
		$datetime2 = new DateTime($dateNow);
		$interval = $datetime1->diff($datetime2);
		//echo $interval->format('%y years %m months and %d days');
		$minutes = $interval->format('%i minutes');
		$hours = $interval->format('%h hours');
		$days = $interval->format('%d days');
		$months = $interval->format('%m months');
		$yers = $interval->format('%y years');
		 
		//echo $interval->format('%i minutes');
	}
}

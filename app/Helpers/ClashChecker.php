<?php
namespace App\Helpers;

class ClashChecker
{
	public static function groups_clash_in_time($a, $b){

    	return ((($a->start_time >= $b->start_time) AND ($a->start_time <= $b->end_time)) 
              OR (($a->end_time >= $b->start_time) AND ($a->end_time <= $b->end_time)));
	}

    public static function groups_clash_in_time_and_room($a, $b){

        $time_clash = self::groups_clash_in_time($a, $b);
        $room_clash = $a->classroom_id == $b->classroom_id;
        return $time_clash AND $room_clash;
    }
}
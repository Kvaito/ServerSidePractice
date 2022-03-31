<?php

namespace Model;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms{
    use HasFactory;
    public $timestamps = false;

    public static function mergeArrayOfObject($array){
        $i=0;
        for($iDriver=0;$iDriver<count( $array);$iDriver++)
        {
            for($jDriver=0;$jDriver<count( $array[$iDriver]); $jDriver++)
            {
                $arrayMerged[$i]= $array[$iDriver][$jDriver];
                $arrayMerged[$i]=(array)$arrayMerged[$i];
                $i++;
            }
        }
        return $arrayMerged;
    }

     public static function addRoom($formData)
     {
         DB::insert('insert into rooms (id_division,Room_Number,Floor,Type,Area,Sit_place) values (?,?,?,?,?,?)',
             [$formData['id_division'],$formData['roomNumber'],$formData['floor'],$formData['type'],$formData['area'],$formData['places']
             ]);
         return 1;
     }

    public static function deleteRoom($formData)
    {
        DB::delete('delete from rooms where Room_Number=? and id_division=?',[$formData['roomNumber'],$formData['id_division']]);
    }

    public static function getAllRooms()
    {
        $rooms=DB::select('select * from rooms');
        $i=0;
        foreach ($rooms as $room)
        {
            $rooms[$i]=(array)$room;
            $i++;
        }
        return $rooms;
    }

    public static function getRooms($checkedDivisions)
    {
        $roomArr=[];
        $i=0;
        foreach ($checkedDivisions as $divisionId)
        {
            $roomArr[$i]=DB::select('select * from rooms where id_division = ? ',[$divisionId]);
            $i++;
        }
        if (!isset ($roomArr[0][0])){
            return [];
        }
        //слияние массива
        $roomsArrMerged=self::mergeArrayOfObject($roomArr);
        return $roomsArrMerged;
    }

    public static function countArea($checkedRooms)
    {
        $countedArea=0;
        foreach ($checkedRooms as $room)
        {
            $area=DB::selectOne('select Area from rooms where id=?',[$room]);
            $area=((array)$area)['Area'];
            $countedArea=$countedArea+$area;
        }
        return $countedArea;
    }

    public static function countPlaces($checkedDivision)
    {
            $i=0;
            $countedPlace=0;
            foreach ($checkedDivision as $division)
            {
                $roomsInDivisions[$i]=DB::select('select id from rooms where id_division = ?',[$division]);
                $i++;
            }
            $roomsInDivisionsMerged=self::mergeArrayOfObject($roomsInDivisions);
            foreach ($roomsInDivisionsMerged as $room)
            {
                $places=DB::selectOne('select Sit_place from rooms where id=?',[$room['id']]);
                $places=((array)$places)['Sit_place'];
                $countedPlace=$countedPlace+$places;
            }
            return $countedPlace;
    }
}

<?php

namespace Model;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms{
    use HasFactory;
    public $timestamps = false;

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

    public static function getRooms($checkedDivisions)
    {
        $roomArr=[];
        foreach ($checkedDivisions as $division)
        {

        }
        return $roomArr;
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
            //слияние подмассивов
            $i=0;
            for($iDriver=0;$iDriver<count($roomsInDivisions);$iDriver++)
            {
                for($jDriver=0;$jDriver<count($roomsInDivisions[$iDriver]); $jDriver++)
                {
                    $roomsInDivisionsMerged[$i]=$roomsInDivisions[$iDriver][$jDriver];
                    $roomsInDivisionsMerged[$i]=(array)$roomsInDivisionsMerged[$i];
                    $i++;
                }
            }
            foreach ($roomsInDivisionsMerged as $room)
            {
                $places=DB::selectOne('select Sit_place from rooms where id=?',[$room['id']]);
                $places=((array)$places)['Sit_place'];
                $countedPlace=$countedPlace+$places;
            }
            return $countedPlace;
    }
}
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//формирование массива параметров
$arComponentParameters = array(
    "GROUPS" => array(
        "LIST"    =>  array(
            "NAME"  =>  "Параметры суммы чисел:",
            "SORT"  =>  "300",
        ),
        "VISUAL"    =>  array(
            "NAME"  =>  "Параметры отображения",
            "SORT"  =>  "300",
        ),
    ),
    "PARAMETERS" => array(
        "X"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Введите число B",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  "0"
        ),
        "Z"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Введите число B",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  "0"
        ),

        "VM_TR"  =>  array(
            "PARENT"    =>  "VISUAL",
            "NAME"      =>  "Отобразить панель",
            "TYPE"      =>  "CHECKBOX",
            "DEFAULT"=>"0",
        ),


    ),
);

?>
<?


if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class Param extends CBitrixComponent {

    public function onPrepareComponentParams($arParams)
    {

        $result = array(
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => isset($arParams["CACHE_TIME"]) ? $arParams["CACHE_TIME"]: 36000000,
            "X" => intval($arParams["X"]),
            "Z"=> intval($arParams["Z"]),
        );

        return $result;
    }

    public function myMethod($x){

        return $x * $x;

    }

    public function mySum($a,$b){
        $res = $a + $b;
        return $res;
    }

    public function executeComponent(){


        if($this->startResultCache()){

            $this->arResult["RESULT_SUM"] = $this->mySum($this->arParams["X"], $this->arParams["Z"]);
            $this->includeComponentTemplate();

        }

        return $this->arResult["RESULT_SUM"];
    }

}
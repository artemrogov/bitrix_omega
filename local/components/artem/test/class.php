<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class Test extends CBitrixComponent
{


    public function var1()
    {
        $arResult['my_param_1'] = 'отработка первого компонента artem';

        return $arResult;
    }

    function var2()
    {
        $arResult['my_param_2'] = "Второй метод";

        return $arResult;
    }

    function  var3()
    {
        $arResult['my_param_3'] = "третий параметр";

        return $arResult;
    }


    public function executeComponent(){

        $this->arResult = array_merge($this->arResult, $this->var1());
        $this->arResult = array_merge($this->arResult,$this->var2());
        $this->arResult = array_merge($this->arResult,$this->var3());

        $this->includeComponentTemplate();

    }

}


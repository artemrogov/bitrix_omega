<?php

namespace Nglab\Ng;

use Bitrix\Main\Engine\Contract\Controllerable;
use CBitrixComponent;
use Omg\CatalogBookTable;
use Bitrix\Main\Context;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


class Ng extends CBitrixComponent implements Controllerable{


    /**
     * Сбрасываем фильтры по-умолчанию (ActionFilter\Authentication и ActionFilter\HttpMethod)
     * Предустановленные фильтры находятся в папке /bitrix/modules/main/lib/engine/actionfilter/
     * @return array
     */
    public function configureActions()
    {
        return [
            'sendBookData' => [ // Ajax-метод
                'prefilters' => [],
            ],
        ];
    }

    /**
     * Обработка Ajax-метода (должны быть с постфиксом Action)
     * @param $param1
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function sendBookDataAction($param1)
    {

       return $this->getCatalogBooksArray($param1);

    }

    public function onPrepareComponentParams($arParams)
    {

        $result = array(
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => isset($arParams["CACHE_TIME"]) ? $arParams["CACHE_TIME"]: 36000000,
        );

        return $result;
    }

    /**
     * Формирует массив - книг которые содаержатся в каталоге,
     * фильтруем по ID каталога и формируем результирующий массив
     * @param $id
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */

    public function getCatalogBooksArray($id){

       $catalogTable = CatalogBookTable::getByPrimary($id,[
            'select'=>['*','BOOKS']
        ])->fetchObject();

         $arrCatalogResult = function() use($catalogTable){

             $result[] = 'Каталог: '.$catalogTable->get("UF_NAME_CATALOG");

            foreach($catalogTable->getBooks() as $book){

                $result[] = $book->get("UF_BOOK_NAME").' '.$book->get("UF_AUTHOR");
            }

            return $result;
        };

        return $arrCatalogResult();

    }

    /**
     * @return mixed|void
     */
    public function executeComponent()
    {

        if($this->startResultCache()){

            $this->includeComponentTemplate();

        }

    }

}
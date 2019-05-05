<?php

namespace Nglab\Ng;

use Bitrix\Main\Engine\Contract\Controllerable;
use CBitrixComponent;
use Omg\CatalogBookTable;
use Bitrix\Main\Context;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


class Ng extends CBitrixComponent implements Controllerable{



    public function configureActions()
    {
        return [
            'sendBookData' => [ // Ajax-метод
                'prefilters' => [],
            ],
        ];
    }

    // Ajax-методы должны быть с постфиксом Action
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


    public function executeComponent()
    {

        if($this->startResultCache()){

            $this->includeComponentTemplate();

        }

    }

}
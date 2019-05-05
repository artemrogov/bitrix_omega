<?php


namespace Omg;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;

class CatalogBookTable extends Entity\DataManager
{


    public static function getTableName()
    {
        return 'ng_catalog_book';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('UF_NAME_CATALOG', array(
                'required' => true,
            )),

            (new OneToMany('BOOKS', BookTable::class, 'CATALOG_TABLE_NG'))
        );
    }


}
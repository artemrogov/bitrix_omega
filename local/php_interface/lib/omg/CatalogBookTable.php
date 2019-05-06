<?php


namespace Omg;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;

class CatalogBookTable extends Entity\DataManager
{

    /**
     * @return string
     */
    public static function getTableName()
    {
        return 'ng_catalog_book';
    }

    /**
     * @return array
     * @throws \Bitrix\Main\SystemException
     */
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
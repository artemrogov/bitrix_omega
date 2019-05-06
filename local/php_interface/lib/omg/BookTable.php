<?php

namespace Omg;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

class BookTable extends Entity\DataManager{

    /**
     * @return string
     */
    public static function getTableName()
    {
        return 'ng_books';
    }

    /**
     * @return string|null
     */
    public static function getUfId()
    {
        return 'NG_BOOKS';
    }

    /**
     * @return \Bitrix\Main\ORM\Objectify\EntityObject|string
     */
    public static function getObjectClass()
    {
        return parent::getObjectClass(); // TODO: Change the autogenerated stub
    }

    /**
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('UF_AUTHOR', array(
                'required' => true,
            )),
            new Entity\StringField('UF_BOOK_NAME'),
            new Entity\IntegerField('UF_CATALOG_ID'),

            (new Reference(
                'CATALOG_TABLE_NG',
                CatalogBookTable::class,
                Join::on('this.UF_CATALOG_ID', 'ref.ID')
            ))
                ->configureJoinType('inner')


        );
    }


}
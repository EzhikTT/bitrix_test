<?php
namespace TestModule;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class TestTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> NAME string(256) optional
 * <li> AGE int optional
 * </ul>
 *
 * @package Bitrix\Test
 **/

class TestTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_test';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('TEST_ENTITY_ID_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateName'),
                'title' => Loc::getMessage('TEST_ENTITY_NAME_FIELD'),
            ),
            'AGE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('TEST_ENTITY_AGE_FIELD'),
            ),
        );
    }
    /**
     * Returns validators for NAME field.
     *
     * @return array
     */
    public static function validateName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 256),
        );
    }
}
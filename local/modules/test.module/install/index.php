<?

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class test_module extends \CModule
{
    var $MODULE_ID = "test.module";

    var $MODULE_NAME = 'Тестовый модуль';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_DESCRIPTION = 'Тестовый модуль';
    var $PARTNER_NAME;
    var $PARTNER_URI;

    function __construct()
    {
        $arModuleVersion = [];

        include(__DIR__ . "/version.php");

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
    }

    function DoInstall()
    {
        $this->InstallDB();

        RegisterModule("test.module");
        CopyDirFiles(__DIR__ . "/admin", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin");
    }

    function DoUninstall()
    {
        $this->UnInstallDB();

        DeleteDirFiles(__DIR__ . "/admin", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin");
        UnRegisterModule("test.module");
    }

    function InstallDB()
    {
        return true;
    }

    function UnInstallDB()
    {
        return true;
    }
}
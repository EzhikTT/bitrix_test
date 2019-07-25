<?
// подключим все необходимые файлы:
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php"); // первый общий пролог
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/modules/test.module/include.php"); // инициализация модуля

use \Bitrix\Test\TestTable;

// подключим языковой файл
IncludeModuleLangFile(__FILE__);

// здесь будет вся серверная обработка и подготовка данных
$data = \Bitrix\TestModule\TestTable::getList([
    'select' => '*'
])->fetchAll();

$lAdmin = new CAdminList($sTableID, $oSort);

$lAdmin->AddHeaders([
    [
        "id" => "ID",
        "content" => "ID",
        "sort" => "id",
        "default" => true
    ],
    [
        "id" => "NAME",
        "content" => "NAME",
        "sort" => "name",
        "default" => true
    ],
    [
        "id" => "AGE",
        "content" => "AGE",
        "sort" => "age",
        "default" => true
    ]
]);

foreach($data as $item){
    $row = &$lAdmin->AddRow($f_ID, $item);
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог

// здесь будет вывод страницы
$lAdmin->DisplayList();

?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php"); ?>
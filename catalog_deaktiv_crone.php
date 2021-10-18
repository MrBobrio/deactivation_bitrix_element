<?
// Вешаем на крон по 10 товаров за раз
// Добавить в /bitrix/php_interface/init.php
function deactiveCatalog()
{
require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php" );

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");

$iblock = 7;
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
$arFilter = Array("IBLOCK_ID"=>$iblock, "ACTIVE_DATE"=>"Y","SECTION_ID"=>array(23,84), "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
//$i;
while($ob = $res->GetNextElement())
{
//$i++;
$el = new CIBlockElement;
$ElementArray = Array("ACTIVE" => "N",);
$arFields = $ob->GetFields();
$el->Update($arFields['ID'], $ElementArray);
}
    return 'deactiveCatalog();';
}
?>
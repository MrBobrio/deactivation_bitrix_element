<?
require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php" );

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");

$iblock = 7; // ID инфоблока
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
$arFilter = Array("IBLOCK_ID"=>$iblock, "ACTIVE_DATE"=>"Y","SECTION_ID"=>array(23,84), "ACTIVE"=>"Y");  // Выделим разделы с которыми работаем
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);  // По 10 товаров (Array(), $arFilter, false, array(), $arSelect)
$i;
while($ob = $res->GetNextElement())
{
$i++;
$el = new CIBlockElement;
$ElementArray = Array("ACTIVE" => "N",);
$arFields = $ob->GetFields();
$el->Update($arFields['ID'], $ElementArray);
}
echo "отключено элементов: ".$i;
?>
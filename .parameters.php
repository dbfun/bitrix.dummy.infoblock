<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock")) return;

// получение списка инфоблоков
$arIBlocks=Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch()) { $arIBlocks[$arRes["ID"]] = $arRes["NAME"]; }


// получение списка разделов
$arListSections = array();
if(isset($arCurrentValues["IBLOCK_ID"]) && intval($arCurrentValues["IBLOCK_ID"])>0)
{
  $arFilter = Array(
    'IBLOCK_ID' => intval($arCurrentValues["IBLOCK_ID"]),
    'GLOBAL_ACTIVE'=>'Y',
    'IBLOCK_ACTIVE'=>'Y',
  );

  $arSec = CIBlockSection::GetList(Array('LEFT_MARGIN'=>'ASC'), $arFilter, false, array("ID", "DEPTH_LEVEL", "NAME"));
  while($arRes = $arSec->Fetch())
    $arListSections[$arRes['ID']] = str_repeat(".", $arRes['DEPTH_LEVEL']).$arRes['NAME'];
}

// параметры модуля для админки
$arComponentParameters = array(
  "GROUPS" => array(
  ),
  "PARAMETERS" => array(
    "DUMMY_TEXT" => Array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("DUMMY_TEXT"),
      "TYPE" => "STRING",
      "DEFAULT" => "Пример текста",
      "COLS" => "60"
    ),
    "IBLOCK_ID" => Array(
      "PARENT" => "DATA_SOURCE",
      "NAME" => GetMessage("BLOCK_ID"),
      "TYPE" => "LIST",
      "VALUES" => $arIBlocks,
      "DEFAULT" => '={$_REQUEST["ID"]}',
      "ADDITIONAL_VALUES" => "Y",
      "REFRESH" => "Y",
    ),
    "SECTION_ID" => array(
      "PARENT" => "DATA_SOURCE",
      "NAME" => GetMessage("SECTION_ID"),
      "TYPE" => "LIST",
      "ADDITIONAL_VALUES" => "Y",
      "VALUES" => $arListSections,
      "REFRESH" => "Y",
      "DEFAULT" => "",
    ),
    "ELEMENT_ID" => array(
      "PARENT" => "DATA_SOURCE",
      "NAME" => GetMessage("ELEMENT_ID"),
      "TYPE" => "STRING",
      "DEFAULT" => '={$_REQUEST["ELEMENT_ID"]}',
    ),
  ),
);
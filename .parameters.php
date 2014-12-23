<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock")) return;

// получение списка инфоблоков
$arIBlocks=Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch()) { $arIBlocks[$arRes["ID"]] = $arRes["NAME"]; }

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
    "ELEMENT_ID" => array(
      "PARENT" => "DATA_SOURCE",
      "NAME" => GetMessage("ELEMENT_ID"),
      "TYPE" => "STRING",
      "DEFAULT" => '={$_REQUEST["ELEMENT_ID"]}',
    ),
  ),
);
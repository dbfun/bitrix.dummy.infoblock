<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
require_once('BADummyInfoblock.php');
$engine = new BADummyInfoblock($arParams);
$arResult = $engine->execute();
$this->IncludeComponentTemplate();
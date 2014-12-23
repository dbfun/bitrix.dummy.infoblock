<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("ENGINE_NAME"),
	"DESCRIPTION" => GetMessage("ENGINE_DESC"),
	"ICON" => "/images/subscr_click.gif",
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "iblock",
			"NAME" => GetMessage("ENGINE_SERVICE")
		)
	),
);
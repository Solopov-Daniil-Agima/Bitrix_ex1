<?php
/**
 * Created by PhpStorm
 * User: Sergey Pokoev
 * www.pokoev.ru
 * @ Покоев Сергей 2016
 *
 * файл init.php
 */
use \Bitrix\Main;

$eventManager = Main\EventManager::getInstance();
$eventManager -> addEventHandlerCompatible("main","OnEndBufferContent", array("PagesViewed","Collection"));


class PagesViewed
{
    function Collection($content)
    {
        global $APPLICATION;
        $iblockId = 7;
        $i = 0;

        $urlString = Main\Application::getInstance()->getContext()->getRequest()->getRequestUri();
        $url = new Main\Web\Uri($urlString);

        if(Main\Loader::includeModule("iblock"))
        {
            $arFilter = array(
                "IBLOCK_ID" => $iblockId,
                "PROPERTY_USER" => CUser::GetID(),
                "PROPERTY_URL" => $url->getPath()
            );

            if(!CIBlockElement::GetList(false, $arFilter, array(), false, false))
            {
                $el = new CIBlockElement;

                $arLoadProductArray = array(
                    "MODIFIED_BY" => CUser::GetID(),
                    "IBLOCK_SECTION_ID" => false,
                    "IBLOCK_ID" => $iblockId,
                    "PROPERTY_VALUES" => array(
                        "url" => $url->getPath(),
                        "user" => CUser::GetID()
                    ),
                    "NAME" => $APPLICATION->GetTitle()
                );
                $el->Add($arLoadProductArray);

                //Очистка старых записей
                $arSelect = array("ID");
                $arFilter = array(
                    "IBLOCK_ID" => $iblockId,
                    "PROPERTY_USER" => CUser::GetID()
                );

                $res = CIBlockElement::GetList(array('created' => 'desc'), $arFilter, false, false, $arSelect);
                while ($ar_fields = $res->GetNext())
                {
                    $i++;
                    if($i > 3)
                        CIBlockElement::Delete($ar_fields['ID']);
                }
            }
        }
    }
}
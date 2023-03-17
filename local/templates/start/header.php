<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$bIsMainPage = $APPLICATION->GetCurPage(false) == SITE_DIR;
?>
<!DOCTYPE html>
<!--[if lt IE 8]>  <html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]>  <html class="no-js"><![endif]-->
<head>

    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
	<?$APPLICATION->ShowTitle();?></title>
    <?$APPLICATION->ShowHead();?>
    <?$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH."/css/common-styles.css")?>

    <link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/ico/favicon_bx.png">

    <!--[if lt IE 9]>
    <script src=<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/js/vendor/modernizr-html5shiv-respond.min.js")?>></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src=<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/js/vendor/modernizr.min.js")?>></script>
    <!--<![endif]-->
<?
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/vendor/jquery.min.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/vendor/bootstrap/collapse.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/vendor/bootstrap/tooltip.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/vendor/plugins.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/vendor/jquery.touchSwipe.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/vendor/jquery.ba-throttle-debounce.min.js");
?>
</head>
<body>
<!--[if lt IE 8]>
<p class="chromeframe">Вы используете <strong>устаревший </strong> браузер. Пожалуйста <a
        href="http://browsehappy.com/">
    обновите свой браузер</a> или <a href="http://www.google.com/chromeframe/?redirect=true">установите Google Chrome
    Frame</a> чтобы улучшить взаимодействие с сайтом.</p>
<![endif]-->
<?$APPLICATION->ShowPanel();?>
<div class="sticky-wrap">
    <header>
        <div class="header-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <?php if($bIsMainPage):?>
                        <span class="logo">
                        <?else:?>
                        <a class="logo" href="/">
                        <?endif;?>
                            <div class="image">Intervolga.ru</div>
                            <div id="slogan-rand" class="slogan">
                                <noscript>Сайты и реклама в интернете</noscript>
                            </div>
                        <?php if($bIsMainPage):?>
                        </span>
                        <?else:?>
                        </a>
                        <?endif;?>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-lg-7 col-xs-12 hidden-xs">
                                <ul class="btn-list-inline">
                                    <?$APPLICATION->IncludeFile(
                                        SITE_DIR."/include2/slogan.php",
                                        array(),
                                        array(
                                            "MODE" => "text"
                                        )
                                    );?>
                                </ul>
                            </div>
                            <?$APPLICATION->IncludeComponent("bitrix:search.form", "poisk", Array(
                                "PAGE" => "#SITE_DIR#poisk/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                                "USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
                                "COMPONENT_TEMPLATE" => ".default"
                            ),
                                false
                            );?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <ul class="phone-list">
                            <li><?$APPLICATION->IncludeFile(
                                    SITE_DIR."/include2/phone1.php",
                                    array(),
                                    array(
                                        "MODE" => "html"
                                    )
                                );?>
                            </li>
                            <li><?$APPLICATION->IncludeFile(
                                    SITE_DIR."/include2/phone2.php",
                                    array(),
                                    array(
                                        "MODE" => "html"
                                    )
                                );?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "top",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "test",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "menu"
	),
	false
);?>
    <?if($bIsMainPage):?>
        <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "index",
        array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "N",
        "COMPONENT_TEMPLATE" => "index",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
        0 => "NAME",
        1 => "PREVIEW_TEXT",
        2 => "PREVIEW_PICTURE",
        3 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "4",
        "IBLOCK_TYPE" => "index",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "100",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
        0 => "url",
        1 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "TIMESTAMP_X",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "DESC",
        "STRICT_SECTION_CHECK" => "N"
        ),
        false
        );?>

        <?$APPLICATION->IncludeComponent(
            "smt:pages.viewed",
            "",
            Array(
                "IBLOCKS" => array("7"),
                "IBLOCK_TYPE" => "pages_viewed"
            )
        );?>

        <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news", 
	array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/novosti-kompanii/#ID#/",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DATE_ACTIVE_FROM",
			4 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "news"
	),
	false
);?>

    <?endif;?>
    <?if(ERROR_404 =="Y"):?>
    <div class="page-not-found">
    <?else:?>
    <div class="container">
        <?if(!$bIsMainPage):?>
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
            ),
                false
            );?>
        <?endif;?>
        <h1><?$APPLICATION->ShowTitle(false);?></h1>
    </div>
    <?endif;?>
    <div class="container">
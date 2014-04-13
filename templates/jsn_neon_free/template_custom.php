<?php
$jsnutils = JSNTplUtils::getInstance();
$doc = $this->_document;
$doc->hasRight			= $doc->countModules('right');
$doc->hasLeft			= $doc->countModules('left');
$doc->hasPromo			= $doc->countModules('promo');
$doc->hasPromoLeft		= $doc->countModules('promo-left');
$doc->hasPromoRight		= $doc->countModules('promo-right');
$doc->hasInnerLeft		= $doc->countModules('innerleft');
$doc->hasInnerRight		= $doc->countModules('innerright');

$doc->columnPromoLeft	= $doc->params->get('columnPromoLeft', 50);
$doc->columnPromoRight	= $doc->params->get('columnPromoRight', 50);
$doc->columnLeft		= $doc->params->get('columnLeft', 23);
$doc->columnRight		= $doc->params->get('columnRight', 23);
$doc->columnInnerleft	= $doc->params->get('columnInnerleft', 28);
$doc->columnInnerright	= $doc->params->get('columnInnerright', 28);
$doc->templateColors	= array('blue', 'red', 'green', 'violet', 'pink', 'grey');

if (isset($doc->sitetoolsColorsItems)) {
	$this->_document->templateColors = $doc->sitetoolsColorsItems;
}

// apply K2 style
if ($jsnutils->checkK2()) {
	$doc->addStylesheet($doc->templateUrl . "/ext/k2/jsn_ext_k2.css");
}

$tw				= 100;
$ieOffset		= 0;

$customCss = '
	#jsn-header-top,
	#jsn-header-bottom-inner,
	#jsn-content,
	#jsn-content-top-over,
	#jsn-promo-inner,
	#jsn-content-top,
	#jsn-pos-promo_inner,
	#jsn-content-bottom-inner,
	#jsn-footer-inner {
		width: ' . $doc->templateWidth . ';
	}
	#jsn-pos-promo-left {
		float: left;
		width: ' . $doc->columnPromoLeft . '%;
	}
	#jsn-pos-promo {
		width: ' . ($tw - $ieOffset) . '%;
	}
	#jsn-pos-promo-right {
		float: right;
		width: ' . $doc->columnPromoRight . '%;
	}
';

if (!$doc->hasPromoLeft) {
	$customCss .= '
		#jsn-pos-promo-right { width: 100%;	}
	';
}

if (!$doc->hasPromoRight) {
	$customCss .= '
		#jsn-pos-promo-left { width: 100%; }
	';
}

// Setup width of content area
$tw = 100;
if ($doc->hasLeft) {
	$tw -= $doc->columnLeft;
	$customCss .= '
		#jsn-maincontent { right: '.(100 - $doc->columnLeft).'%; }
		#jsn-maincontent_inner { left: '.(100 - $doc->columnLeft).'%; }
	';
}

if ($doc->hasRight) {
	$tw -= $doc->columnRight;
	$customCss .= '
		#jsn-content_inner2 { left: ' . (100 - $doc->columnRight) . '%; }
		#jsn-content_inner3 { right: ' . (100 - $doc->columnRight) . '%; }
	';
}

$customCss .= '
	#jsn-leftsidecontent {
		float: left;
		width: ' . $doc->columnLeft . '%;
		left: -' . ($tw - $ieOffset) . '%;
	}
	#jsn-maincontent {
		float: left;
		width: ' . ($tw - $ieOffset) . '%;
		left: ' . ($doc->hasLeft ? $doc->columnLeft . '%' : 0) . ';
	}
	#jsn-rightsidecontent {
		float: right;
		width: ' . $doc->columnRight . '%;
	}
';

$tw = 100;
if ($doc->hasInnerLeft)
	$tw -= $doc->columnInnerleft;

if ($doc->hasInnerRight)
	$tw -= $doc->columnInnerright;

$customCss .= '
	#jsn-pos-innerleft {
		float: left;
		width: ' . $doc->columnInnerleft . '%;
		left: -' . ($tw - $ieOffset) . '%;
	}
	#mainbody-content-inner {
		float: left;
		width: ' . ($tw - $ieOffset) . '%;
		left: '.($doc->hasInnerLeft ? $doc->columnInnerleft . '%' : 0) . ';
	}
	#jsn-pos-innerright {
		float: right;
		width: ' . $doc->columnInnerright . '%;
	}
';

$doc->addStyleDeclaration($customCss);

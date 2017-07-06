<?php
$wpdb->query("DROP TABLE IF EXISTS {$table_prefix}layerslider");
$wpdb->query("CREATE TABLE {$table_prefix}layerslider (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `data` mediumtext NOT NULL,
  `date_c` int(10) NOT NULL,
  `date_m` int(11) NOT NULL,
  `flag_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `flag_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");

$wpdb->insert(
	$wpdb->prefix.'layerslider',
	array(
		'id' => 1,
		'author' => 1,
		'name' => 'homepage',
		'slug' => '',
		'data' => '{"properties":{"title":"homepage","slug":"","width":"100%","height":"725px","responsive":true,"maxwidth":"","responsiveunder":"1300","sublayercontainer":"1300","hideunder":"0","hideover":"100000","autostart":true,"startinviewport":true,"pauseonhover":true,"firstlayer":"1","animatefirstlayer":true,"keybnav":true,"touchnav":true,"loops":"0","forceloopnum":true,"skin":"v5","backgroundcolor":"","backgroundimageId":"","backgroundimage":"","sliderfadeinduration":"350","sliderstyle":"margin-bottom: 0px;","thumb_nav":"hover","thumb_container_width":"60%","thumb_width":"100","thumb_height":"60","thumb_active_opacity":"35","thumb_inactive_opacity":"100","autopauseslideshow":"auto","youtubepreview":"maxresdefault.jpg","yourlogoId":"","yourlogo":"","yourlogostyle":"left: -10px; top: -10px;","yourlogolink":"","yourlogotarget":"_self","forceresponsive":true,"navprevnext":false},"layers":[{"properties":{"post_offset":"-1","3d_transitions":"","2d_transitions":"","custom_3d_transitions":"","custom_2d_transitions":"","backgroundId":49,"background":"http:\\/\\/themes.themicrolex.com\\/fundingpressWP\\/wp-content\\/uploads\\/2016\\/09\\/bg.jpg","thumbnailId":"","thumbnail":"","slidedelay":"4000","timeshift":"0","layer_link":"","layer_link_target":"_self","id":"","deeplink":"","skip":false,"backgroundThumb":"http:\\/\\/themes.themicrolex.com\\/fundingpressWP\\/wp-content\\/uploads\\/2016\\/09\\/bg-150x150.jpg"},"sublayers":[{"subtitle":"Layer #1","transition":"{\\"offsetxin\\":\\"80\\",\\"offsetyin\\":\\"0\\",\\"durationin\\":\\"1000\\",\\"delayin\\":\\"0\\",\\"easingin\\":\\"easeInOutQuint\\",\\"fadein\\":true,\\"rotatein\\":\\"0\\",\\"rotatexin\\":\\"0\\",\\"rotateyin\\":\\"0\\",\\"transformoriginin\\":\\"50% 50% 0\\",\\"skewxin\\":\\"0\\",\\"skewyin\\":\\"0\\",\\"scalexin\\":\\"1\\",\\"scaleyin\\":\\"1\\",\\"offsetxout\\":\\"-80\\",\\"offsetyout\\":\\"0\\",\\"durationout\\":\\"400\\",\\"showuntil\\":\\"0\\",\\"easingout\\":\\"easeInOutQuint\\",\\"fadeout\\":true,\\"rotateout\\":\\"0\\",\\"rotatexout\\":\\"0\\",\\"rotateyout\\":\\"0\\",\\"transformoriginout\\":\\"50% 50% 0\\",\\"skewxout\\":\\"0\\",\\"skewyout\\":\\"0\\",\\"scalexout\\":\\"1\\",\\"scaleyout\\":\\"1\\",\\"parallaxlevel\\":\\"0\\"}","styles":"{\\"width\\":\\"\\",\\"height\\":\\"\\",\\"padding-top\\":\\"\\",\\"padding-right\\":\\"\\",\\"padding-bottom\\":\\"\\",\\"padding-left\\":\\"\\",\\"border-top\\":\\"\\",\\"border-right\\":\\"\\",\\"border-bottom\\":\\"\\",\\"border-left\\":\\"\\",\\"font-family\\":\\"\\",\\"font-size\\":\\"\\",\\"line-height\\":\\"\\",\\"color\\":\\"\\",\\"background\\":\\"\\",\\"border-radius\\":\\"\\"}","media":"img","type":"p","imageId":"","image":"","html":"","post_text_length":"","url":"","target":"_self","id":"","class":"","title":"","alt":"","rel":"","top":"0px","left":"0px","wordwrap":false,"style":""},{"subtitle":"main title","transition":"{\\"offsetxin\\":\\"80\\",\\"offsetyin\\":\\"0\\",\\"durationin\\":\\"1000\\",\\"delayin\\":\\"0\\",\\"easingin\\":\\"easeInOutQuint\\",\\"fadein\\":true,\\"rotatein\\":\\"0\\",\\"rotatexin\\":\\"0\\",\\"rotateyin\\":\\"0\\",\\"transformoriginin\\":\\"50% 50% 0\\",\\"skewxin\\":\\"0\\",\\"skewyin\\":\\"0\\",\\"scalexin\\":\\"1\\",\\"scaleyin\\":\\"1\\",\\"offsetxout\\":\\"-80\\",\\"offsetyout\\":\\"0\\",\\"durationout\\":\\"400\\",\\"showuntil\\":\\"0\\",\\"easingout\\":\\"easeInOutQuint\\",\\"fadeout\\":true,\\"rotateout\\":\\"0\\",\\"rotatexout\\":\\"0\\",\\"rotateyout\\":\\"0\\",\\"transformoriginout\\":\\"50% 50% 0\\",\\"skewxout\\":\\"0\\",\\"skewyout\\":\\"0\\",\\"scalexout\\":\\"1\\",\\"scaleyout\\":\\"1\\",\\"parallaxlevel\\":\\"0\\"}","styles":"{\\"width\\":\\"\\",\\"height\\":\\"\\",\\"padding-top\\":\\"15px\\",\\"padding-right\\":\\"15px\\",\\"padding-bottom\\":\\"15px\\",\\"padding-left\\":\\"15px\\",\\"border-top\\":\\"\\",\\"border-right\\":\\"\\",\\"border-bottom\\":\\"\\",\\"border-left\\":\\"\\",\\"font-family\\":\\"\\",\\"font-size\\":\\"55px\\",\\"line-height\\":\\"\\",\\"color\\":\\"#ffffff\\",\\"background\\":\\"\\",\\"border-radius\\":\\"\\"}","media":"text","type":"h1","imageId":"","image":"","html":"The Crowdfunding Theme For Wordpress","post_text_length":"","url":"","target":"_self","id":"","class":"","title":"","alt":"","rel":"","top":"273px","left":"45px","wordwrap":false,"style":"    text-transform: capitalize;"},{"subtitle":"main title copy","transition":"{\\"offsetxin\\":\\"80\\",\\"offsetyin\\":\\"0\\",\\"durationin\\":\\"1000\\",\\"delayin\\":\\"0\\",\\"easingin\\":\\"easeInOutQuint\\",\\"fadein\\":true,\\"rotatein\\":\\"0\\",\\"rotatexin\\":\\"0\\",\\"rotateyin\\":\\"0\\",\\"transformoriginin\\":\\"50% 50% 0\\",\\"skewxin\\":\\"0\\",\\"skewyin\\":\\"0\\",\\"scalexin\\":\\"1\\",\\"scaleyin\\":\\"1\\",\\"offsetxout\\":\\"-80\\",\\"offsetyout\\":\\"0\\",\\"durationout\\":\\"400\\",\\"showuntil\\":\\"0\\",\\"easingout\\":\\"easeInOutQuint\\",\\"fadeout\\":true,\\"rotateout\\":\\"0\\",\\"rotatexout\\":\\"0\\",\\"rotateyout\\":\\"0\\",\\"transformoriginout\\":\\"50% 50% 0\\",\\"skewxout\\":\\"0\\",\\"skewyout\\":\\"0\\",\\"scalexout\\":\\"1\\",\\"scaleyout\\":\\"1\\",\\"parallaxlevel\\":\\"0\\"}","styles":"{\\"width\\":\\"\\",\\"height\\":\\"\\",\\"padding-top\\":\\"15px\\",\\"padding-right\\":\\"15px\\",\\"padding-bottom\\":\\"15px\\",\\"padding-left\\":\\"15px\\",\\"border-top\\":\\"\\",\\"border-right\\":\\"\\",\\"border-bottom\\":\\"\\",\\"border-left\\":\\"\\",\\"font-family\\":\\"\\",\\"font-size\\":\\"24px\\",\\"line-height\\":\\"\\",\\"color\\":\\"#ffffff\\",\\"background\\":\\"\\",\\"border-radius\\":\\"\\"}","media":"text","type":"h2","imageId":"","image":"","html":"Watch your dream become reality","post_text_length":"","url":"","target":"_self","id":"","class":"","title":"","alt":"","rel":"","top":"351px","left":"59px","wordwrap":false,"style":"    text-transform: capitalize; font-weight:normal;"},{"subtitle":"Layer #4","transition":"{\\"offsetxin\\":\\"80\\",\\"offsetyin\\":\\"0\\",\\"durationin\\":\\"1000\\",\\"delayin\\":\\"0\\",\\"easingin\\":\\"easeInOutQuint\\",\\"fadein\\":true,\\"rotatein\\":\\"0\\",\\"rotatexin\\":\\"0\\",\\"rotateyin\\":\\"0\\",\\"transformoriginin\\":\\"50% 50% 0\\",\\"skewxin\\":\\"0\\",\\"skewyin\\":\\"0\\",\\"scalexin\\":\\"1\\",\\"scaleyin\\":\\"1\\",\\"offsetxout\\":\\"-80\\",\\"offsetyout\\":\\"0\\",\\"durationout\\":\\"400\\",\\"showuntil\\":\\"0\\",\\"easingout\\":\\"easeInOutQuint\\",\\"fadeout\\":true,\\"rotateout\\":\\"0\\",\\"rotatexout\\":\\"0\\",\\"rotateyout\\":\\"0\\",\\"transformoriginout\\":\\"50% 50% 0\\",\\"skewxout\\":\\"0\\",\\"skewyout\\":\\"0\\",\\"scalexout\\":\\"1\\",\\"scaleyout\\":\\"1\\",\\"parallaxlevel\\":\\"0\\"}","styles":"{\\"width\\":\\"\\",\\"height\\":\\"\\",\\"padding-top\\":\\"15px\\",\\"padding-right\\":\\"40px\\",\\"padding-bottom\\":\\"15px \\",\\"padding-left\\":\\"40px\\",\\"border-top\\":\\"\\",\\"border-right\\":\\"\\",\\"border-bottom\\":\\"\\",\\"border-left\\":\\"\\",\\"font-family\\":\\"\\",\\"font-size\\":\\"14px\\",\\"line-height\\":\\"\\",\\"color\\":\\"\\",\\"background\\":\\"\\",\\"border-radius\\":\\"\\"}","media":"text","type":"p","imageId":"","image":"","html":"<i style=\\"margin-right:5px\\" class=\\"fa fa-shopping-cart\\" aria-hidden=\\"true\\"><\\/i> Purchase","post_text_length":"","url":"https:\\/\\/themeforest.net\\/item\\/fundingpress-the-crowdfunding-wordpress-theme\\/4371069?ref=Skywarrior","target":"_blank","id":"","class":"button-medium","title":"","alt":"","rel":"","top":"420px","left":"72px","wordwrap":false,"style":"text-shadow: rgba(0, 0, 0, 0.498039) 0px 0px 5px;"},{"subtitle":"Layer #4 copy","transition":"{\\"offsetxin\\":\\"80\\",\\"offsetyin\\":\\"0\\",\\"durationin\\":\\"1000\\",\\"delayin\\":\\"0\\",\\"easingin\\":\\"easeInOutQuint\\",\\"fadein\\":true,\\"rotatein\\":\\"0\\",\\"rotatexin\\":\\"0\\",\\"rotateyin\\":\\"0\\",\\"transformoriginin\\":\\"50% 50% 0\\",\\"skewxin\\":\\"0\\",\\"skewyin\\":\\"0\\",\\"scalexin\\":\\"1\\",\\"scaleyin\\":\\"1\\",\\"offsetxout\\":\\"-80\\",\\"offsetyout\\":\\"0\\",\\"durationout\\":\\"400\\",\\"showuntil\\":\\"0\\",\\"easingout\\":\\"easeInOutQuint\\",\\"fadeout\\":true,\\"rotateout\\":\\"0\\",\\"rotatexout\\":\\"0\\",\\"rotateyout\\":\\"0\\",\\"transformoriginout\\":\\"50% 50% 0\\",\\"skewxout\\":\\"0\\",\\"skewyout\\":\\"0\\",\\"scalexout\\":\\"1\\",\\"scaleyout\\":\\"1\\",\\"parallaxlevel\\":\\"0\\"}","styles":"{\\"width\\":\\"\\",\\"height\\":\\"\\",\\"padding-top\\":\\"15px\\",\\"padding-right\\":\\"40px\\",\\"padding-bottom\\":\\"15px \\",\\"padding-left\\":\\"40px\\",\\"border-top\\":\\"\\",\\"border-right\\":\\"\\",\\"border-bottom\\":\\"\\",\\"border-left\\":\\"\\",\\"font-family\\":\\"\\",\\"font-size\\":\\"14px\\",\\"line-height\\":\\"\\",\\"color\\":\\"#333333\\",\\"background\\":\\"#e7e7e7\\",\\"border-radius\\":\\"\\"}","media":"text","type":"p","imageId":"","image":"","html":"<i style=\\"margin-right:5px\\" class=\\"fa fa-info-circle\\" aria-hidden=\\"true\\"><\\/i> see more","post_text_length":"","url":"https:\\/\\/themeforest.net\\/item\\/fundingpress-the-crowdfunding-wordpress-theme\\/4371069?ref=Skywarrior","target":"_blank","id":"","class":"button-medium","title":"","alt":"","rel":"","top":"420px","left":"256px","wordwrap":false,"style":"text-shadow: rgba(0, 0, 0, 0) 0px 0px 5px;"}]}]}',
		'date_c' => 1472739210,
		'date_m' => 1472810360,
		'flag_hidden' => 0,
		'flag_deleted' => 0
	)
);

$wpdb->insert(
	$wpdb->prefix.'layerslider',
	array(
		'id' => 2,
		'author' => 1,
		'name' => 'contact',
		'slug' => '',
		'data' => '{"properties":{"title":"contact","new":true},"layers":[[]]}',
		'date_c' => 1473237157,
		'date_m' => 1473237157,
		'flag_hidden' => 0,
		'flag_deleted' => 0
	)
);

$wpdb->insert(
	$wpdb->prefix.'layerslider',
	array(
		'id' => 3,
		'author' => 1,
		'name' => 'contact',
		'slug' => '',
		'data' => '{"properties":{"title":"contact","slug":"","width":"100%","height":"900px","responsive":true,"maxwidth":"","responsiveunder":"1300","sublayercontainer":"0","hideunder":"0","hideover":"100000","autostart":true,"startinviewport":true,"pauseonhover":true,"firstlayer":"1","animatefirstlayer":true,"keybnav":true,"touchnav":true,"loops":"0","forceloopnum":true,"skin":"v5","backgroundcolor":"","backgroundimageId":"","backgroundimage":"","sliderfadeinduration":"350","sliderstyle":"margin-bottom: 0px;","thumb_nav":"hover","thumb_container_width":"60%","thumb_width":"100","thumb_height":"60","thumb_active_opacity":"35","thumb_inactive_opacity":"100","autopauseslideshow":"auto","youtubepreview":"maxresdefault.jpg","yourlogoId":"","yourlogo":"","yourlogostyle":"left: -10px; top: -10px;","yourlogolink":"","yourlogotarget":"_self","forceresponsive":true},"layers":[{"properties":{"post_offset":"-1","3d_transitions":"","2d_transitions":"","custom_3d_transitions":"","custom_2d_transitions":"","backgroundId":2930,"background":"http:\\/\\/themes.themicrolex.com\\/fundingpressWP\\/wp-content\\/uploads\\/2016\\/09\\/cpbg.jpg","thumbnailId":"","thumbnail":"","slidedelay":"4000","timeshift":"0","layer_link":"","layer_link_target":"_self","id":"","deeplink":"","skip":false,"backgroundThumb":"http:\\/\\/themes.themicrolex.com\\/fundingpressWP\\/wp-content\\/uploads\\/2016\\/09\\/cpbg.jpg"},"sublayers":[{"subtitle":"Layer #1","transition":"{\\"offsetxin\\":\\"0\\",\\"offsetyin\\":\\"-80\\",\\"durationin\\":\\"1000\\",\\"delayin\\":\\"0\\",\\"easingin\\":\\"easeInOutQuint\\",\\"fadein\\":true,\\"rotatein\\":\\"0\\",\\"rotatexin\\":\\"0\\",\\"rotateyin\\":\\"0\\",\\"transformoriginin\\":\\"50% 50% 0\\",\\"skewxin\\":\\"0\\",\\"skewyin\\":\\"0\\",\\"scalexin\\":\\"1\\",\\"scaleyin\\":\\"1\\",\\"offsetxout\\":\\"-80\\",\\"offsetyout\\":\\"0\\",\\"durationout\\":\\"400\\",\\"showuntil\\":\\"0\\",\\"easingout\\":\\"easeInOutQuint\\",\\"fadeout\\":true,\\"rotateout\\":\\"0\\",\\"rotatexout\\":\\"0\\",\\"rotateyout\\":\\"0\\",\\"transformoriginout\\":\\"50% 50% 0\\",\\"skewxout\\":\\"0\\",\\"skewyout\\":\\"0\\",\\"scalexout\\":\\"1\\",\\"scaleyout\\":\\"1\\",\\"parallaxlevel\\":\\"5\\"}","styles":"{\\"width\\":\\"\\",\\"height\\":\\"\\",\\"padding-top\\":\\"\\",\\"padding-right\\":\\"\\",\\"padding-bottom\\":\\"\\",\\"padding-left\\":\\"\\",\\"border-top\\":\\"\\",\\"border-right\\":\\"\\",\\"border-bottom\\":\\"\\",\\"border-left\\":\\"\\",\\"font-family\\":\\"\\",\\"font-size\\":\\"150px\\",\\"line-height\\":\\"\\",\\"color\\":\\"#ffffff\\",\\"background\\":\\"\\",\\"border-radius\\":\\"\\"}","media":"text","type":"h1","imageId":"","image":"","html":"drop us a line","post_text_length":"","url":"","target":"_self","id":"","class":"","title":"","alt":"","rel":"","top":"327px","left":"358px","wordwrap":false,"style":""},{"subtitle":"Layer #2","transition":"{\\"offsetxin\\":\\"0\\",\\"offsetyin\\":\\"80\\",\\"durationin\\":\\"1000\\",\\"delayin\\":\\"0\\",\\"easingin\\":\\"easeInOutQuint\\",\\"fadein\\":true,\\"rotatein\\":\\"0\\",\\"rotatexin\\":\\"0\\",\\"rotateyin\\":\\"0\\",\\"transformoriginin\\":\\"50% 50% 0\\",\\"skewxin\\":\\"0\\",\\"skewyin\\":\\"0\\",\\"scalexin\\":\\"1\\",\\"scaleyin\\":\\"1\\",\\"offsetxout\\":\\"-80\\",\\"offsetyout\\":\\"0\\",\\"durationout\\":\\"400\\",\\"showuntil\\":\\"0\\",\\"easingout\\":\\"easeInOutQuint\\",\\"fadeout\\":true,\\"rotateout\\":\\"0\\",\\"rotatexout\\":\\"0\\",\\"rotateyout\\":\\"0\\",\\"transformoriginout\\":\\"50% 50% 0\\",\\"skewxout\\":\\"0\\",\\"skewyout\\":\\"0\\",\\"scalexout\\":\\"1\\",\\"scaleyout\\":\\"1\\",\\"parallaxlevel\\":\\"3\\"}","styles":"{\\"width\\":\\"\\",\\"height\\":\\"\\",\\"padding-top\\":\\"25px\\",\\"padding-right\\":\\"30px\\",\\"padding-bottom\\":\\"25px\\",\\"padding-left\\":\\"30px\\",\\"border-top\\":\\"\\",\\"border-right\\":\\"\\",\\"border-bottom\\":\\"\\",\\"border-left\\":\\"\\",\\"font-family\\":\\"\\",\\"font-size\\":\\"50px\\",\\"line-height\\":\\"\\",\\"color\\":\\"#ffffff\\",\\"background\\":\\"rgba(0, 0, 0, 0.41)\\",\\"border-radius\\":\\"100px\\"}","media":"text","type":"h2","imageId":"","image":"","html":"<i class=\\"fa fa-envelope-o\\" aria-hidden=\\"true\\"><\\/i>","post_text_length":"","url":"","target":"_self","id":"","class":"","title":"","alt":"","rel":"","top":"555px","left":"50%","wordwrap":false,"style":"padding: 25px 30px 25px 30px !important;"}]}]}',
		'date_c' => 1473237158,
		'date_m' => 1473240184,
		'flag_hidden' => 0,
		'flag_deleted' => 0
	)
);

?>
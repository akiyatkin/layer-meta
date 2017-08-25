<?php
use infrajs\event\Event;
use infrajs\controller\Layer;
use infrajs\template\Template;
use infrajs\load\Load;

Event::one('Controller.oninit', function ($layer) {
	Layer::parsedAdd('metasrc');
});

Event::handler('Layer.oncheck', function (&$layer) {
	if (!empty($layer['metasrctpl'])) $layer['metasrc'] = Template::parse([$layer['metasrctpl']], $layer);
	if (empty($layer['metasrc'])) return;
	$layer['meta'] = Load::loadJSON($layer['metasrc']);
}, 'Layer');
Event.one('Controller.oninit', function (layer) {
	Controller.parsedAdd('metasrc');
});

Event.handler('Layer.oncheck', function (layer) {
	if (layer.metasrctpl) layer.metasrc = Template.parse([layer.metasrctpl], layer);
	if (!layer.metasrc) return;
	layer.meta = Load.loadJSON(layer.metasrc);
}, 'Layer');
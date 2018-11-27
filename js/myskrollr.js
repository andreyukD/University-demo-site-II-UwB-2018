window.onload = function() {
	var s = skrollr.init({
		forceHeight: false
	});
	if (s.isMobile()) {
		s.destroy();
	}
}
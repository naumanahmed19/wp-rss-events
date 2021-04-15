jQuery( document ).ready( function($) {
	let loader = $('.rss-event-loader');
	loader.hide();

	$("body").on( 'click', '.btn-rss-event-import', function(e) {
		e.preventDefault();

		let btn = $('.btn-rss-event-import');
		btn.hide();
		loader.show();
	
		$.ajax({
			type: 'post',
			 url : frontend_ajax_object.ajaxurl,
			data: {
				action: 'rss_events_importer',
			},
			success: function( result ) {
				btn.show();
				loader.hide();
			}
		});	
	});
});
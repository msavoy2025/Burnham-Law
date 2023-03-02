import { $document } from '../utils/globals';

$document.on('gform_page_loaded', function(event, form_id, current_page){
	$('.gform_body .gform_page').eq(current_page - 1).find('.gfield input').focus();
});

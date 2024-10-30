jQuery(document).ready(function($) {
	var link = 'edit-comments.php?comment_status=' + pcml_vars.comment_status;
	$('#menu-comments .wp-submenu-wrap ul li').each(function() {
		$this = $(this);
		$this.removeClass('current');
		$('a', $this).removeClass('current');
		if($('a', $this).attr('href') == link) {
			$this.addClass('current');
			$('a', $this).addClass('current');
		}
	});
});
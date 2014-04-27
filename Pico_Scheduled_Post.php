<?php

/**
 * Exclude any futur post from pages listing...
 *
 * @author Sebastien Erard
 * @link http://z720.net/pico/scheduled-post
 * @license http://opensource.org/licenses/MIT
 */
class Pico_Scheduled_Post {

	protected $now;

	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page)
	{
		$this->now = time();
		$pages = array_filter($pages, array($this, 'isPublished'));
	}

	protected function isPublished($page) {
		if(isset($page['date']) && (strtotime($page['date']) - $this->now) > 0) {
			return false;
		}
		return true;
	}
}

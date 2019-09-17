<?php
require_once __DIR__.'/../models/model.php';

class HomeController {
	public function index() {
		$content = getContent(['about us', 'first of all', 'secondly']);
		$podcast = getLatestPodcast();
		$template_engine = get_template_engine();
		echo $template_engine->render('user/homepage', ['podcast' => $podcast, 'content' => $content]);
	}

	public function support() {
		$content = getContent(['let your friends know about hello internet', 'try some of our sponsors', 'support us on patreon', 'buy our merch', 'buy stuff from amazon']);
		$template_engine = get_template_engine();
		echo $template_engine->render('user/support', ['content' => $content]);
	}

	public function patreons() {
		$patreons = getPatreons();
		$template_engine = get_template_engine();
		echo $template_engine->render('user/patreons', ['patreons' => $patreons]);
	}

	public function archive() {
		if (isset($_GET['q']) && !empty($_GET['q'])) $podcasts = searchPodcasts($_GET['q']);
		else $podcasts = getAllPodcasts();
		$template_engine = get_template_engine();
		echo $template_engine->render('user/archive', ['podcasts' => $podcasts]);
	}

	public function podcast($id) {
		$podcast = getPodcast($id);
		$sponsors = getSponsors($podcast['sponsors']);
		$notes = getNotes($podcast['notes']);

		if (!$sponsors) $sponsors = [['link' => '', 'text' => 'No sponsors']];
		if (!$notes) $notes = [['link' => '', 'text' => 'No notes']];

		$template_engine = get_template_engine();
		echo $template_engine->render('user/podcast', ['podcast' => $podcast, 'sponsors' => $sponsors, 'notes' => $notes]);
	}
}
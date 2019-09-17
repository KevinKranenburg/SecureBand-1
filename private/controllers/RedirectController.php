<?php
class RedirectController {
	public function itunes() {
		header("Location: https://podcasts.apple.com/us/podcast/hello-internet/id811377230");
	}

	public function admin() {
		header("Location: /public/admin/");
	}
}
<?php
require_once __DIR__.'/../models/model.php';
if (session_status() == PHP_SESSION_NONE) session_start();

class AdminController {
	public $error = ["", false];

	public function index() {
		if (!loggedIn()) {
			header("Location: /public/admin/login");
			exit;
		}
		$podcasts = getAllPodcasts();
		$template_engine = get_template_engine();
		echo $template_engine->render('admin/archive', ['podcasts' => $podcasts, 'error' => $this->error]);
	}

	public function login() {
		if (loggedIn()) {
			header("Location: /public/admin/");
			exit;
		}
		if (isset($_POST['submit'])) {
			$result = logIn();
			if ($result == 0) $this->error = ["All fields are required.", true];
			if ($result == 1) $this->error = ["The username/password is incorrect.", true];
			if ($result == 2) {
				header("Location: /public/admin/");
				exit;
			}
		}
		$template_engine = get_template_engine();
		echo $template_engine->render('admin/login', ['error' => $this->error]);
	}

	public function logout() {
		unset($_SESSION['id']);
		session_destroy();
		header("Location: /public/");
		exit;
	}

	public function patreons() {
		if (!loggedIn()) {
			header("Location: /public/admin/login");
			exit;
		}
		if (isset($_POST['submit'])) {
			$result = addPatreon($_POST);
			if ($result == 0) $this->error = ["All fields are required.", true];
			if ($result == 1) $this->error = ["Name was too long (128 max).", true];
			if ($result == 2) $this->error = ["A database error occurred.", true];
			if ($result == 3) {
				header("Location: /public/admin/patreons");
				exit;
			}
		}
		$patreons = getPatreons();
		$template_engine = get_template_engine();
		echo $template_engine->render('admin/patreons', ['patreons' => $patreons, 'error' => $this->error]);
	}

	public function upload() {
		if (!loggedIn()) {
			header("Location: /public/admin/login");
			exit;
		}
		if (isset($_POST['submit'])) {
			$result = uploadPodcast($_POST);
			if ($result == 0) $this->error = ["All fields are required.", true];
			if ($result == 1) $this->error = ["The title or description was too long.", true];
			if ($result == 2) $this->error = ["No file was uploaded.", true];
			if ($result == 3) $this->error = ["This file type is not supported.", true];
			if ($result == 4) $this->error = ["Database error occurred.", true];
			if ($result == 5) {
				header("Location: /public/admin/upload");
				exit;
			}
		}
		$template_engine = get_template_engine();
		echo $template_engine->render('admin/upload', ['error' => $this->error]);
	}
}
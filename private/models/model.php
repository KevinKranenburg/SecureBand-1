<?php
	require_once __DIR__.'/../includes/functions.php';

	/**
	 * Get content for page
	 * 
	 * @param array
	 * 
	 * @return array
	 */

	 function getContent($titles) {
		$conn = dbConnect();
		$complete = [];
		foreach($titles as $title) {
			$stmt = $conn->prepare("SELECT * FROM `content` WHERE title=?;");
			if (!$stmt->execute([$title])) return;
			$result = $stmt->fetch();
			$content = ['title' => $result['title'], 'content' => $result['text']];
			$complete[] = $content;
		}
		return $complete;
	 }

	/**
	 * Gets all patreons from the database
	 * 
	 * @param none
	 * 
	 * @return object
	 */

	function getPatreons() {
		$conn = dbConnect();
		$patreons = $conn->query("SELECT patreon FROM `patreons` ORDER BY id ASC");
		if ($patreons->rowCount() == 0) return;
		return $patreons;
	}

	/**
	 * Adds a patreon
	 * 
	 * @param array
	 * 
	 * @return int 0 = Not all fields are filled in | 1 = Name is too long | 2 = Database error | 3 = success
	 */

	 function addPatreon($patreon) {
		 $conn = dbConnect();
		 if (empty($patreon['patreon'])) return 0;
		 if (strlen($patreon['patreon']) > 128) return 1;
		 $stmt = $conn->prepare("INSERT INTO `patreons` (patreon) VALUES (?);");
		 if (!$stmt->execute([$patreon['patreon']])) return 2;
		 return 3;
	 }

	/**
	 * Get all podcasts
	 * 
	 * @param none
	 * 
	 * @return array
	 */

	 function getAllPodcasts() {
		 $conn = dbConnect();
		 $podcasts = $conn->query("SELECT * FROM `podcasts` ORDER BY id DESC");
		 if ($podcasts->rowCount() == 0) return;
		 return $podcasts;
	 }
	 
	/**
	 * Get latest podcast
	 * 
	 * @param none
	 * 
	 * @return array
	 */

	 function getLatestPodcast() {
		$conn = dbConnect();
		$podcast = $conn->query("SELECT * FROM `podcasts` ORDER BY id DESC LIMIT 1");
		if ($podcast->rowCount() == 0) return;
		return $podcast->fetch();
	 }

	/**
	 * Get specific podcast
	 * 
	 * @param int ID
	 * 
	 * @return array
	 */

	 function getPodcast($id) {
		$conn = dbConnect();
		$stmt = $conn->prepare("SELECT * FROM `podcasts` WHERE id=? LIMIT 1");
		if (!$stmt->execute([$id])) return;
		if ($stmt->rowCount() == 0) return;
		return $stmt->fetch();
	 }

	/**
	 * Search for podcasts with title
	 * 
	 * @param string
	 * 
	 * @return array
	 */

	 function searchPodcasts($q) {
		$conn = dbConnect();
		$stmt = $conn->prepare("SELECT * FROM `podcasts` WHERE `title` LIKE concat('%', ?, '%');");
		if (!$stmt->execute([$q])) return;
		return $stmt->fetchAll();
	 }

	/**
	 * Upload a podcast
	 * 
	 * @param array Title, description, sponsors, notes, audio file
	 * 
	 * @return int 0 = All fields required | 1 = Title or desc too long | 2 = No file uploaded | 3 = Unallowed file type | 4 = Database error | 5 = Uploaded
	 */

	 function uploadPodcast($podcast) {
		 $allowed = ['mp3', 'wav', 'm4a', 'aif', 'wma', 'ogg'];
		 $title = filter_var($podcast['title'], FILTER_SANITIZE_SPECIAL_CHARS);
		 $description = filter_var($podcast['description'], FILTER_SANITIZE_SPECIAL_CHARS);
		 $sponsors = $podcast['sponsors'];
		 $notes = $podcast['notes'];
		 $date = date('Y:m:d H:m:i');
		 $fileExt = explode(".", $_FILES['file']['name']);
		 $fileActExt = strtolower(end($fileExt));
		 if (empty($title) || empty($description)) return 0;
		 if (strlen($title) > 256 || strlen($description) > 600) return 1;
		 if ($_FILES['file']['size'] < 1) return 2;
		 if (!in_array($fileActExt, $allowed)) return 3;

		 $conn = dbConnect();
		 $stmt = $conn->prepare("INSERT INTO `podcasts` (title, description, sponsors, notes, date) VALUES (?, ?, ?, ?, ?);");
		 if (!$stmt->execute([$title, $description, $sponsors, $notes, $date])) return 4;
		 $id = $conn->lastInsertId();
		 $path = __DIR__.'/../../public/assets/audio/'.$id.'.mp3';
		 move_uploaded_file($_FILES['file']['tmp_name'], $path);
		 return 5;
	 }
?>
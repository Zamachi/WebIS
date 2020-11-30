<?php

namespace app\core;

class Images
{
	protected const IMAGE_DIRECTORY =  __DIR__ .  '/../public/user-data';
	protected const IMAGE_DIRECTORY_NEWS =  __DIR__ .  '/../public/news';

	public function getImageDir(){ return self::IMAGE_DIRECTORY;}
	public function getImageNewsDir(){ return self::IMAGE_DIRECTORY_NEWS;}

	public function imageUpload($imageFile, $imageType)
	{
		if (!($imageType != "image/jpg" or $imageType != "image/jpeg" or $imageType or "image/png")) {
			return false;
		}

		if (file_exists(self::IMAGE_DIRECTORY . '/' . $imageFile['name'])) {
			$counter = 0;
			$noviNaziv = "";
			
			do {
				$counter++;
				$noviNaziv = "" .  basename($imageFile['name'], "." . strtolower(pathinfo($imageFile['name'],PATHINFO_EXTENSION))) . "-" . strval($counter) . "." . strtolower(pathinfo($imageFile['name'],PATHINFO_EXTENSION));			
			} while (file_exists(self::IMAGE_DIRECTORY . '/' . $noviNaziv));

			$imageFile['name'] = $noviNaziv;
		}

		if (!move_uploaded_file($imageFile['tmp_name'], self::IMAGE_DIRECTORY . '/' . $imageFile['name'])) {
			return false;
		};

		return $imageFile;
	}
	public function imageUploadNews($imageFile, $imageType)
	{
		if (!($imageType != "image/jpg" or $imageType != "image/jpeg" or $imageType or "image/png")) {
			return false;
		}

		if (file_exists(self::IMAGE_DIRECTORY_NEWS . '/' . $imageFile['name'])) {
			$counter = 0;
			$noviNaziv = "";
			
			do {
				$counter++;
				$noviNaziv = "" .  basename($imageFile['name'], "." . strtolower(pathinfo($imageFile['name'],PATHINFO_EXTENSION))) . "-" . strval($counter) . "." . strtolower(pathinfo($imageFile['name'],PATHINFO_EXTENSION));			
			} while (file_exists(self::IMAGE_DIRECTORY_NEWS . '/' . $noviNaziv));

			$imageFile['name'] = $noviNaziv;
		}

		if (!move_uploaded_file($imageFile['tmp_name'], self::IMAGE_DIRECTORY_NEWS . '/' . $imageFile['name'])) {
			return false;
		};

		return $imageFile;
	}
}

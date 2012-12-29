<?php

/*
 * nViso 3D Facial Imaging PHP Client Library.
 * 
 * Copyright (c) 2012 nViso SA. All Rights Reserved.
 * 
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 */

require_once("../mashape/MashapeClient.php");

class nViso3DFIHttpClient {
	const PUBLIC_DNS = "3dfi.nviso.net/api/v1/";
	private $authHandlers;

	function __construct( $app_id, $app_key ) {
		$this->authHandlers = array();
		$this->authHandlers[] = new QueryAuthentication("app_id", $app_id);
		$this->authHandlers[] = new QueryAuthentication("app_key", $app_key);
	}
	public function processImageByUrl($url, $app_session = null, $seq_number = null, $format = null) {
		$parameters = array(
				"app_session" => $app_session,
				"seq_number" => $seq_number,
				"url" => $url,
				"format" => $format );

		$response = HttpClient::doRequest(
				HttpMethod::GET,
				"https://" . self::PUBLIC_DNS . "/process/image/url/",
				$parameters,
				$this->authHandlers,
				ContentType::FORM,
				true);
		return $response;
	}
	public function processImageByUpload($image, $app_session = null, $seq_number = null, $format = null) {
		$parameters = array(
				"image" => (($image == null) ? null : ('@' . $image)),
				"app_session" => $app_session,
				"seq_number" => $seq_number,
				"format" => $format );

		$response = HttpClient::doRequest(
				HttpMethod::POST,
				"https://" . self::PUBLIC_DNS . "/process/image/upload/",
				$parameters,
				$this->authHandlers,
				ContentType::MULTIPART,
				true);
		return $response;
	}
}
?>
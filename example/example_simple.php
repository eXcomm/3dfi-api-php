<?php
/*
 * nViso 3D Facial Imaging PHP Client Library Example.
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

require_once("../nviso/nViso3DFIHttpClient.php");

/* Create client, fill the app_id and app_key with the informations 
   coming from your nViso API subsription. */
$my_app_id       	= "__INSERT_YOUR_APP_ID__";
$my_app_key      	= "__INSERT_YOUR_APP_KEY__";
$client = new nViso3DFIHttpClient( $my_app_id , $my_app_key );

/* Process image by URL.  */
$my_req_url      	= "https://gw1-3dfi.nviso.net/uploads/3bbda1fcc91647cc07423a9f7c2ebce0.jpg";
$my_req_session  	= "sample";
$my_req_seq_number  = 0;
$my_req_format  	= "json";

$response = $client->processImageByUrl( $my_req_url, $my_req_session , $my_req_seq_number, $my_req_format );
var_dump($response);

/* Process image by upload.  */
$my_req_image      	= "__INSERT_YOUR_IMAGE_FILE_PATH__";
$my_req_session  	= "sample";
$my_req_seq_number  = 0;
$my_req_format  	= "json";

$response = $client->processImageByUpload( $my_req_image, $my_req_session , $my_req_seq_number, $my_req_format );
var_dump($response);

?>
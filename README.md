# nviso-3dfi-api-php

A module for using the nViso 3D Facial Imaging (3DFI) API with PHP.

## Installation & Dependencies

Using the nViso 3D Facial Imaging PHP client library is as simple as dropping the unzipped contents of the downloaded library into your project.

The client libary makes use of the Mashape library and it depends on libcurl to make HTTP requests. Many installations of PHP have cURL installed by default. The following code snippet will determine if libcurl is installed on your server:

```php
<?php
var_dump(curl_version());
?>
```
If no exception is thrown, libcurl is properly configured. If an exception is thrown, follow these [installation instructions](http://www.php.net/manual/en/curl.installation.php).

## Getting Started

Getting started with the nViso 3DFI API couldn't be easier. Create a
`nViso3DFIHttpClient` and you're ready to go. You will find a sample file that allows you to get started immediately in the example/ folder.


### API Credentials

The `nViso3DFIHttpClient` needs your nViso 3DFI credentials. You can pass these
directly to the constructor. Your keys should be kept secret and never shared with anyone!

'''php
require_once("../nviso/nViso3DFIHttpClient.php");

$my_app_id       	= "__INSERT_YOUR_APP_ID__";
$my_app_key      	= "__INSERT_YOUR_APP_KEY__";
$client = new nViso3DFIHttpClient( $my_app_id , $my_app_key );
'''

### Processing an Image by URL

The `nViso3DFIHttpClient` can process a URL locating an image in any standard image format (JPEG, PNG, BMP, etc). It 
optionally accepts a session id and sequence number used for reporting and ordering results.

'''php

$my_req_url      	= "https://gw1-3dfi.nviso.net/uploads/3bbda1fcc91647cc07423a9f7c2ebce0.jpg";
$my_req_session  	= "sample";
$my_req_seq_number  = 0;
$my_req_format  	= "json";

$response = $client->processImageByUrl( $my_req_url, $my_req_session , $my_req_seq_number, $my_req_format );
var_dump($response);

'''

### Processing an Image by Upload

The `nViso3DFIHttpClient` can process an image stored locally on the computer. The selected file will be uploaded as part of the request. It 
optionally accepts a session id and sequence number used for reporting and ordering results.

'''php

$my_req_image      	= "__INSERT_YOUR_IMAGE_FILE_PATH__";
$my_req_session  	= "sample";
$my_req_seq_number  = 0;
$my_req_format  	= "json";

$response = $client->processImageByUpload( $my_req_image, $my_req_session , $my_req_seq_number, $my_req_format );
var_dump($response);

'''


### Copyright

Copyright (C) 2012 - 2013 nViso SA.
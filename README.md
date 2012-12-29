# nViso 3D Facial Imaging PHP SDK (v1)

The nViso Developer Platform is a set of APIs that make your application more engaging through capturing real-time emotional feedback and enabling next generation real-time interactivity. For a full list of capabilities please consult the [nViso Developer Platform Portal](https://developer.nviso.net) for more information.

This repository contains the open source PHP SDK that allows you to access [nViso Developer Platform](https://developer.nviso.net) from your PHP application. In order to use this SDK you will need to have an registered and authorized account from the [nViso Developer Platform Portal](https://developer.nviso.net) and a valid application ID and Key. Except as otherwise noted, the nViso 3D Facial Imaging PHP SDK is licensed under the MIT Licence (http://opensource.org/licenses/MIT).

## Installation & Dependencies

Using the nViso 3D Facial Imaging PHP SDK is as simple as dropping the unzipped contents of the downloaded library into your project. The client libary makes use of the Mashape library and it depends on libcurl to make HTTP requests. Many installations of PHP have cURL installed by default. The following code snippet will determine if libcurl is installed on your server:

```php
<?php
var_dump(curl_version());
?>
```
If no exception is thrown, libcurl is properly configured. If an exception is thrown, follow these [installation instructions](http://www.php.net/manual/en/curl.installation.php).

## Getting Started

Getting started with the nViso 3D Facial Imaging PHP SDK couldn't be easier. Create a `nViso3DFIHttpClient` and you're ready to go. You will find a [sample file](https://github.com/nViso/3dfi-api-php/blob/master/example/example_simple.php) that allows you to get started immediately in the [example folder](https://github.com/nViso/3dfi-api-php/blob/master/example/).

### API Credentials

The `nViso3DFIHttpClient` needs your application ID and key found by logging into the [nViso Developer Platform](https://developer.nviso.net). You can pass these directly to the constructor. Your keys should be kept secret and never shared with anyone!

```php
<?php
require_once("../nviso/nViso3DFIHttpClient.php");

$my_app_id       	= "__INSERT_YOUR_APP_ID__";
$my_app_key      	= "__INSERT_YOUR_APP_KEY__";
$client = new nViso3DFIHttpClient( $my_app_id , $my_app_key );
?>
```

### Processing an Image by URL

The `nViso3DFIHttpClient` can process a URL locating an image in any standard image format (JPEG, PNG, BMP, etc). It optionally accepts a session id and sequence number used for reporting and ordering results.

```php
<?php
require_once("../nviso/nViso3DFIHttpClient.php");

$my_app_id       	= "__INSERT_YOUR_APP_ID__";
$my_app_key      	= "__INSERT_YOUR_APP_KEY__";
$client = new nViso3DFIHttpClient( $my_app_id , $my_app_key );

$my_req_url      	= "https://gw1-3dfi.nviso.net/uploads/3bbda1fcc91647cc07423a9f7c2ebce0.jpg";
$my_req_session  	= "sample";
$my_req_seq_number  = 0;
$my_req_format  	= "json";

$response = $client->processImageByUrl( $my_req_url, $my_req_session , $my_req_seq_number, $my_req_format );
var_dump($response);
?>
```

### Processing an Image by Upload

The `nViso3DFIHttpClient` can process an image stored locally on the computer. The selected file will be uploaded as part of the request. It 
optionally accepts a session id and sequence number used for reporting and ordering results.

```php
<?php
require_once("../nviso/nViso3DFIHttpClient.php");

$my_app_id       	= "__INSERT_YOUR_APP_ID__";
$my_app_key      	= "__INSERT_YOUR_APP_KEY__";
$client = new nViso3DFIHttpClient( $my_app_id , $my_app_key );

$my_req_image      	= "__INSERT_YOUR_IMAGE_FILE_PATH__";
$my_req_session  	= "sample";
$my_req_seq_number  = 0;
$my_req_format  	= "json";

$response = $client->processImageByUpload( $my_req_image, $my_req_session , $my_req_seq_number, $my_req_format );
var_dump($response);
?>
```

### Response Format

The client library returns a `MashapeResponse` object that includes the response of the endpoint. It has the following properties:

- int code: the HTTP status code.
- array headers: the response headers.
- string rawBody: the non-parsed raw body.
- (stdClass) body: the parsed body.

The parsed body containing the data returned by the endpoint can be accessed simply by :

```php
<?php
print $response->body[0];
?>
```
The format of the data in the parsed body can be either as a JSON object or XML (depending on the format you choose). 

- `json`: the output will be valid JSON with the mimetype of `application/json`. 
- `eml`: the output will be valid EmotionML with the mimetype of `text/xml`.

For further documentation on the response data model please consult the [nViso Developer Platform Portal](https://developer.nviso.net) for more information.

## Support & Feedback

Please shoot us an email if you have questions or feedback (info@nviso.ch) or open a GitHub issue for bugs and feature requests.

## Credits

This repository incorporates the [Mashape Library](https://github.com/Mashape/mashape-php-client-library) which is distributed under the GPL license.

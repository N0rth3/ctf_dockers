<?php
class Rsa {
private static $PRIVATE_KEY = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDPkXRNQmLoJXP9sUVD7bPgjqYUgPItlo2gcI5I8ojAD3pGiilz
c0liOk7in66Sh33lo2Yf46d6xcr0rU4gZCc4XAG88FcoBXg4EA8sZCa2kVTFI0Ts
V/Y+557dabzTKjB3X6fDy+mIMtBJ/AmTVXkWWkP1MbiBDRollgxKE4V2jwIDAQAB
AoGBAKLtN28VdvFlxKATr5zcTl8rWW2qsW3bSRvwfZ8A0RqAi6gm9tZqXeW+gwEb
+jmGJOpF0fmiBmo2K1LXXgXK14TZvYjiR9aqhq6A8oaNoHx/GHZxoggJo+y46ik0
PQAb1xq4RkFeVhUMV9vhd73qtVvzQUAxn2VZ4eq7UxHRwMiBAkEA6KJz2Vn5+/Sv
cVvGBiN25rrtMX9+kwVbGFnz3ySUglbbfwMAIA07Ea8TbJ0ifoG4HBBj98gd2DlY
6FpWtRKt4QJBAORqfUtCIROb/i+j/Dfbmv8vtR5ZH1Jc25WWYGriMYiSYfv4NjJy
eXzU7rutI1gAAQfNc+P/TVp76c37xqf6Um8CQCFNkFQfQ2BEaRFLWA/s58qkG+yo
GdCmRaI4zma1b+Uw1f9ayJvOCRTBAYDdBeEiZN7vocAJD+yyWP36YMtPP0ECQCWF
0NtiG6jrAVC2MaLDcqzlG23G2jxfgLsMHv6v9c8nrO0Fk3GqGIcHO8ic4qd8KK8t
cxJLSFvK61epOrMxjgUCQQDGIELSIX8f6KM2iVZmQP2YS8voqtd6E5ExX3UxZ1yb
sKe4FNkwcXqWkOmtXOhW+kfruUZUO8bzlJ6vEO/q1WNL
-----END RSA PRIVATE KEY-----';

private static function getPrivateKey()
{
$privKey = self::$PRIVATE_KEY;
return openssl_pkey_get_private($privKey);
}

public static function privEncrypt($data = '')
{
if (!is_string($data)) {
return null;
}
return openssl_private_encrypt($data,$encrypted,self::getPrivateKey()) ? base64_encode($encrypted) : null;
}
}

$rsa = new Rsa();
$cmd = $_POST['cmd'];
$action = "enc";
if($action!==Null){
    if($action==="enc"){
        $privEncrypt = $rsa->privEncrypt($cmd);
        echo $privEncrypt;
    }
}
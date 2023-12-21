<?php
namespace App\Libraries;
require_once ROOTPATH . 'vendor/autoload.php';
use Firebase\JWT\JWT as JWTLib;
use Firebase\JWT\Key;

class Jwt
{
    protected $secretKey = "3136303538323137303936383530313036313435373237313831363433343634";
    protected $algorithm = "HS256";
    protected $expire = "3600";

    public function __construct()
    {
    }

    public function encode($data)
    {
        $payload = [
            'iat' => time(),
            'exp' => time() + $this->expire,
            'data' => $data,
        ];
        return JWTLib::encode($payload, $this->secretKey, $this->algorithm);
    }

    public function decodeAdmin($token)
    {
        if ($token) {
            try {
                $decoded = JWTLib::decode($token, new Key($this->secretKey, $this->algorithm));
                $decodedData = json_decode(base64_decode(explode('.', $token)[1]))->data->role;
                if ($decodedData !== "admin") { //khusus jwt untuk admin
                    return false;
                }
                if ($decoded) {
                    return true;
                }
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}
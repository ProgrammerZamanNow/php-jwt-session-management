<?php

class Session
{

    public function __construct(public string $username, public string $role)
    {
    }

}

class SessionManager
{

    public static string $SECRET_KEY = "fjnljaicnuwe8nuwvo8nfulvieufksvfukenkfnelvnuf";

    public static function login(string $username, string $password): bool
    {
        if ($username == "eko" && $password == "eko") {

            $payload = [
                "username" => $username,
                "role" => "customer"
            ];

            $jwt = \Firebase\JWT\JWT::encode($payload, SessionManager::$SECRET_KEY, 'HS256');
            setcookie("X-PZN-SESSION", $jwt);

            return true;
        } else {
            return false;
        }
    }

    public static function getCurrentSession(): Session
    {
        if($_COOKIE['X-PZN-SESSION']){
            $jwt = $_COOKIE['X-PZN-SESSION'];
            try {
                $payload = \Firebase\JWT\JWT::decode($jwt, SessionManager::$SECRET_KEY, ['HS256']);
                return new Session(username: $payload->username, role: $payload->role);
            }catch (Exception $exception){
                throw new Exception("User is not login");
            }
        }else{
            throw new Exception("User is not login");
        }
    }

}

<?php namespace App\Controllers;
//https://ilmucoding.com/middleware-filters-codeigniter-4/ 
use App\Models\Auth_model;

//https://ilmucoding.com/codeigniter-4-auth-jwt/
use \Firebase\JWT\JWT;

class Login extends BaseController
{
 
    public function __construct() {
        $this->auth = new Auth_model;
    }
 
    public function index()
    {
        return view('v_login');
    }


    public function proses()
    {
        $username = htmlspecialchars($this->request->getPost('username'));
        $password = htmlspecialchars($this->request->getPost('password'));
 
        $cek_login = $this->auth->getLogin($username, $password);
 
        if(!empty($cek_login)){
 
            session()->set("id", $cek_login['id']);
            session()->set("username", $cek_login['username']);
            session()->set("password", $cek_login['password']);
 
            //return redirect()->to('/home');
            return redirect()->to('/ngatmin/email');
 
        } else {
 
            return redirect()->to('/login');
         
        }
         
    }

    public function prosesToken($token)
    {
       
        $secret_key='sdvwhgef64gr782rwdb7*Juidh$3jjj';
        if(!empty($token)){
            try {
                $decoded = JWT::decode($token, $secret_key, array('HS256'));
                if($decoded){   
                    session()->set("id", $decoded->opd);
                    session()->set("namaopd", $decoded->namaopd);
                    session()->set("level", $decoded->level);
                    return redirect()->to('/ngatmin/email');
                }
            } catch (\Exception $e){
                 return redirect()->to('/login');
            }
        }
       
       
    }
     
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function logoutToken()
    {
        session()->destroy();
        return redirect()->to('http://simasneg.kulonprogokab.go.id/simasneg/index.php');
    }
 
}
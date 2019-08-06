<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class User extends Model
{
    private $_id;
    private $_univName;
    private $_email;
    private $_password;

    // blowfish
    private $_algo = "$2a";
    // cost parameter
    private $_cost = "$10";
    // mainly for internal use

    //constructor
    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->_id                = "";
        $this->_email             = "";
        $this->_password          = "";

        if (Session::has("univName"))
            $this->_univName = Session::get("univName");

        if (Session::has("univID"))
            $this->_id = Session::get("univID");
    }

    //setter and getter

    public function setUnivName($univName)
    {
        $this->_univName = $univName;
    }

    public function getUnivName()
    {
        return $this->_univName;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function getUnivID()
    {
        return $this->_id;
    }

    public function GetSalt()
    {
        return $this->unique_salt();
    }

    // checked 02/08/2019 11:20
    public function checkSession()
    {
        if (Session::has("univID"))
            return true;
        else
            return false;
    }
    // checked finished 02/08/2019 11:20 by KT
    // cek session di setiap menu yang ada
    // kalau tidak ada session berarti dilempar ke login page


    /*
        * This function below for generating hash password
    */
    // this will be used to generate a hash
    public function unique_salt()
    {
        return substr(sha1(mt_rand()), 0, 22);
    }

    public function hash($password, $salt)
    {
        return crypt($password, $this->_algo .
            $this->_cost .
            '$' . $salt);
    }
    /*  End of Generating Hash */


    // checked 02/08/2019 10:25
    // 1. ganti pemanggilan table 'cc_users' menjadi 'university_user'
    // 2. ganti pemanggilan table 'university' menjadi 'university_profile'
    public function authenticateUser($email, $typedPassword)
    {
        $oldData =
            DB::table("university_user")
            ->select("id", "password", "salt")
            ->where("email", "=", $email)
            ->get()
            ->toArray();

        if (!empty($oldData))
            $authenticated = $this->checkPassword($oldData, $typedPassword);
        else
            return false;

        if ($authenticated) {

            $timestamp = date('Y-m-d H:i:s');

            $data = array(
                "created_at" => $timestamp
            );

            $resp =
                DB::table('university_user')
                ->where('email', $email)
                ->update($data);

            //mengambil nama universitas
            $univName =
                DB::table("university_profile")
                ->where("id", $oldData[0]->id)
                ->value("name");

            Session::put("univName", $univName);
            Session::put('univID', $oldData[0]->id);
            //Session::put("univID", "7e93f0eace324ea55577cb53b5304be33311c57e35a75c90329cd19250ee2ccf");
            Session::save();

            return true;
        } else
            return false;
    }
    //checked finished 08/08/2019 10:44


    private function checkPassword($oldData, $typedPassword)
    {
        $typedPassword = $this->hash($typedPassword, $oldData[0]->salt);
        if ($oldData[0]->password === $typedPassword)
            return true;
        else
            return false;
    }


    public function changePassword($oldPassword, $newPassword)
    {
        $oldData =
            DB::table('university_user')
            ->select('password', 'salt')
            ->where('id', '=', $this->getUnivID())
            ->get()
            ->toArray();

        $resp = $this->checkPassword($oldData, $oldPassword);

        if ($resp) {
            $newPassword = $this->hash($newPassword, $oldData[0]->salt);

            $data = array(
                "password" => $newPassword
            );

            $update = DB::table('university_user')
                ->where('id', $this->getUnivID())
                ->update($data);

            if ($update)
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    public function logout()
    {
        Session::flush();
    }
}

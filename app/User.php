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

    public function checkSession()
    {
        if (Session::has("univID"))
            return true;
        else
            return false;
    }

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

    public function authenticateUser($email, $typedPassword)
    {
        $oldData =
            DB::table("cc_users")
            ->select("u_id", "u_password", "u_salt")
            ->where("u_username", "=", $email)
            ->get()
            ->toArray();

        dd($oldData);

        if (!empty($oldData))
            $authenticated = $this->checkPassword($oldData, $typedPassword);
        else
            return false;

        if ($authenticated) {

            $timestamp = date('Y-m-d H:i:s');

            $data = array(
                "u_timestamp" => $timestamp
            );

            $resp =
                DB::table('cc_users')
                ->where('u_username', $email)
                ->update($data);

            $univName =
                DB::table("university")
                ->where("id", $oldData[0]->u_id)
                ->value("name");

            Session::put("univName", $univName);
            Session::put('univID', $oldData[0]->u_id);
            //Session::put("univID", "7e93f0eace324ea55577cb53b5304be33311c57e35a75c90329cd19250ee2ccf");
            Session::save();

            return true;
        } else
            return false;
    }

    private function checkPassword($oldData, $typedPassword)
    {
        $typedPassword = $this->hash($typedPassword, $oldData[0]->u_salt);
        if ($oldData[0]->u_password === $typedPassword)
            return true;
        else
            return false;
    }

    public function changePassword($oldPassword, $newPassword)
    {
        $oldData =
            DB::table('cc_users')
            ->select('u_password', 'u_salt')
            ->where('u_id', '=', $this->getUnivID())
            ->get()
            ->toArray();

        $resp = $this->checkPassword($oldData, $oldPassword);

        if ($resp) {
            $newPassword = $this->hash($newPassword, $oldData[0]->u_salt);

            $data = array(
                "u_password" => $newPassword
            );

            $update = DB::table('cc_users')
                ->where('u_id', $this->getUnivID())
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

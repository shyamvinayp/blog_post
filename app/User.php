<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'account_code','fname', 'lname', 'type', 'address','address_2', 'country_id','city', 'zip', 'state',
        'billing_email', 'rate_email', 'status','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'tbl_user_terms' => 'boolean',
    ];

	public static function getUserType(){
		return [
            '1' => 'Admin',
            '2' => 'Manager',
            '3' => 'Customer',
            '4' => 'Employee',
        ];
	}

	public static function getUserStatus(){
		return [
            '1' => 'Active',
            '2' => 'Pending',
            '3' => 'Delete',
            '0' => 'Deactive',

        ];
	}

    public static function getrandomNumber($limit = 16){
        $code = '';
        for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
        return $code;
    }

    /**
     * @param $length_of_string
     * @return false|string
     */
    public static function randomStrings($length_of_string) {

        // md5 the timestamps and returns substring
        // of specified length
        return substr(md5(time()), 0, $length_of_string);
    }

    /**
     * @param int $length
     * @param bool $add_dashes
     * @param string $available_sets
     * @return string
     */
    public static function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds') {
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';

        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];

        $password = str_shuffle($password);

        if(!$add_dashes)
            return $password;

        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }

        $dash_str .= $password;

        return $dash_str;
    }
}

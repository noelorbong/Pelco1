<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Consumer_Application extends Authenticatable
{
use Notifiable;

protected $table = 'consumer_application';
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
    'application_id','applicant_account_no','applicant_lastname','applicant_firstname', 'applicant_middlename','applicant_address','applicant_emailaddress','applicant_mobile_no','applicant_landline_no','applicant_identity','application_status','application_date','applicant_pincode','created_modified','remember_token',
    ];

protected $primaryKey = 'application_id';
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
    'applicant_pincode', 'remember_token',
    ];

//     public function setPasswordAttribute($password)
// {
//     $this->attributes['applicant_pincode'] = \Hash::make($password);
// }
public function getPasswordAttribute($value)
{
    if( \Hash::needsRehash($value) ) {
            $value = \Hash::make($value);
    }

    return  $value;
}

public function setPasswordAttribute($value)
    {
        $this->attributes['applicant_pincode'] = bcrypt($value);
    }

public function getAuthPassword()
{
    return $this->applicant_pincode; 
}



}

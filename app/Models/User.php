<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Transaction;
use DB;
use Auth;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function get_contact()
    {
        $data = User::where('contact_person','yes')->first();
        if($data)
        {
            return $data->phone_number;
        }else
        {
            return '012345678';
        }
    }

    public function get_contact_details()
    {
        $data = User::where('contact_person','yes')->first();
        if($data)
        {
            return $data;
        }else
        {
            return '012345678';
        }
    }

    public function get_bank()
    {
        $data = DB::table('banks')->get();
        if(!$data->isEmpty())
        {
            return $data;
        }else
        {
            return '012345678';
        }
    }

    public function cek_pay($id)
    {
        if(Auth::check())
        {
            $data = 
            DB::table('transactions')->where('car_id',$id)->where('user_id',Auth::user()->id)->first();
                if($data)
                {
                    return 1;
                }else
                {
                    return 2;
                }
        }else
        {
            return 0;
        }
        
    }

     public function cek_booked($id)
    {

        $data = DB::table('transactions')
                ->where('car_id',$id)
                ->first();
        return $data;

    }
}

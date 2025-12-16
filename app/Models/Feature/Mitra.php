<?php

namespace App\Models\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Mitra extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id','logo','slug','description','join_at','is_approved'];
    protected $appends = ['html_status','logo_path'];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Course()
    {
        return $this->hasMany(Course::class);
    }

    // function

    public function getMyTransaction()
    {
        return Transaction::whereHas('Course',function($q){
            $q->where('mitra_id',$this->id);
        })->get();
    }

    public function getHtmlStatusAttribute()
    {
        if($this->is_approved == '0'){
            return '<span class="badge bg-warning">'.__('status.mitra_pending').'</span>';
        }

        return '<span class="badge bg-success">'.__('status.mitra_approved').'</span>';
    }

    public function getLogoPathAttribute()
    {
        if (!$this->logo) {
            return asset('default/null/notfound.png');
        }
        if (preg_match('/^https?:\/\//i', $this->logo)) {
            return $this->logo;
        }
        return Storage::url($this->logo);
    }
}

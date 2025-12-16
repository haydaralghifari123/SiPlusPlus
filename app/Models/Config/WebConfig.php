<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WebConfig extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name','label','value','type'];
    protected $appends = ['file_path'];
    public function getFilePathAttribute()
    {
        if ($this->type == 2) {
            if ($this->value != null) {
                // Jika value sudah URL absolut, kembalikan langsung
                if (preg_match('/^https?:\/\//i', $this->value)) {
                    return $this->value;
                }
                // Ikuti konfigurasi disk & APP_URL/ASSET_URL
                return Storage::url($this->value);
            } else {
                return asset('default/null/notfound.png');
            }
        }
    }    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'contact',
        'whatsapp',
        'city',
        'state',
        'location',
        'pincode',
        'about',
        'slogan',
        'company_image',
        'logo',
        'favicon',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'company_image' => 'string',
        'logo'          => 'string',
        'favicon'       => 'string',
        'latitude'      => 'float',
        'longitude'     => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('assets/images/logo.png');
    }

    public function getCompanyImageUrlAttribute()
    {
        return $this->company_image ? asset('storage/' . $this->company_image) : asset('assets/images/about.png');
    }

    public function getFaviconUrlAttribute()
    {
        return $this->favicon ? asset('storage/' . $this->favicon) : asset('assets/images/favicon.png');
    }
}

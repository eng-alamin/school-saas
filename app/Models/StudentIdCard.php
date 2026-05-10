<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentIdCard extends Model
{
    use HasFactory, SoftDeletes;
 
    protected $fillable = [
        'template_id', 'student_id', 'name', 'father_name', 'mother_name',
        'class', 'section', 'roll_number', 'session', 'institute_name',
        'institute_address', 'blood_group', 'date_of_birth', 'contact_number',
        'address', 'photo', 'signature', 'issue_date', 'expiry_date', 'status',
    ];
 
    protected $casts = [
        'date_of_birth' => 'date',
        'issue_date' => 'date',
        'expiry_date' => 'date',
    ];
 
    public function template()
    {
        return $this->belongsTo(IdCardTemplate::class, 'template_id');
    }
 
    public static function getBloodGroups(): array
    {
        return ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
    }
 
    public static function getStatuses(): array
    {
        return ['active' => 'Active', 'inactive' => 'Inactive', 'expired' => 'Expired'];
    }
 
    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(storage_path('app/public/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }
        return asset('images/default-avatar.png');
    }
}

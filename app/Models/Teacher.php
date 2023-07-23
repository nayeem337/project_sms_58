<?php

namespace App\Models;

use App\helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'phone', 'subject', 'address', 'image', 'status'];

    protected static $teacher;

    public static function createOrUpdateTeacher($request, $userId = null, $id = null)
    {
        Teacher::updateOrCreate(['id' => $id], [
            'user_id'           => $userId,
            'name'              => $request->name,
            'phone'             => $request->phone,
            'subject'           => $request->subject,
            'address'           => $request->address,
            'image'             => isset($id) ? Helper::uploadFile($request->file('image'), 'teachers-image', Teacher::find($id)->image) : Helper::uploadFile($request->file('image'), 'teachers-image'),
            'status'            => $request->status,
        ]);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}

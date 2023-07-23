<?php

namespace App\Models;

use App\helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'price',
        'short_description',
        'long_description',
        'start_date',
        'end_date',
        'image',
        'status',
    ];

    public static function createOrUpdateCourse($request, $id = null)
    {
        Course::updateOrcreate(['id' => $id], [
            'category_id'               => $request->category_id,
            'title'                     => $request->title,
            'price'                     => $request->price,
            'short_description'         => $request->short_description,
            'long_description'          => $request->long_description,
            'start_date'                => $request->start_date,
            'end_date'                  => $request->end_date,
            'image'                     => isset($id) ? Helper::uploadFile($request->file('image'), 'course-images', Course::find($id)->image) : Helper::uploadFile($request->file('image'), 'course-images'),
            'status'                    => $request->status,
        ]);
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
}

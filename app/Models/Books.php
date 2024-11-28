<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genres;
use Illuminate\Support\Str;

class Books extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    public $incrementing = false;

    protected $fillable = [
        'id_buku',
        'judul',
        'id_genre',
        'pengarang',
        'deskripsi',
        'tahun_terbit',
        'gambar',
    ];

    public function genre()
    {
        return $this->belongsTo(Genres::class, 'id_genre', 'id_genre');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
    public function setGambarAttribute($value)
    {
        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $filename = time() . '_' . Str::slug($this->judul) . '.' . $value->getClientOriginalExtension();
            $path = $value->storeAs('public/book_images', $filename);
            $this->attributes['gambar'] = str_replace('public/', '', $path);
        }
    }
    public function getGambarUrlAttribute()
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : asset('images/default-book.png');
    }
}

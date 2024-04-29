<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'head',
        'duty',
    ];

    public static function paginated($searchDiv)
    {
        $baseQuery = Division::query();

        $divpage = $baseQuery->where(function ($query) use ($searchDiv) {
                $query->where('name', 'like', '%' . $searchDiv . '%')
                    ->orWhere('code', 'like', '%' . $searchDiv . '%')
                    ->orWhere('head', 'like', '%' . $searchDiv. '%')
                    ->orWhere('duty', 'like', '%' . $searchDiv . '%');
            })
            ->paginate(10);

        return ['divpage'=> $divpage];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'state',
        'staffname',
        'email',
        'ticketdiv',
        'severity',
        'category',
        'description',
        'remark',
    ];

    public function divisioned()
    {
        return $this->belongsTo(Division::class, 'ticketdiv', 'id');
    }

    public function usered()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function paginated($searchPending, $searchResolved)
{
    $user = Auth::user();

    $baseQuery = Ticket::with('divisioned');

    if ($user->acctype == 'admin') {
    } elseif ($user->acctype == 'user') {
        $baseQuery = $baseQuery->where('user_id', $user->id);
    } else {
        return [
            'pendingpage' => collect(),
            'resolvepage' => collect(),
        ];
    }

    $pendingpageQuery = clone $baseQuery;
    $pendingpage = $pendingpageQuery->where('state', '!=', 'Resolved')
        ->where(function ($query) use ($searchPending) {
            $query->where('state', 'like', '%' . $searchPending . '%')
                ->orWhere('staffname', 'like', '%' . $searchPending . '%')
                ->orWhere('email', 'like', '%' . $searchPending . '%')
                ->orWhere('severity', 'like', '%' . $searchPending . '%')
                ->orWhere('category', 'like', '%' . $searchPending . '%')
                ->orWhere('description', 'like', '%' . $searchPending . '%')
                ->orWhereHas('divisioned', function ($query) use ($searchPending) {
                    $query->where('code', 'like', '%' . $searchPending . '%');
                });
        })
        ->orderByRaw("CASE 
            WHEN severity = 'critical' THEN 1 
            WHEN severity = 'high' THEN 2 
            WHEN severity = 'medium' THEN 3 
            WHEN severity = 'low' THEN 4 
            ELSE 5 
        END")
        ->paginate(10);

    $resolvepageQuery = clone $baseQuery;
    $resolvepage = $resolvepageQuery ->where('state', '=', 'Resolved')
        ->where(function ($query) use ($searchResolved) {
            $query->where('state', 'like', '%' . $searchResolved . '%')
                ->orWhere('staffname', 'like', '%' . $searchResolved . '%')
                ->orWhere('email', 'like', '%' . $searchResolved . '%')
                ->orWhere('severity', 'like', '%' . $searchResolved . '%')
                ->orWhere('category', 'like', '%' . $searchResolved . '%')
                ->orWhere('description', 'like', '%' . $searchResolved . '%')
                ->orWhereHas('divisioned', function ($query) use ($searchResolved) {
                    $query->where('code', 'like', '%' . $searchResolved . '%');
                });
        })
        ->orderByRaw("CASE 
            WHEN severity = 'critical' THEN 1 
            WHEN severity = 'high' THEN 2 
            WHEN severity = 'medium' THEN 3 
            WHEN severity = 'low' THEN 4 
            ELSE 5 
        END")
        ->paginate(10);

    return [
        'pendingpage' => $pendingpage,
        'resolvepage' => $resolvepage,
    ];
}

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'acctype',
        'username',
        'division_id',
        'email',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DISAPPROVED = 'disapproved';

    // Optional: Default values can be set here too
    protected $attributes = [
        'status' => self::STATUS_PENDING,
    ];

    /**
     * Validate status input against the defined ENUM values.
     */
    public static function isValidStatus($status)
    {
        return in_array($status, [
            self::STATUS_PENDING,
            self::STATUS_APPROVED,
            self::STATUS_DISAPPROVED
        ]);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function paginated($searchUser)
    {
        $baseQuery = User::with('division');

        $userpage = $baseQuery->where(function ($query) use ($searchUser) {
            $query->where('name', 'like', '%' . $searchUser . '%')
                ->orWhere('acctype', 'like', '%' . $searchUser . '%')
                ->orWhere('email', 'like', '%' . $searchUser . '%')
                ->orWhere('status', '=', $searchUser)
                ->orWhere('username', 'like', '%' . $searchUser . '%')
                ->orWhereHas('division', function ($query) use ($searchUser) {
                    $query->where('name', 'like', '%' . $searchUser . '%');
                });
        })
            ->orderByRaw("CASE 
            WHEN acctype = 'admin' THEN 1 
            WHEN acctype = 'user' THEN 2 
        END")
            ->paginate(10);

        return ['userpage' => $userpage];
    }

}
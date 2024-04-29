<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\{Login, Register};
use App\Livewire\Admin\{Dashboard, Usertable, Divtable};
use App\Livewire\User\{Userboard, Supticket, Compticket};

Route::middleware(['guest'])->group(function () {
    Route::get('/register', Register::class)->name('livewire.auth.register');
    Route::get('/', Login::class)->name('login');
});

Route::middleware(['auth' ])->group(function () {
    Route::get('/userboard', Userboard::class)->name('livewire.user.userboard');
    Route::get('/supticket', Supticket::class)->name('livewire.user.supticket');
    Route::get('/compticket', Compticket::class)->name('livewire.user.compticket');
    
    Route::get('/dashboard', Dashboard::class)->name('livewire.admin.dashboard');
    Route::get('/usertable', Usertable::class)->name('livewire.admin.usertable');
    Route::get('/divtable', Divtable::class)->name('livewire.admin.divtable');
    
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/boostech/email', [Boostech\Email\Controllers\HmailController::class, 'index'])->name('boostech_email.index');

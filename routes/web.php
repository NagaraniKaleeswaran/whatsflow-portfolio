<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MessageTemplateController;
use App\Http\Controllers\AutoReplyRuleController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\WhatsappConfigController;
use Illuminate\Support\Facades\Route;
use App\Models\Lead;
use App\Models\Conversation;
use App\Models\Campaign;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/toggle-portfolio', function () {
    session(['portfolio_mode' => !session('portfolio_mode')]);
    return back();
})->name('portfolio.toggle');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('leads', LeadController::class);
    Route::resource('tags', TagController::class);
    Route::resource('templates', MessageTemplateController::class);
    Route::resource('auto-replies', AutoReplyRuleController::class);
    Route::resource('faqs', FaqController::class);
    
    Route::get('inbox', [ConversationController::class, 'index'])->name('inbox.index');
    Route::get('inbox/{conversation}', [ConversationController::class, 'show'])->name('inbox.show');
    Route::post('inbox/{conversation}/message', [ConversationController::class, 'sendMessage'])->name('inbox.message');

    Route::resource('campaigns', CampaignController::class);
    
    Route::get('whatsapp-config', [WhatsappConfigController::class, 'index'])->name('whatsapp.config');
    Route::post('whatsapp-config', [WhatsappConfigController::class, 'store'])->name('whatsapp.config.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

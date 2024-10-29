<?php
namespace App\Http\Responses;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
 
class LoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        // You can use the Filament facade to get the current panel and check the ID
        if (Filament::getCurrentPanel()->getId() === 'admin') {
            return redirect()->to('admin');
        }
        if (Filament::getCurrentPanel()->getId() === 'mentor') {
            return redirect()->to('mentor');
        }
        if (Filament::getCurrentPanel()->getId() === 'student') {
            return redirect()->to('student');
        }
 
        return parent::toResponse($request);
    }
}
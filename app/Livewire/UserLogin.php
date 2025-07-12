<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;

class UserLogin extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];
    
    public function mount()
        {
            // Buyer logged in
            if (Auth::guard('buyer')->check()) {
                return redirect()->route('buyer.dashboard');
            }

            // Seller logged in
            if (Auth::guard('seller')->check()) {
                return redirect()->route('seller.dashboard');
            }

            // Admin logged in
            if (Auth::guard('admin')->check()) {
                return redirect()->route('admin.dashboard');
            }
        }

    public function login()
    {
        $this->validate();

        // 1. Buyer Login Check
        if (Auth::guard('buyer')->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('success', 'Buyer Login successful!');
            return redirect()->route('buyer.dashboard');
        }

        // 2. Seller Login Check
        if (Auth::guard('seller')->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('success', 'Seller Login successful!');
            return redirect()->route('seller.dashboard');
        }

        if (Auth::guard('admin')->attempt([
            'email' => $this->email,
            'password' => $this->password,
            'is_admin' => true, 
        ])) {
            session()->flash('success', 'Admin Login successful!');
            return redirect()->route('admin.dashboard');
        }

        // If none matched
        session()->flash('error', 'Invalid credentials.');
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}

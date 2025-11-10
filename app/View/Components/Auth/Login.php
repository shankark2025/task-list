<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Login extends Component
{

    //public $text;
    /**
     * Create a new component instance.
     */

    public $text;
    public $href;

    public function __construct()
    {
    }

    public function shouldRender(): bool
    {
        return Str::length($this->text ?? 'Login') > 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.login');
    }
}

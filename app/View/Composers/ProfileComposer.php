<?php
namespace App\View\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;

class ProfileComposer
{
    public function __construct(protected UserRepository $user) {}

    public function compose(View $view): void
    {
        $view->with('count', $this->user->count())
             ->with('verifiedCount', $this->user->verifiedCount())
             ->with('userValue', $this->user->findUser(1));
    }
}

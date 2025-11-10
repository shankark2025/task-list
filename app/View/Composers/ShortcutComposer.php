<?php

namespace App\View\Composers;

use Illuminate\View\View;

class ShortcutComposer
{
    public function compose(View $view)
    {
        // Data to share with view
        $view->with('appName', 'My Laravel App')
             ->with('year', date('Y'));
    }
}

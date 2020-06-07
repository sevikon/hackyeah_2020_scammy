<?php

namespace App\Http\Controllers\Documentation;

use Illuminate\Mail\Markdown;

class DocumentationController
{
    public function user_roles()
    {
        $content = base_path('documentation/user_roles.md');
        return view('documentation.documentation', [
            'title' => 'User Roles',
            'view' => Markdown::parse(file_get_contents($content))
        ]);
    }

    public function voucher_statuses()
    {
        $content = base_path('documentation/voucher_statuses.md');
        return view('documentation.documentation', [
            'title' => 'Voucher Statuses',
            'view' => Markdown::parse(file_get_contents($content))
        ]);
    }
}

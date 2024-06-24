<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignSystemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ?string $name)
    {
        return view("design-system.$name");
    }
}

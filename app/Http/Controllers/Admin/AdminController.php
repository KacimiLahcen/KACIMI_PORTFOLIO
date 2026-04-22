<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Qualification;
use App\Models\Review;
use App\Models\Service;
use App\Models\Skill;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $auth_user = Auth::user()->name;
        $stats = [
            'projects' => Portfolio::count(),
            'categories' => Category::count(),
            'services' => Service::count(),
            'skills' => Skill::count(),
            'reviews' => Review::count(),
            'qualifications' => Qualification::count(),
        ];

        return view('admin.index', compact('auth_user', 'stats'));
    }
}

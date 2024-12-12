<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\Utility;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $leagueRepository;
    protected $postRepository;

    public function __construct(
        UserRepository $userRepository,
        PostRepository $postRepository
    ) {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
    }

    public function dashboard()
    {
        if (Auth::check()) {

            $lisUser = $this->userRepository->index();
            $countQueryUser = clone $lisUser;
            $countUser = $countQueryUser->count();

            $lisPost = $this->postRepository->index();
            $countQueryPost = clone $lisPost;
            $countPost = $countQueryPost->count();



            return view('layouts.dashboard', compact('countUser',  'countPost'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
}

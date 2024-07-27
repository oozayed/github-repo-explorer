<?php

namespace App\Http\Controllers;

use App\Services\GitHubService;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    protected $githubService;

    public function __construct(GitHubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function index(Request $request)
    {
        return view('repos');
    }

    public function getRepos(Request $request)
    {
        $date = $request->input('date', '2019-01-10');
        $language = $request->input('language', null);
        $limit = $request->input('limit', 10);


        return $this->githubService->getPopularRepositories($date, $language, $limit);
    }
}

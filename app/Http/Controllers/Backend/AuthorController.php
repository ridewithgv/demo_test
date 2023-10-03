<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;



class AuthorController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
       $this->apiService = $apiService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
{
    $orderBy = $request->input('orderBy', 'id');
    $direction = $request->input('direction', 'ASC');
    $limit = $request->input('limit', 12);
    $page = $request->input('page', 1);

    $endpoint = "/api/v2/authors?orderBy=$orderBy&direction=$direction&limit=$limit&page=$page";

    // Make the API request using the ApiService
    $data = $this->apiService->get($endpoint);

    $items = new Collection($data['items']);
    $perPage = $data['limit']; // Items per page
    $currentPage = $data['current_page'];

    $paginatedItems = new Paginator($items, $perPage, $currentPage);
    $paginatedItems->setPath(route('author.index')); // Set the correct path for pagination links

    return view('backend.pages.author.index', ['authors' => $paginatedItems]);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('backend.pages.roles.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        
        return view('backend.pages.roles.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
       
    }
}

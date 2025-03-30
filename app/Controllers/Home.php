<?php

namespace App\Controllers;

use App\Models\MovieModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    protected $data;
    protected $movie;

    public function __construct()
    {
        $db  = db_connect();
        $this->movie = new MovieModel($db);
    }

    function show_some(string $name)
    {
        echo $name;
        die;
        echo "hello";
    }
    public function index($id = 0)
    {
        echo "work on progres...";
        die;
        $filter = $this->request->getGet('serch_filter');
        $where = '';
        $where .= "`movies.title` LIKE '%$filter%'";
        helper('custom');
        $page = $id ? $id : 1;
        $db = db_connect();
        $movie = new MovieModel($db);
        $per_page = 0;
        if ($filter) {
            $per_page += 8;
        } else {

            $per_page += 8;
        }
        $offset = ($page - 1) * $per_page;
        // Get the total number of records for pagination
        $totalMovies = $movie->countMovies($where); // Assuming you have a countAll() method in your model
        // Calculate the number of pages based on the total records and items per page
        $totalPages = ceil($totalMovies / $per_page);
        $movies = $movie->Allmovies($where, $per_page, $offset);
        // echo "<pre>";
        // var_dump($movies);
        // die;
        return view('main/allmovie', [
            'movies' => $movies,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'filter' => $filter
        ]);


        // $this->data['filter_movie'] = $filter = $this->movie->filter_by_alphabet($where);
        // echo "<pre>";
        // var_dump($filter);
        // die;
    }

    public function single($movie_id = 0)
    {
        if ($this->request->getMethod() == "get") {
            helper('custom');
            $id = decrypt($movie_id);
            $db = db_connect();
            $movie  = new MovieModel($db);
            $data['row'] = $row =  $movie->select('movies', '', array('movies.movie_id' => $id), '', true);
            return view('main/single', $data);
        } else {
            session()->setFlashdata('type', 'error');
            session()->setFlashdata('message', 'Access Denied');
            return redirect()->back();
        }
    }

    function single_page()
    {
        if ($this->request->getMethod() == "get") {
            helper('custom');
            $movie_id = $this->request->getGet('id');
            // echo "<pre>";
            // var_dump($movie_id);
            // die;
            // $id = decrypt($movie_id);
            $db = db_connect();
            $movie  = new MovieModel($db);
            $data['row'] = $row =  $movie->select('movies', '', array('movies.movie_id' => $movie_id), '', true);
            return view('main/single', $data);
        }
    }

    public function ajax_add_rating()
    {
        if ($this->request->getMethod() == "post") {
            $dataVal  = $this->request->getPost('rating');
            $id  = $this->request->getPost('id');
            $this->movie->updateData('movies', array('movies.movie_id' => $id), array('rating' => $dataVal));
        } else {
            session()->setFlashdata('type', 'error');
            session()->setFlashdata('message', 'Access Denied');
            return redirect()->back();
        }
    }

    public function ajax_serch_movies()
    {
        if ($this->request->getMethod() == "post") {
            $where = '';
            if ($this->request->getPost('searchTerm')) {
                $searchTerm = $this->request->getPost('searchTerm');
                $output = '';
                helper('custom');
                if (!empty($searchTerm)) {
                    $where .= empty($where) ? "(movies.title LIKE '%$searchTerm%' ESCAPE '!')" : "(movies.title LIKE '%$searchTerm%' ESCAPE '!')";
                    $movieSearch =  $this->movie->searchMovie('movies', $where);
                    foreach ($movieSearch as $key => $value) {
                        $output .= '<a href="' . site_url('single' . '/' . encrypt($value->movie_id)) . '">
                            <li class="list-group-item" key="' . $key . '">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="' . site_url('images/' . $value->cover_img) . '" width="40" height="40" alt="no image loading">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        ' . $value->title . '
                                    </div>
                                </div>
                            </li>
                        </a>';
                    }
                } else {
                    $output .= '';
                }
                echo $output;
            }
        }
    }


    function get_names()
    {
        $names = [
            [
                "name" => "jhon",
            ],
            [
                "name" => "good",
            ],
            [
                "name" => "beab",
            ],
            [
                "name" => "soaf",
            ],
            [
                "name" => "boter",
            ],
        ];
        $output = array();
        foreach ($names as $key => $value) {
            $output[] = $value;
        }
        // var_dump($output);
        // die;

        return $this->respond($output);
    }

    function try_test(): string
    {
        return view('movie/movie.php');
    }
}

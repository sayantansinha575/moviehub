<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;
use PSpell\Config;
use Config\Services;

class Dashboard extends BaseController
{
    protected $data;
    protected $movie;
    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
        $db = db_connect();
        $this->movie = new AdminModel($db);
    }
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function ajax_get_all_movies()
    {
        $response = array();
        $where = '';
        ##readvalue 
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $rowperpage = $this->request->getPost('length');
        $columnIndex =  $this->request->getPost('order')[0]['column'];
        $columnName =  $this->request->getPost('columns')[$columnIndex]['data'];
        $columnSortOrder =  $this->request->getPost('order')[0]['dir'];
        $keyword = $this->request->getPost('search')['value'];



        ##total number of records with filtering
        $totalRecords = $this->movie->ajax_get_all_movies_count($where);

        #total records with filtering
        $totalRecordsWithFilter = $totalRecords;
        #fetch records  

        if (!empty($keyword)) {
            $where .= empty($where) ? "(movies.title LIKE '%$keyword%' ESCAPE '!')" : " AND (movies.title LIKE '%$keyword%' ESCAPE '!')";
        }

        #fetch records
        $data = array();
        $i = $start + 1;
        $records = $this->movie->ajax_get_all_movies($rowperpage, $start, $columnSortOrder, $where);
        foreach ($records as $record) {

            $action = '<a href="javascript:void(0)" data-id="' . $record->movie_id . '" class="btn btn-info btn-sm btn-icon btn-edit"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 128 128">
            <path fill="#e1e0df" d="M82.9,14.9c-1.2,0.2-2.3,0.7-3.3,1.3C80.6,15.6,81.8,15.1,82.9,14.9z"></path><path fill="#fff" d="M17.1,113.1l36-8c1.7-0.4,3.3-1.3,4.5-2.5l52.9-52.9c3.6-3.6,3.6-9.4,0-13L91.1,17.4 c-3.6-3.6-9.4-3.6-13,0L25.2,70.3c-1.2,1.2-2.1,2.8-2.5,4.5l-7.8,36.1C14.4,112.2,15.8,113.6,17.1,113.1"></path><path fill="#fff" d="M104.1,56.3l6.5-6.5c3.6-3.6,3.6-9.4,0-13L91.2,17.3c-3.6-3.6-9.4-3.6-13,0l-6.5,6.5L104.1,56.3"></path><path fill="#f8b0b4" d="M41.6 86.4L25.4 70.2 71.7 23.9 104.1 56.3 57.8 102.6 41.6 86.4"></path><path fill="#f37c7e" d="M41.6 86.4L87.9 40.1 104.1 56.3 57.8 102.6 41.6 86.4"></path><path fill="#e7e7e7" d="M51.3 96.2L51.3 96.2c-1.3 1.3-2.8 2.3-4.7 2.6l-26.2 8.8-5.5 3.2v.2c-.4 1.1.5 2.3 1.6 2.3 0 0 0 0 .1 0 .2 0 .3 0 .5-.1l0 0 36-8c1.7-.4 3.3-1.3 4.5-2.5l.1-.1L51.3 96.2M97.7 49.8L97.7 49.8l6.3 6.4 0 0L97.7 49.8M104.1 30.4c3.6 3.6 3.6 9.4 0 13l-6.4 6.4 6.3 6.4.1.1 6.5-6.5c1.8-1.8 2.7-4.1 2.7-6.4 0-2.3-.9-4.7-2.7-6.5L104.1 30.4"></path><path fill="#dc7173" d="M97.6 49.8L51.3 96.2 57.8 102.6 104.1 56.3 104 56.2 97.6 49.8"></path><path fill="#a8b2c6" d="M14.9,110.9l2.8-15.4l15,15l-15.6,2.7C15.8,113.6,14.4,112.2,14.9,110.9z"></path><path fill="#e1e0df" d="M111.8,48.4c0.7-1,1.1-2.1,1.4-3.3C112.9,46.2,112.5,47.4,111.8,48.4z"></path><path fill="none" d="M71.7 23.9L104.1 56.3"></path><path fill="#464c55" d="M13.2,114.8c-1.3-1.3-1.7-3.1-1.2-4.7l7.9-35.9c0.6-2.3,1.6-4.3,3.3-5.9l52.8-53 c4.7-4.7,12.4-4.8,17.2-0.1l19.4,19.4c4.7,4.7,4.7,12.5,0,17.3l-52.9,52.9c-1.6,1.6-3.7,2.8-5.9,3.3L17.9,116 C16.3,116.5,14.5,116.1,13.2,114.8z M89,19.5c-2.4-2.4-6.4-2.4-8.8,0L27.3,72.4c-0.8,0.8-1.4,1.8-1.6,3l-7.6,34.4l34.4-7.6 c1.1-0.3,2.2-0.8,3-1.6l52.9-52.9c2.4-2.4,2.4-6.4,0-8.8L89,19.5z"></path>
            </svg></a>';
            $action .= '<a href="javascript:void(0)" data-id="' . $record->movie_id . '" class="btn btn-info btn-sm btn-icon btn-delete"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 100 100">
            <path fill="#f37e98" d="M25,30l3.645,47.383C28.845,79.988,31.017,82,33.63,82h32.74c2.613,0,4.785-2.012,4.985-4.617L75,30"></path><path fill="#f15b6c" d="M65 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S65 36.35 65 38zM53 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S53 36.35 53 38zM41 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S41 36.35 41 38zM77 24h-4l-1.835-3.058C70.442 19.737 69.14 19 67.735 19h-35.47c-1.405 0-2.707.737-3.43 1.942L27 24h-4c-1.657 0-3 1.343-3 3s1.343 3 3 3h54c1.657 0 3-1.343 3-3S78.657 24 77 24z"></path><path fill="#1f212b" d="M66.37 83H33.63c-3.116 0-5.744-2.434-5.982-5.54l-3.645-47.383 1.994-.154 3.645 47.384C29.801 79.378 31.553 81 33.63 81H66.37c2.077 0 3.829-1.622 3.988-3.692l3.645-47.385 1.994.154-3.645 47.384C72.113 80.566 69.485 83 66.37 83zM56 20c-.552 0-1-.447-1-1v-3c0-.552-.449-1-1-1h-8c-.551 0-1 .448-1 1v3c0 .553-.448 1-1 1s-1-.447-1-1v-3c0-1.654 1.346-3 3-3h8c1.654 0 3 1.346 3 3v3C57 19.553 56.552 20 56 20z"></path><path fill="#1f212b" d="M77,31H23c-2.206,0-4-1.794-4-4s1.794-4,4-4h3.434l1.543-2.572C28.875,18.931,30.518,18,32.265,18h35.471c1.747,0,3.389,0.931,4.287,2.428L73.566,23H77c2.206,0,4,1.794,4,4S79.206,31,77,31z M23,25c-1.103,0-2,0.897-2,2s0.897,2,2,2h54c1.103,0,2-0.897,2-2s-0.897-2-2-2h-4c-0.351,0-0.677-0.185-0.857-0.485l-1.835-3.058C69.769,20.559,68.783,20,67.735,20H32.265c-1.048,0-2.033,0.559-2.572,1.457l-1.835,3.058C27.677,24.815,27.351,25,27,25H23z"></path><path fill="#1f212b" d="M61.5 25h-36c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h36c.276 0 .5.224.5.5S61.776 25 61.5 25zM73.5 25h-5c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h5c.276 0 .5.224.5.5S73.776 25 73.5 25zM66.5 25h-2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h2c.276 0 .5.224.5.5S66.776 25 66.5 25zM50 76c-1.654 0-3-1.346-3-3V38c0-1.654 1.346-3 3-3s3 1.346 3 3v25.5c0 .276-.224.5-.5.5S52 63.776 52 63.5V38c0-1.103-.897-2-2-2s-2 .897-2 2v35c0 1.103.897 2 2 2s2-.897 2-2v-3.5c0-.276.224-.5.5-.5s.5.224.5.5V73C53 74.654 51.654 76 50 76zM62 76c-1.654 0-3-1.346-3-3V47.5c0-.276.224-.5.5-.5s.5.224.5.5V73c0 1.103.897 2 2 2s2-.897 2-2V38c0-1.103-.897-2-2-2s-2 .897-2 2v1.5c0 .276-.224.5-.5.5S59 39.776 59 39.5V38c0-1.654 1.346-3 3-3s3 1.346 3 3v35C65 74.654 63.654 76 62 76z"></path><path fill="#1f212b" d="M59.5 45c-.276 0-.5-.224-.5-.5v-2c0-.276.224-.5.5-.5s.5.224.5.5v2C60 44.776 59.776 45 59.5 45zM38 76c-1.654 0-3-1.346-3-3V38c0-1.654 1.346-3 3-3s3 1.346 3 3v35C41 74.654 39.654 76 38 76zM38 36c-1.103 0-2 .897-2 2v35c0 1.103.897 2 2 2s2-.897 2-2V38C40 36.897 39.103 36 38 36z"></path>
            </svg></a>';

            $data[] = array(
                'id' => $i++,
                'title' => $record->title,
                'description' => $record->description,
                'Genre' => $record->Genre,
                'cover_img' => '<img src="' . site_url('images/' . $record->cover_img) . '" width="20px" alt="movieImages">',
                'action' => $action,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $data,
        );
        return $this->response->setJSON($response);
    }

    public function ajax_handel_edit_row()
    {
        $this->data['success'] = false;
        if ($this->request->getMethod() == 'post') {
            if (!empty($this->request->getPost('id'))) {
                $this->data['result'] = $this->movie->ajax_get_single_movie(array('movie_id' => $this->request->getPost('id')));
                $this->data['success'] = true;
                return $this->response->setJSON($this->data);
            }
        } else {
            $this->data['message'] = "Something Wennt Wrong";
            return $this->response->setJSON($this->data);
        }
    }

    public function movie_add_update()
    {
        $this->data['success'] = false;
        if ($this->request->getMethod() == "post") {
            $rules = [
                'movie_title' => ['label' => 'title', 'rules' => 'required'],
                'movie_description' => ['label' => 'description', 'rules' => 'required'],
                'movie_genere' => ['label' => 'genre', 'rules' => 'required'],
                'slug' => ['label' => 'slug', 'rules' => 'required'],
            ];
            if ($this->validate($rules)) {

                $data = array(

                    'title' => trim($this->request->getPost('movie_title')),
                    'description' => trim($this->request->getPost('movie_description')),
                    'Genre' => trim($this->request->getPost('movie_genere')),
                    'slug' => trim($this->request->getPost('slug')),
                );

                if (isset($_FILES['movie_image']) && $_FILES['movie_image']['error'] == 0) {
                    $allowtypes  = array("image/jpg", "image/png", "image/gif");
                    $maxFileSize = 5 * 1024 * 1024; // 5 MB
                    if (!in_array($_FILES['movie_image']['type'], $allowtypes)) {
                        $this->data['message'] = "Unsuported File Type";
                        echo json_encode($this->data);
                        die;
                    }
                    if (($_FILES['movie_image']['size'] > $maxFileSize)) {
                        $this->data['message'] = "File Size Exccessed its Limit";
                        echo json_encode($this->data);
                        die;
                    }
                    $fileName = uniqid() . "_" . basename($_FILES["movie_image"]["name"]);
                    move_uploaded_file($_FILES['movie_image']['tmp_name'], 'images/' . $fileName);
                    $data['cover_img'] = $fileName;
                }


                if (empty($this->request->getPost('id'))) {
                    if ($this->movie->add('movies', $data)) {
                        $this->data['success'] = true;
                        $this->data['message'] = "Movie Add Successful";
                        return $this->response->setJSON($this->data);
                    } else {
                        $this->data['message'] = "Something Went Wrong";
                        return $this->response->setJSON($this->data);
                    }
                } else {
                    $this->movie->updateData('movies', array('movie_id' => $this->request->getPost('id')), $data);
                    $this->data['success'] = true;
                    $this->data['message'] = "Movie Update Successful";
                    return $this->response->setJSON($this->data);
                }
            } else {
                $this->data['error'] = $this->validation->getErrors();
                return $this->response->setJSON($this->data);
            }
        } else {
            $this->data['message'] = "Access Denid";
            return $this->response->setJSON($this->data);
        }
    }

    public function ajax_handel_delete_row()
    {
        $this->data['success'] = false;
        if ($this->request->getMethod() == "post") {
            if (!empty($this->request->getPost('id'))) {
                if ($this->movie->updateData('movies', array('movie_id' => $this->request->getPost('id')), array('is_deleted' => 1))) {
                    $this->data['success'] = true;
                    $this->data['message'] = "Movie Deleted Successful";
                    return $this->response->setJSON($this->data);
                } else {
                    $this->data['message'] = "Something Went Wrong";
                    return $this->response->setJSON($this->data);
                }
            }
        } else {
            $this->data['message'] = "Access Denied";
            return $this->response->setJSON($this->data);
        }
    }
}

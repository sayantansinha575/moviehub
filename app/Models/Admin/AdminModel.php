<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function __construct($db)
    {
        $this->db = &$db;
        $this->builder = $this->db->table('movies');
    }

    public function ajax_get_all_movies($rowperpage, $offset, $columnsortorder = '', $where = '')
    {
        $this->builder->select('*');
        if ($where) {
            $this->builder->where($where);
        }
        $this->builder->where('movies.is_deleted', 0);
        $this->builder->orderBy('movies.movie_id', 'DSC');
        $this->builder->limit($rowperpage, $offset);
        $data =   $this->builder->get()->getResult();
        return $data;
    }

    public function ajax_get_all_movies_count($where = '')
    {
        $this->builder->select('*');
        if ($where) {
            $this->builder->where($where);
        }
        $this->builder->where('movies.is_deleted', 0);
        $data =  $this->builder->countAllResults();
        return $data;
    }

    public function ajax_get_single_movie($where = array())
    {
        $this->builder->select('*');
        $this->builder->where($where);
        $data = $this->builder->get()->getRow();
        return $data;
    }

    public function updateData($table = '', $where = array(), $data = array())
    {
        $db = db_connect();
        if (!empty($table) && !empty($where) && !empty($data)) {
            $output =  $db->table($table)
                ->where($where)
                ->update($data);
            return $output;
        }
    }

    public function add($table = '', $data = array())
    {
        if (!empty($table) && !empty($data)) {
            $db  = db_connect();
            $bulilder = $db->table($table);
            if ($bulilder->insert($data)) {
                return $db->insertID();
            }
        }
    }
}

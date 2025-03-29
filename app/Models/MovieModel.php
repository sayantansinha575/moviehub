<?php

namespace app\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use PhpParser\Node\Scalar\MagicConst\Function_;

class MovieModel extends Model
{
    // protected $table          = 'movies';
    // protected $primaryKey     = 'id';
    // protected $returnType     = 'object';
    // protected $useSoftDeletes = false;
    // protected $allowedFields  = [
    //     'movie_id',
    //     'title',
    //     'Genre',
    //     'cover_img',
    //     'description',
    //     'url',
    //     'release_date',
    // ];

    // protected $useTimestamps      = true;
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->builder = $this->db->table('movies');
    }

    public function Allmovies($where = '', $offset = 0, $rowPerpage = 0)
    {
        $this->builder->select('*');
        if ($where) {
            $this->builder->where($where);
        }
        $this->builder->where('movies.is_deleted', 0);
        $this->builder->limit($offset, $rowPerpage);
        // if ($serchTerm) {
        //     $this->builder->like('title', $serchTerm);
        // }
        $data = $this->builder->get()->getResult();
        return $data;
    }


    public function countMovies($where = '')
    {
        $this->builder->select('*');
        if ($where) {
            $this->builder->where($where);
        }
        $this->builder->where('movies.is_deleted', 0);
        $data = $this->builder->countAllResults();
        return $data;
    }

    // public function select($table = '', $select = '', $where = array(), $isrow = false)
    // {
    //     if (!empty($table)) {
    //         $db  = db_connect();
    //         $table =  $db->table($table);
    //     }
    //     if (empty($select)) {
    //         $select = '*';
    //     }
    //     if (!empty($where)) {
    //         $tab =  $table->select($select)
    //             ->where($where);
    //     }
    //     if ($isrow) {
    //         $data =  $tab->get()->getResult();
    //     } else {
    //         $data = $tab->get()->getRow();
    //     }
    //     return $data;
    // }

    public function select($table, $select = '', $where = array(), $orderBy = array(), $singleRow = false, $groupBy = '', $whrNotInCol = '', $whrNotInData = array())
    {
        if (!empty($table)) {
            if (empty($select)) {
                $select = '*';
            }
            $db = db_connect();
            $builder = $db->table($table);
            $builder->select($select);

            if (!empty($where)) {
                $builder->where($where);
            }
            if (!empty($whrNotInData) && !empty($whrNotInCol)) {
                $builder->whereNotIn($whrNotInCol, $whrNotInData);
            }
            if (!empty($orderBy)) {
                $builder->orderBy($orderBy);
            }
            if (!empty($groupBy)) {
                $builder->groupBy($groupBy);
            }
            if (!empty($singleRow)) {
                $data = $builder->get()->getRow();
            } else {
                $data = $builder->get()->getResult();
            }
            if (!empty($data)) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getMovie($id = 0)
    {
        $this->builder->select('*');
        $this->builder->where('movie_id', $id);
        $data =  $this->builder->get()->getRow();
        return $data;
    }

    public function updateData($table = '', $where = array(), $data = array())
    {
        if (!empty($table) && !empty($where) && !empty($data)) {
            $db = db_connect();
            $data = $db->table($table)
                ->where($where)
                ->update($data);
            return $data;
        }
    }

    public function searchMovie($table = '', $where = '')
    {
        if (!empty($table) && !empty($where)) {
            $db = db_connect();
            $data = $db->table($table)
                ->select('*')
                ->where($where)
                ->get()->getResult();
            return $data;
        }
    }

    function filter_by_alphabet($where = '')
    {
        $db = db_connect();
        $builder = $db->table('movies')->select('*')->where($where)->get()->getResult();
        return $builder;
    }
}

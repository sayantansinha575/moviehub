<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Setting_Model extends Model
{
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
}

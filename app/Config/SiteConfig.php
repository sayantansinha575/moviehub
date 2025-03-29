<?php

use CodeIgniter\Config\BaseConfig;
use Config\Database;

class SiteConfig extends BaseConfig
{

    public function __construct()
    {
        parent::__construct();
        #general setting
        $db = Database::connect();
        $genSetArray = array();
        $genArray = $db->query('SELECT * FROM setting WHERE  `setting_type`="general"')->getResult();
        if (!empty($genArray)) {
            foreach ($genArray as  $value) {
                $genSetArray[strtoupper($value->name)] = $value->value;
            }
        }

        $this->general = $genSetArray;
        #general setting

        #meta  setting
        $metaArraay = array();
        $meta =  $db->query('SELECT * FROM setting WHERE  `setting_type`="meta"')->getResult();
        if (!empty($meta)) {
            foreach ($meta as  $value) {
                $metaArraay[strtoupper($value->name)] = $value->value;
            }
        }
        $this->meta = $metaArraay;
        #meta setting
    }
}

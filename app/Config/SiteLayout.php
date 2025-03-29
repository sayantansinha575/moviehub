<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class SiteLayout extends BaseConfig
{
    public $viewLayout = 'include/layout';
    public $singleLayout = 'include/single_layout';

    public $adminLayout = 'admin/layout';
}

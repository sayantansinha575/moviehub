<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Setting_Model;
use App\Models\Admin\AdminModel;

class Setting extends BaseController
{
    protected $data;
    protected $setting;
    protected $crud;
    public function __construct()
    {
        $db = db_connect();
        $this->setting = new Setting_Model($db);
        $this->crud = new  AdminModel($db);
    }

    public function index()
    {
        if ($this->request->getMethod() == 'get') {
            $this->data['title'] = "General Setting";
            $this->data['url'] = site_url('admin/site-setting/update/general');
            $this->data['settings'] = $settings = $this->setting->select('setting', '', array('sett_type' => 1), 'serial_number ASC');
            if (empty($settings)) {
                session()->setFlashdata('message', "There's nothing to change in this page");
                session()->setFlashdata('message_type', "error");
                return redirect()->to('admin/dashboard');
                die;
            }
            return view('admin/setting', $this->data);
        }
    }
    public function meta_setting()
    {
        if ($this->request->getMethod() == 'get') {
            $this->data['title'] = "Meta Setting";
            $this->data['url'] = site_url('admin/site-setting/update/meta');
            $this->data['settings'] = $settings = $this->setting->select('setting', '', array('sett_type' => 2), 'serial_number ASC');
            return view('admin/setting', $this->data);
        }
    }

    public function update_setting($type = 0)
    {
        $this->data['success'] = false;
        if ($this->request->getMethod() == "post") {
            foreach ($_POST as $key => $value) {
                $this->crud->updateData('setting', array('name' => $key, 'setting_type' => $type), array('value' => $value));
            }

            $path = 'assest/sitelogo';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            foreach ($_FILES as $key => $value) {
                if ($value['error'] == 0) {
                    $image_name =  uniqid() . "_" . basename($value['name']);
                    if (move_uploaded_file($value['tmp_name'], $path . "/" . $image_name)) {
                        $this->crud->updateData('setting', array('name' => $key, 'setting_type' => $type), array('value' => $image_name));
                    }
                }
            }
            $this->data['success'] = true;
            $this->data['message'] = "Setting Update Successful";
            return $this->response->setJSON($this->data);
        }
    }
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'utils/string_helper.php';
class Unit extends CI_Controller
{

    public $auth;
    private $messages = '0';

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();
    }

    public function index()
    {
        if ($this->auth == null || !in_array(3, $this->auth['group_permission']))
            $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');
        $data['seo']['title'] = "Phần mềm quản lý bán hàng";
        $data['data']['user'] = $this->auth;
        $store = $this->db->from('stores')->get()->result_array();
        $data['data']['store'] = $store;
        $store_id = $this->db->select('store_id')->from('users')->where('id', $this->auth['id'])->limit(1)->get()->row_array();
        $data['data']['store_id'] = $store_id['store_id'];
        $data['template'] = 'units/index';
        $this->load->view('layout/index', isset($data) ? $data : null);
    }


    public function cms_delete_unit($id)
    {
        $this->db->delete('units', ['Id' => $id]);
        echo $this->messages = "1";
    }

    public function cms_add_unit()
    {
        $data = $this->input->post('data');
        $data = $this->cms_common_string->allow_post($data, ['name',]);
        $unit = array();
        if (isset($data['Id'])) {
            $id = $data['Id'];
            $unit['name'] = strtoupper(vn_str_filter($data['name']));
            $this->db->where('Id', $id)->update('units', $data);
            echo $this->messages = "1";
        } else {
            $unit['name'] = strtoupper(vn_str_filter($data['name']));
            $this->db->insert('units', $unit);
            echo $this->messages = "1";
        }
    }
    public function cms_info_unit($id)
    {
        $data = $this->db->from('units')->where('id', $id)->get()
            ->row_array();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function cms_paging_unit($page = 1)
    {
        $option = $this->input->post('data');
        $total_prd = 0;
        $config = $this->cms_common->cms_pagination_custom();
        $total_prd = $this->db
            ->from('units')
            ->where("(name LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
            ->count_all_results();
        $data['data']['_list_units'] = $this->db
            ->select('*')
            ->from('units')
            ->limit($config['per_page'], ($page - 1) * $config['per_page'])
            ->order_by('created', 'desc')
            ->where("(name LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
            ->get()
            ->result_array();

        $config['base_url'] = 'cms_paging_unit';
        $config['total_rows'] = $total_prd;
        $this->pagination->initialize($config);
        $_pagination_link = $this->pagination->create_links();
        $data['data']['_sl_unit'] = $total_prd;
        $data['data']['_pagination_link'] = $_pagination_link;
        if ($page > 1 && ($total_prd - 1) / ($page - 1) == 10)
            $page = $page - 1;
        $data['data']['page'] = $page;
        $this->load->view('ajax/units/list_units', isset($data) ? $data : null);
    }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_DB_query_builder $db
 * @property CI_Loader $load
 * @property CI_Config config
 * @property CI_Session session
 * @property CI_Lang lang
 * @property CI_Security security
 * @property ion_auth|ion_auth_model $ion_auth
 * @property ion_auth_model ion_auth_model
 */
class Group_model extends CI_Model
{
    private $tables;

    public function __construct()
    {
        parent::__construct();

    }

    function check_groupname()
    {
        $groupname = $this->input->post('groupname');
        $this->db->where('name', $groupname);
        $this->db->from($this->ion_auth_model->tables['groups']);
        $result = $this->db->count_all_results();

        if ($result > 0) {
            return false;
        } else {
            return true;
        }

    }

    function update_group($group_id)
    {
        $return = new stdClass();


        if (!$group_id || empty($group_id)) {
            $return->status = 'error';
            $return->msg = 'Unable to update group: No group id given';
            return $return;
        } else if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            $return->status = 'error';
            $return->msg = 'Unable to update group: Permission error';
            return $return;
        }

        $group = $this->ion_auth->group($group_id)->row();

        $readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? TRUE : FALSE;

        if ($readonly) {
            $return->status = 'error';
            $return->msg = 'Admin Group cannot be Edited !!!';
            return $return;
        }
        // validate form input
        $this->form_validation->set_rules('group_name', 'group name', 'required|alpha_dash');
        $this->form_validation->set_rules('group_level', 'group level', 'required');
        $this->form_validation->set_rules('wm_opacity', 'Watermark Opacity', 'required|integer');
        $this->form_validation->set_rules('group_active', 'Group Active', 'required|integer');
        $this->form_validation->set_rules('group_level', 'Group Level', 'required|integer');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_name = $this->input->post('group_name');
                $description = $this->input->post('description');
                $wm_opacity = (int)$this->input->post('wm_opacity');
                $group_level = $this->input->post('group_level');
                $group_active = $this->input->post('group_active');
                $data = [
                    'description' => $description,
                    'wm_opacity' => $wm_opacity,
                    'group_level' => $group_level,
                    'group_active' => $group_active

                ];
                $group_update = $this->ion_auth->update_group($group_id, $group_name, $data);

                if ($group_update) {
                    $return->msg = 'Group updated Successfully';
                    $return->status = 'success';
                    $active = $this->input->post('group_active');

                    $this->activate_group($group_id, $active);
                    $this->update_group_level($group_id, $group_level);
                } else {
                    $msg = 'Unable to update group ' . (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                    return $this->re('e',$msg);
                }

            } else {
                $msg = 'Unable to update group ' . (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                return $this->re('e',$msg);
            }


        } else {
            $msg = 'Unable to update group ' . (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            return $this->re('e',$msg);

        }


        return $return;

    }

    function activate_group($group_id = NULL, $active = NULL)
    {
        $return = new stdClass();
        if ($group_id == NULL) {
            $group_id = $this->input->post('group_id');
        }
        if ($active == NULL) {
            $active = $this->input->post('status');
        }

        if (empty($group_id)) {

            $return->status = 'error';
            $return->msg = "Unable to Update group";
            return $return;
        }

        $edited_group = $this->group($group_id);
        $admin_group_name = $this->config->item('admin_group', 'ion_auth');
        $default_group_name = $this->config->item('default_group', 'ion_auth');
        if (strcasecmp($admin_group_name, $edited_group->name) == 0) {
            $return->msg = "Unable to Update Admin group.<br> Note: Admin group and default User group can not be edited !!!";
            $return->status = 'error';
            return $return;
        }

        if (strcasecmp($default_group_name, $edited_group->name) == 0) {
            $return->msg = "Unable to Update Default user group.<br> Note: Admin group and default User group can not be edited !!!";
            $return->status = 'error';
            return $return;
        }


        $active = abs($active);
        $result = $this->db->set('group_active',$active)->where('id', $group_id)->update($this->ion_auth_model->tables['groups']);

        $group_users = $this->group_users($group_id);

        foreach($group_users as $k => $user){
            if($user->id == 1){
                $return->status = 'error';
                $return->msg = "Unable to Update group";
                return $return;
            }
            if($active == 1){
                $this->user_model->activate_user($user->id);
            }else{
                $this->user_model->deactivate_user($user->id);
            }


        }



        if ($result) {
            $return->status = 'success';
            $return->msg = "Group Updated Successfully";
        } else {
            $return->status = 'error';
            $return->msg = "Unable to Update group";
        }
        return $return;

    }

    function get_group($group_id = NULL)
    {
        if(NULL===$group_id){
            return FALSE;
        }
        $group_id = abs($group_id);
        return $this->ion_auth->group($group_id)->row();
    }

    function group($group_id = NULL)
    {
        if(NULL===$group_id){
            return FALSE;
        }
        $group_id = abs($group_id);
        return $this->ion_auth->group($group_id)->row();
    }

    function get_group_name($group_id = NULL)
    {
        $r = $this->group($group_id);
        if (isset($r->name)) {
            return $r->name;

        }
       return false;
    }


    function integer($value)
    {
        if ($value == "false" || $value == "0" || $value == FALSE) {
            return 0;
        } else if (!empty($value)) {
            return 1;
        } else {
            return 0;
        }
    }

    function update_group_level($group_id, $group_level)
    {
        $data['group_level'] = $group_level;
        $data['date_updated'] = time();
        $this->db->where('id', $group_id);
        $result =  $this->db->update($this->ion_auth_model->tables['groups'], $data);
        return $result;


    }

    function group_users($group_id)
    {
        return $this->ion_auth->users($group_id)->result();
    }

    function selected_group_levels()
    {
        $groups = $this->groups();
        $selected_levels = [];
        foreach ($groups as $k => $group) {
            $group_level = intval($group->group_level);
            $selected_levels[$group_level] = $group->name;
        }
        return $selected_levels;
    }

    function get_groups(){
        return $this->groups();
    }

    function groups()
    {
        return  $this->ion_auth->groups()->result();
    }

    function group_users_count($group_id = NULL)
    {
        $group_users = NULL;
        if (!$group_id) {
            $groups = $this->ion_auth->groups()->result();
            foreach ($groups as $key => $val) {
                $group_users[$val->id] = count($this->ion_auth->users($val->id)->result());
            }
            return $group_users;
        } else {
            $group_users = count($this->ion_auth->users($group_id)->result());
            return $group_users;
        }
    }

    function update_user_group($user_id, $group_id)
    {
        $this->ion_auth->remove_from_group(NULL, $user_id);
        $result = $this->ion_auth->add_to_group($group_id, $user_id);
        return $result;
    }

    function get_total_group_users()
    {
        $groups = $this->ion_auth->groups()->result();
        $group_users = [];
        foreach ($groups as $key => $val) {
            $group_users[$val->id] = count($this->ion_auth->users($val->id)->result());
        }
        return $group_users;


    }

    function create_group()
    {

        // validate form input
        $this->form_validation->set_rules('groupname', 'Group Name', 'required|alpha_dash');

        if ($this->form_validation->run() == TRUE) {

            $new_group_id = $this->ion_auth->create_group($this->input->post('groupname'), $this->input->post('description'));
            if ($new_group_id) {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                //redirect("auth", 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->_render_page('auth/create_group', $this->data);
        }
    }

    function add_group()
    {
        $return = new stdClass();
        $group_name = (string)$this->input->post('groupname');
        $group_desc = (string)$this->input->post('description');
        $this->form_validation->set_rules('groupname', 'Group Name', 'required|alpha_dash');

        if ($this->form_validation->run() == TRUE) {

            $group_level = abs($this->input->post('grouplevel'));
            $is_group_level_exist = $this->check_group_level_exist($group_level);

            if ($is_group_level_exist) {
                $return->msg = 'Unable to add group. This group level already exist !!!';
                $return->status = 'error';

                return $return;
            }


            $new_group_id = $this->ion_auth->create_group($group_name, $group_desc, array('group_level' => $group_level));
            if (abs($new_group_id) > 0) {
                $data['group_level'] = $group_level;

                $data['group_active'] = abs($this->input->post('group_active'));
                $data['date_added'] = $data['date_updated'] = time();
                $this->db->where('id', $new_group_id);
                $this->db->update($this->ion_auth_model->tables['groups'], $data);
                $return->msg = "New group added Successfully";
                $return->status = 'success';
                return $return;
            } else {


                $return->msg = "Unable to add new group.  !!!";
                $return->status = 'error';
                return $return;
            }

        } else {

            $system_msg = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $return->msg = "Unable to add new group !!!" . $system_msg;
            $return->status = 'error';

        }
        return $return;
    }

    function check_group_level_exist($group_level)
    {
        $group_level = abs($group_level);
        $this->db->from($this->ion_auth_model->tables['groups']);
        $this->db->where('group_level', $group_level);
        $result = $this->db->get()->row();
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    function del_group($group_id = NULL)
    {
        if($group_id == NULL){
            $group_id = abs($this->input->post('group_id'));
        }else{
            $group_id = abs($group_id);
        }
        $return = new stdClass();

        if($group_id == 1 || $group_id == 2){
            $return->status = 'error';
            $return->msg = 'Unable to complete request.  !!!';
            return $return;
        }

        $users_in_group = $this->group_users($group_id);

        if(!empty($users_in_group)){
            foreach($users_in_group as $k => $user){
                $this->ion_auth->remove_from_group($group_id, $user->id);
                $this->ion_auth->add_to_group(2,  $user->id);

            }

        }


        $result =  $this->ion_auth->delete_group($group_id);

        if($result){
            $return->status = 'success';

        }else{
            $return->status = 'error';
            $return->msg = 'Unable to complete request.  !!!';
        }

        return $return;
    }

    function check_group_name(){
        $group_name = $this->settings_model->get_encoded_text($this->input->post('group_name'));
        $return = new stdClass();
        if(strlen($group_name)< 1){
            $return->status = 'success';
            return $return;
        }

        $result = $this->db->from($this->ion_auth_model->tables['groups'])->where('name',$group_name)->get()->num_rows();


        if($result < 1){
            $return->status = 'success';

        }else{
            $return->status = 'error';
            $return->msg = 'There is already another Group with same Name !!!';
        }

        return $return;


    }

    function update_group_total_users(){

        $groups =  $this->get_total_group_users();
        $data = [];
        foreach($groups as $group_id => $total_users){
            $row = new stdClass();
            $row->id = $group_id;
            $row->total_users = $total_users;
            $data[] = $row;
        }

       return $this->db->update_batch($this->ion_auth_model->tables['groups'], $data, 'id');


    }

    /**
     * @param null $status
     * @param null $msg
     * @param null $data
     * @param null $pulsate
     *
     * @return \stdClass
     */
    public function re ($status = NULL, $msg = NULL, $data = NULL, $pulsate = NULL)
    {
        $return = new stdClass();

        if ($status === 's')
        {
            $return->status = 'success';
        } else
        {
            $return->status = 'error';
        }

        if (NULL !== $msg)
        {
            $return->msg = $msg;
        } else
        {
            if ($status !== 's')
            {

                $return->msg = 'Unable to Complete Request !!!';
            }

        }

        if (NULL !== $data)
        {
            $return->data = $data;
        }
        if (NULL !== $pulsate)
        {
            $return->pulsate = $pulsate;
        }

        return $return;

    }

}

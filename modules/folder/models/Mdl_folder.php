<?php

class Mdl_folder extends CI_Model{

    public function getUserId($username )
    {
        $query = $this->db->select(['user_id'] )
                        ->from('users')
                        ->where(['user_login'=>$username])
                        ->get( );

        if( $query->row() )
        {
            return  $query->row()->user_id;
        }
        else {
            return 0;
        }
    }

    public function getFolderCount($_userid)
    {
        $query = $this->db->select('id, COUNT(id) as foldercount' )
                          ->where(['user_id'=>$_userid, 'status'=>1])
                          ->group_by('id')
                          ->get( 'folder' );
        return $query->num_rows();
    }

    public function getFolderInfo($_userid)
    {
        $search_folder = $this->input->post('new_search');
        if($search_folder != '')
        {
            $query = $this->db->select(['id', 'foldername', 'create_date', 'shared_permission'] )
                ->from('folder')
                ->where(['user_id'=>$_userid, 'status'=>1, 'parent_id'=>0, 'parent_userid'=>0])
                ->like('foldername', $search_folder)
                ->order_by("create_date", "desc")
                ->get( );
        }else{
            $query = $this->db->select(['id', 'foldername', 'create_date', 'shared_permission'] )
                ->from('folder')
                ->where(['user_id'=>$_userid, 'status'=>1, 'parent_id'=>0, 'parent_userid'=>0])
                ->order_by("create_date", "desc")
                ->get( );
        }

        return $query->result();
    }

    public function getSharedFolderInfo($_userid)
    {
        $query = $this->db->select(['id', 'foldername', 'create_date', 'shared_permission'] )
            ->from('folder')
            ->where(['user_id'=>$_userid, 'status'=>1])
            ->order_by("create_date", "desc")
            ->get( );
        return $query->result();
    }

    public function getAllSurvey($_userid)
    {
        $sm_search = $this->input->post('sm_search');
        if($sm_search != "")
        {
            $query = $this->db->select(['link_folderid', 'title', 'modified_date', 'id'] )
                ->where(['survey_user_id'=>$_userid, 'status'=>1])
                ->like('title', $sm_search)
                ->order_by("title", "desc")
                ->get( 'survey' );
        }else{
            $query = $this->db->select(['link_folderid', 'title', 'modified_date', 'id'] )
                ->where(['survey_user_id'=>$_userid, 'status'=>1])
                ->order_by("title", "desc")
                ->get( 'survey' );
        }

        return $query->result();
    }

    public function getFolderName($_userid, $link_folder_id)
    {
        $query = $this->db->select('foldername' )
            ->where(['user_id'=>$_userid, 'status'=>1, 'id'=>$link_folder_id])
            ->get( 'folder' );
        if($query->row())
        {return $query->row();}
        else {return false;}
    }

    public function getFolderId($_userid, $folderName)
    {
        $q = $this->db->select('id')
            ->where(['user_id'=>$_userid, 'status'=>1, 'foldername'=>$folderName])
            //->like( 'foldername', $folderName )
            ->get('folder');

        if($q->row())
        {
             return $q->row()->id;
        }
        else {
            return redirect("/folder/{$this->input->cookie('ppUser', false)}");
        }
    }

    public function addSurveys()
    {
        $input_sm_id = $this->input->post('input_sm_id');
        $input_sm_id_remove = $this->input->post('input_sm_id_remove');
        $folderId = $this->input->post('folderId');
        $foldername = $this->input->post('foldername');
        $userid = $this->input->post('user_id');
        $modified_date = now(); //Current date
        $input_sm_id_arr = explode(",", $input_sm_id);
        foreach ($input_sm_id_arr as $surveyid):
            //echo "UPDATE survey SET link_folderid= '$folderId',modified_date='$modified_date' WHERE id=$surveyid LIMIT 1";
             $this->db->query("UPDATE survey SET link_folderid= '$folderId',modified_date='$modified_date' WHERE id=$surveyid LIMIT 1");
        endforeach;
    }
    public function getSurveyCount($_userid, $folder_id)
    {

        $query = $this->db->select('id, COUNT(id) as surveycount' )
                          ->where(['survey_user_id'=>$_userid, 'status'=>1, 'link_folderid'=>$folder_id])
                          ->group_by('id')
                          ->get( 'survey' );
        return $query->num_rows();
    }

    public function checkFoldername($user_id, $folder_name)
    {
        $query = $this->db->query("SELECT COUNT(id) as 'count_folder' FROM folder WHERE user_id = '$user_id' AND foldername = '$folder_name'");

        $_check_folder = $query->row()->count_folder;
        if($_check_folder == 0)
        {
            return 'not_a_folder';
        }

    }
    public function viewSurvey($user_id, $folder_name)
    {
        $query = $this->db->query("SELECT s.id as 'survey_id', s.title as 'title', s.modified_date as 'modified_date' FROM survey s, folder f WHERE f.id=s.link_folderid AND s.status != 0 AND s.survey_user_id = '$user_id' AND f.status='1' AND f.user_id='$user_id' AND f.foldername='".trim($folder_name)."' ORDER BY s.title" );

        return $query->result();

    }
    public function add_folder($folder_name,$user_id,$username)
    {
        require_once($_SERVER['DOCUMENT_ROOT'].'/api/ipbwi/ipbwi.inc.php');
        $forum_userid = $ipbwi->member->name2id($username);

        $query = $this->db->query("SELECT COUNT(id) as 'count_folder' FROM folder WHERE user_id = '$user_id' AND foldername = '$folder_name'");

        $_exist_folder = $query->row()->count_folder;
        if($_exist_folder > 0) //if folder name all ready exist
        {
           return 'exists';
        }
        else
        {
            $_creatDate = date('Y-m-d H:i:s',now()); //Current date
            $data = array(
                'id'=>'',
                'user_id' => $user_id,
                'userid' => $forum_userid,
                'foldername' => $folder_name,
                'create_date' => $_creatDate,
                'last_update_date' => $_creatDate,
                'status' => '1'
            );
            return  $this->db->insert('folder', $data);
        }

    }

    public function delete_folder($folder_id)
    {
       //return $this->db->delete('folder', array('id' => $folder_id));
        $this->db->delete('folder', array('id' => $folder_id));
        $this->db->delete('folder', array('parent_id'=>$folder_id));
    }

    public function delete_survey($surveyid)
    {
        $modified_date = now(); //Current date
        $this->db->query("UPDATE survey SET link_folderid= '0',modified_date='$modified_date' WHERE id=$surveyid LIMIT 1");
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function delete_selected_survey($userid)
    {
        //$folderId = $this->input->post('folderId');
       // $foldername = $this->input->post('foldername');
       // $userid = $this->input->post('userid');
        $del_select_sm_id = $this->input->post('del_select_sm_id');
        $del_sm_id_arr = explode(",", $del_select_sm_id);
        $modified_date = now(); //Current date
        foreach ($del_sm_id_arr as $surveyid):
            $this->db->query("UPDATE survey SET link_folderid= '0',modified_date='$modified_date' WHERE id=$surveyid LIMIT 1");
        endforeach;
    }

    public function update_folder($args)
    {
        $query = $this->db->query("SELECT COUNT(id) as 'count_folder' FROM folder WHERE user_id = '$args[0]' AND foldername = '$args[1]'");

        $_exist_folder = $query->row()->count_folder;
        if($_exist_folder > 0) //if folder name all ready exist
        {
            $error= 'exists';
        }
        else
        {
            $_creatDate = date('Y-m-d H:i:s',now());
            $modified_date =  now(); //Current date

            $error= $this->db->query("UPDATE folder SET  foldername = '".$args[1]."', create_date = '".$_creatDate."', last_update_date = '".$modified_date."'  WHERE id='".$args[2]."' AND status= '1'");
            $error= $this->db->affected_rows();
        }
        return $error;
    }

    public function user_details($username)
    {
        $query = $this->db->select(['RecurlyAccount','parent_account','subaccount','user_id','Customer','PurchasedPlanCode','freetrial_status','user_login','user_level'])
            ->where('user_login', $username)
            ->get( 'users' );
        return $query->row();
    }

    public function get_instructor_info($user_id, $url_recurly_unique_id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE (parent_account =".$user_id." AND parent_account != 0) OR  (RecurlyAccount ='$url_recurly_unique_id' AND RecurlyAccount != '') AND user_id !=".$user_id."");
        return $query->result();
    }

    public function get_shared_info($userid, $folderid, $foldername )
    {
        $query = $this->db->query("select fo.shared_permission, u.* from  folder as fo , users as u where fo.parent_id=".$folderid." and fo.foldername='".$foldername."' and fo.parent_userid=".$userid." and fo.user_id=u.user_id");
        return $query->result();
    }

    public function get_instructor_count($userid, $folderid)
    {
        $query = $this->db->select('id, COUNT(id) as foldercount' )
            ->where(['parent_id'=>$folderid, 'parent_userid'=>$userid])
            ->group_by('id')
            ->get( 'folder' );
        return $query->num_rows();
    }

    public function invite_insert_instruct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'].'/api/ipbwi/ipbwi.inc.php');

        $foldername = $this->input->post('foldername');
        $username = $this->input->post('username');
        $user_id = $this->input->post('user_id');
        $folder_id = $this->input->post('folder_id');
        $per_data = $this->input->post('per_data');
        $permission_arr = explode(",", $per_data);
        $count_val = count($permission_arr);

        $this->db->query("DELETE FROM folder WHERE foldername ='$foldername' and  parent_id = $folder_id and parent_userid = $user_id");

        foreach ($permission_arr as $per_name):
            $per_id = explode("per_sel_",$per_name);
            if(isset($_POST[$per_name])){
            $post_val_each = $_POST[$per_name];

            $forum_shared_userid = $ipbwi->member->name2id($_POST['share_name_'.$per_id[1]]);
            $this->db->query("insert into folder(user_id,userid,foldername,status,parent_id,shared_permission,parent_userid)values('$per_id[1]','$forum_shared_userid','$foldername','1','$folder_id','$post_val_each','$user_id')");
            }
        endforeach;
        //echo $this->db->last_query();
        //echo $this->db->affected_rows();
    }

}
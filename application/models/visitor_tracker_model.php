<?php
class Visitor_tracker_model extends CI_Model
{
    public function getVisitorRecord($siteUrl, $userAgent, $ip)
    {
        $this->db->select('id, site_url, user_agent, ip_address, created_at');
        $this->db->where('site_url', $siteUrl);
        $this->db->where('user_agent', $userAgent);
        $this->db->where('ip_address', $ip);

        //fetching records with in last one hour
        $this->db->where('created_at >= DATE_SUB(NOW(),INTERVAL 1 HOUR)');

        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('visitors_records');
        $result = $query->row_array();

        return $result;
    }

    public function saveVisitRecord($siteUrl, $userAgent, $ip)
    {

        // for localhost adding only the project name from given url
        $siteUrl = explode('/', $siteUrl);
        $siteUrl = $siteUrl[3];
        
        $data = array(
            'site_url' => $siteUrl,
            'user_agent' => $userAgent,
            'ip_address' => $ip
        );
        $this->db->insert('visitors_records', $data);
        return $this->db->insert_id();
    }

    public function getAllVisitorRecords(){
        $this->db->select('id, site_url, user_agent, ip_address, created_at');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('visitors_records');
        $result = $query->result_array();
        return $result;
    }
}

?>
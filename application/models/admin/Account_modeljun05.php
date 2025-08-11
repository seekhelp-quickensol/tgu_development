<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Account_model extends CI_Model { 
	public function cron_setup_payment(){
		$date = date('Y-m-d',strtotime("-1 days"));
		$this->db->select('id,center_id,session_id,course_id,stream_id,country');
		$this->db->where('Date(created_on)',$date);
        $result = $this->db->get('tbl_student');
        $result = $result->result();
        $data = array();
        foreach($result as $result_res){
            $this->db->where('student_id',$result_res->id);
            $exist = $this->db->get('tbl_student_fee_setup');
            $exist = $exist->row();
            if(empty($exist)){
				$this->db->select('fee_share');
				$this->db->where('id',$result_res->center_id);
				$center = $this->db->get('tbl_center');
				$center = $center->row(); 
				
				$this->db->where('session_id',$result_res->session_id); 
				$this->db->where('course_id',$result_res->course_id);
				$this->db->where('stream_id',$result_res->stream_id);
				$fees = $this->db->get('tbl_fees_realtion');
				$fees = $fees->row();
				$total_fees = 0;
				if(!empty($fees)){
					if($result_res->center_id == "1"){
						$total_fees = $fees->campus_fees;
					}else{ 
						$total_fees = $fees->fees;
					}
				}else{ 
					$this->db->where('course_id',$result_res->course_id);
					$this->db->where('stream_id',$result_res->stream_id);
					$this->db->order_by('id','DESC');
					$fees = $this->db->get('tbl_fees_realtion');
					$fees = $fees->row();
					if(!empty($fees)){
						if($result_res->center_id == "1"){
							$total_fees = $fees->campus_fees;
						}else{ 
							$total_fees = $fees->fees;
						}
					}
				}
				if($result_res->country != "101"){
					$total_fees = $total_fees*2;
				} 
				$data[] = array(
                    'student_id' => $result_res->id,
                    'center_id' => $result_res->center_id,
                    'session_id' => $result_res->session_id,
                    'center_share' => $center->fee_share,
                    'btu_share' => 100-$center->fee_share,
                    'one_year_fee' => $total_fees,
                    'created_on' => date("Y-m-d H:i:s"),
                );
			}
        }
		if(!empty($data)){
			$this->db->insert_batch('tbl_student_fee_setup',$data);
		}
		return true;
	}
    public function get_monthly_account_center(){
        $this->db->select('tbl_center.center_name,tbl_center.contact_person_name,tbl_center.contact_person_contact,tbl_center_payment.transaction_no,tbl_center_payment.amount,tbl_center_payment.payment_date,tbl_center_payment.center_id');
        $this->db->where('Month(tbl_center_payment.payment_date)',date("m"));
        $this->db->where('YEAR(tbl_center_payment.payment_date)',date("Y"));
        $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->where('tbl_center_payment.payment_status	','1');
        $this->db->join('tbl_center','tbl_center.id = tbl_center_payment.center_id');
        $result = $this->db->get('tbl_center_payment');
        return $result->result();
    }

    public function get_center_info(){
        $this->db->where('tbl_center.id',$this->uri->segment(2));
        $this->db->where('tbl_center.is_deleted','0');
        $result = $this->db->get('tbl_center');
        $result = $result->row();
        return $result;

    }
    public function get_account_details_center(){
        $this->db->where('tbl_center_payment.center_id',$this->uri->segment(2));
        $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->where('tbl_center_payment.payment_status','1');
        $result = $this->db->get('tbl_center_payment');
       return $result->result();
    }
public function get_original_amount($student_id){
        $this->db->where('student_id',$student_id);
        $this->db->where('is_deleted','0');
        $result = $this->db->get('tbl_student_fee_setup');
        $result = $result->row();
        if(!empty($result)){
                if($result->center_id == "1"){
                        return $result->one_year_fee.'@@@'.$result->one_year_fee;
                }else{
                        $center_share = $result->center_share;
                        $new_fees = ($center_share / 100) * $result->one_year_fee;
                        return $new_fees.'@@@'.$result->one_year_fee;
                }
        }else{
                return 0;
        }
}	
public function get_monthly_account_details(){
                
        $this->db->select("tbl_student_fees.*,tbl_student.center_id,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_fees.lateral_entry_fees,tbl_student_fees.original_amount,tbl_student_fees.total_fees");
        $this->db->where('MONTH(tbl_student_fees.payment_date)',date('m'));
        $this->db->where('YEAR(tbl_student_fees.payment_date)',date('Y')); 
        $this->db->where('tbl_student_fees.is_deleted','0');
        $this->db->where('tbl_student_fees.payment_status','1');  
        
        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
        $result__student_fee = $this->db->get('tbl_student_fees');
        $result__student_fee = $result__student_fee->result(); 
        $arr = array();
        if(!empty($result__student_fee)){
            foreach($result__student_fee as $result__student_fee_res){ 
                if($result__student_fee_res->fees_type == 1){ 
                    $arr[] = $result__student_fee_res;
                }
                if($result__student_fee_res->fees_type == 4){ 
                    $arr[] = $result__student_fee_res;
                }
                if($result__student_fee_res->fees_type == 2){ 
                        $arr[] = $result__student_fee_res;
                    }
            }
        }
 
        $result__student_fee = $arr;
       
        $this->db->select("tbl_student_migration.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_migration.created_on as payment_date ");
        $this->db->where('MONTH(tbl_student_migration.created_on)',date("m"));
        $this->db->where('YEAR(tbl_student_migration.created_on)',date("Y"));
        $this->db->where('tbl_student_migration.is_deleted','0');
        $this->db->where('tbl_student_migration.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id');
        $result_student_migration  = $this->db->get('tbl_student_migration');
        $result_student_migration = $result_student_migration->result();
       
       
        $k = 0;
        foreach($result_student_migration as $result_arr){
                $result_student_migration[$k++]->fees_type = 'migration'; 
        }
       

        $this->db->select("tbl_student_provisional_degree.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_provisional_degree.created_on as payment_date");
        $this->db->where('MONTH(tbl_student_provisional_degree.created_on)',date("m"));
        $this->db->where('YEAR(tbl_student_provisional_degree.created_on)',date("Y"));
        $this->db->where('tbl_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_student_provisional_degree.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_provisional_degree.student_id');
        $result_student_provisional  = $this->db->get('tbl_student_provisional_degree');
        $result_student_provisional = $result_student_provisional->result();

        $l = 0;
        foreach($result_student_provisional as $result_arr){
                $result_student_provisional[$l++]->fees_type = 'provisinal'; 
                
        }
       
        $this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile ,tbl_student_transfer.created_on as payment_date");
        $this->db->where('MONTH(tbl_student_transfer.created_on)',date("m"));
        $this->db->where('YEAR(tbl_student_transfer.created_on)',date("Y"));
        $this->db->where('tbl_student_transfer.is_deleted','0');
        $this->db->where('tbl_student_transfer.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_transfer.student_id');
        $result_student_transfer = $this->db->get('tbl_student_transfer');
        $result_student_transfer = $result_student_transfer->result();

        $a = 0;
        foreach($result_student_transfer as $result_arr){
                $result_student_transfer[$a++]->fees_type = 'transfer'; 
                
        }
        $this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_degree.created_on as payment_date");
        $this->db->where('MONTH(tbl_student_degree.created_on)',date("m"));
        $this->db->where('YEAR(tbl_student_degree.created_on)',date("Y"));
        $this->db->where('tbl_student_degree.is_deleted','0');
        $this->db->where('tbl_student_degree.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_degree.student_id');
        $result_student_degree  = $this->db->get('tbl_student_degree');
        $result_student_degree = $result_student_degree->result();

        $b = 0;
        foreach($result_student_degree as $result_arr){
                $result_student_degree[$b++]->fees_type = 'Degree'; 
                
        }
       

        $this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_transcript.registration_id  as student_id ,tbl_transcript.created_on as payment_date");
        $this->db->where('Month(tbl_transcript.created_on)',date("m"));
        $this->db->where('YEAR(tbl_transcript.created_on)',date("Y"));
        $this->db->where('tbl_transcript.is_deleted','0');
        $this->db->where('tbl_transcript.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_transcript.registration_id');
        $result_student_transcript  = $this->db->get('tbl_transcript');
        $result_student_transcript = $result_student_transcript->result();
        $c = 0;
        foreach($result_student_transcript as $result_arr){
                $result_student_transcript[$c++]->fees_type = 'transcript'; 
                
        }

     $result = array_merge($result__student_fee,$result_student_migration,$result_student_provisional,$result_student_transfer,$result_student_degree,$result_student_transcript);
       
        return $result;
    }


    public function get_student_account_details(){
        $type_of_fee = array('1','4','2');
        $this->db->select("tbl_student_fees.*,tbl_student.student_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_fees.lateral_entry_fees,tbl_student_fees.original_amount,tbl_student_fees.total_fees");
        $this->db->where('tbl_student_fees.student_id',$this->uri->segment(2));
        $this->db->where_in('tbl_student_fees.fees_type',$type_of_fee);
        $this->db->where('tbl_student_fees.is_deleted','0');
        $this->db->where('tbl_student_fees.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
        $result_student_fee_all = $this->db->get('tbl_student_fees');
        $result_student_fee_all = $result_student_fee_all->result();
        
    
    
        $this->db->select("tbl_student_migration.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_migration.created_on as payment_date");
        $this->db->where('tbl_student_migration.student_id',$this->uri->segment(2));
        $this->db->where('tbl_student_migration.is_deleted','0');
        $this->db->where('tbl_student_migration.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id');
        $result_student_migration_all  = $this->db->get('tbl_student_migration');
        $result_student_migration_all = $result_student_migration_all->result();
        $a = 0;
        foreach($result_student_migration_all as $result_arr){
                $result_student_migration_all[$a++]->fees_type = 'migration'; 
                
        }
    
        $this->db->select("tbl_student_provisional_degree.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_provisional_degree.created_on as payment_date");
        $this->db->where('tbl_student_provisional_degree.student_id',$this->uri->segment(2));
        $this->db->where('tbl_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_student_provisional_degree.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_provisional_degree.student_id');
        $result_student_provisional_all  = $this->db->get('tbl_student_provisional_degree');
        $result_student_provisional_all = $result_student_provisional_all->result();
        $b = 0;
        foreach($result_student_provisional_all as $result_arr){
                $result_student_provisional_all[$b++]->fees_type = 'provisinal'; 
                
        }
    
        $this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile ,tbl_student_transfer.created_on as payment_date");
        $this->db->where('tbl_student_transfer.student_id',$this->uri->segment(2));
        $this->db->where('tbl_student_transfer.is_deleted','0');
        $this->db->where('tbl_student_transfer.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_transfer.student_id');
        $result_student_transfer_all = $this->db->get('tbl_student_transfer');
        $result_student_transfer_all = $result_student_transfer_all->result();
        $c = 0;
        foreach($result_student_transfer_all as $result_arr){
                $result_student_transfer_all[$c++]->fees_type = 'transfer'; 
                
        }
        $this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_degree.created_on as payment_date");
        $this->db->where('tbl_student_degree.student_id',$this->uri->segment(2));
        $this->db->where('tbl_student_degree.is_deleted','0');
        $this->db->where('tbl_student_degree.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_degree.student_id');
        $result_student_degree_all  = $this->db->get('tbl_student_degree');
        $result_student_degree_all = $result_student_degree_all->result();
        $d = 0;
        foreach($result_student_degree_all as $result_arr){
                $result_student_degree_all[$d++]->fees_type = 'Degree'; 
                
        }
    
        $this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_transcript.registration_id  as student_id ,tbl_transcript.created_on as payment_date");
        $this->db->where('tbl_transcript.registration_id',$this->uri->segment(2));
        $this->db->where('tbl_transcript.is_deleted','0');
        $this->db->where('tbl_transcript.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_transcript.registration_id');
        $result_student_transcript_all  = $this->db->get('tbl_transcript');
        $result_student_transcript_all = $result_student_transcript_all->result();
        $e = 0;
            foreach($result_student_transcript_all as $result_arr){
                    $result_student_transcript_all[$e++]->fees_type = 'transcript'; 
                    
            }
    
    
        $result = array_merge($result_student_fee_all,$result_student_migration_all,$result_student_provisional_all,$result_student_transfer_all,$result_student_degree_all,$result_student_transcript_all);
        return $result;
    
      }

    public function get_monthly_account_seperate_student() {
       
        $this->db->select("tbl_separate_student_fees.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_student_fees.fees as amount,tbl_separate_student_fees.separate_student_id as  student_id");
        $this->db->where('Month(tbl_separate_student_fees.created_on)',date("m"));
        $this->db->where('YEAR(tbl_separate_student_fees.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_fees.is_deleted','0');
        //$this->db->where('tbl_separate_student_fees.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_fees.separate_student_id');
        $result_student_separate_fee = $this->db->get('tbl_separate_student_fees');
        $result_student_separate_fee = $result_student_separate_fee->result();
        $x = 0;
        foreach($result_student_separate_fee as $result_arr){
                $result_student_separate_fee[$x++]->fees_type = 'admission'; 
                
        }

      
        $this->db->select("tbl_separate_student_migration.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('Month(tbl_separate_student_migration.created_on)',date("m"));
        $this->db->where('YEAR(tbl_separate_student_migration.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_migration.is_deleted','0');
        $this->db->where('tbl_separate_student_migration.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_migration.student_id');
        $result_student_separate_migration  = $this->db->get('tbl_separate_student_migration');
        $result_student_separate_migration = $result_student_separate_migration->result();
        $y = 0;
        foreach($result_student_separate_migration as $result_arr){
                $result_student_separate_migration[$y++]->fees_type = 'migration'; 
                
        }


        $this->db->select("tbl_separate_student_provisional_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('Month(tbl_separate_student_provisional_degree.created_on)',date("m"));
        $this->db->where('YEAR(tbl_separate_student_provisional_degree.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_provisional_degree.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_provisional_degree.student_id');
        $result_student_separate_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
        $result_student_separate_provisional = $result_student_separate_provisional->result();

        $z = 0;
        foreach($result_student_separate_provisional as $result_arr){
                $result_student_separate_provisional[$z++]->fees_type = 'provisinal'; 
                
        }


        $this->db->select("tbl_separate_student_transfer.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('Month(tbl_separate_student_transfer.created_on)',date("m"));
        $this->db->where('YEAR(tbl_separate_student_transfer.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_transfer.is_deleted','0');
        $this->db->where('tbl_separate_student_transfer.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_transfer.student_id');
        $tbl_separate_student_transfer  = $this->db->get('tbl_separate_student_transfer');
        $tbl_separate_student_transfer = $tbl_separate_student_transfer->result();
        $r = 0;
        foreach($tbl_separate_student_transfer as $result_arr){
                $tbl_separate_student_transfer[$r++]->fees_type = 'transfer'; 
                
        }

        $this->db->select("tbl_separate_student_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('Month(tbl_separate_student_degree.created_on)',date("m"));
        $this->db->where('YEAR(tbl_separate_student_degree.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_degree.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_degree.student_id');
        $result_separate_student_degree  = $this->db->get('tbl_separate_student_degree');
        $result_separate_student_degree = $result_separate_student_degree->result();
        $p = 0;
        foreach($result_separate_student_degree as $result_arr){
                $result_separate_student_degree[$p++]->fees_type = 'Degree'; 
                
        }

        $this->db->select("tbl_separate_transcript.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_transcript.payment_date as created_on,tbl_separate_transcript.registration_id as student_id");
        $this->db->where('Month(tbl_separate_transcript.payment_date)',date("m"));
        $this->db->where('YEAR(tbl_separate_transcript.payment_date)',date("Y"));
        $this->db->where('tbl_separate_transcript.is_deleted','0');
        $this->db->where('tbl_separate_transcript.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_transcript.registration_id');
        $result_separate_student_transcript  = $this->db->get('tbl_separate_transcript');
        $result_separate_student_transcript = $result_separate_student_transcript->result();
        
        $q = 0;
        foreach($result_separate_student_transcript as $result_arr){
                $result_separate_student_transcript[$q++]->fees_type = 'transcript'; 
                
        }


        $result = array_merge($result_student_separate_fee,$result_student_separate_migration,$result_student_separate_provisional,$tbl_separate_student_transfer,$result_separate_student_degree,$result_separate_student_transcript);
        return $result;

    }

  

  public function get_separate_student_account_details(){
        $this->db->select("tbl_separate_student_fees.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_student_fees.fees as amount,tbl_separate_student_fees.separate_student_id as student_id");
        $this->db->where('tbl_separate_student_fees.separate_student_id',$this->uri->segment(2));
        $this->db->where('tbl_separate_student_fees.is_deleted','0');
        //$this->db->where('tbl_separate_student_fees.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_fees.separate_student_id');
        $result_student_separate_fee_all = $this->db->get('tbl_separate_student_fees');
        $result_student_separate_fee_all = $result_student_separate_fee_all->result();
       
        $x = 0;
        foreach($result_student_separate_fee_all as $result_arr){
                $result_student_separate_fee_all[$x++]->fees_type = 'admission'; 
                
        }

        $this->db->select("tbl_separate_student_migration.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('tbl_separate_student_migration.student_id',$this->uri->segment(2));
        $this->db->where('tbl_separate_student_migration.is_deleted','0');
        $this->db->where('tbl_separate_student_migration.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_migration.student_id');
        $result_student_separate_migration_all  = $this->db->get('tbl_separate_student_migration');
        $result_student_separate_migration_all = $result_student_separate_migration_all->result();
        $y = 0;
        foreach($result_student_separate_migration_all as $result_arr){
                $result_student_separate_migration_all[$y++]->fees_type = 'migration'; 
                
        }

        $this->db->select("tbl_separate_student_provisional_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('tbl_separate_student_provisional_degree.student_id',$this->uri->segment(2));                        
        $this->db->where('tbl_separate_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_provisional_degree.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_provisional_degree.student_id');
        $result_student_separate_provisional_all  = $this->db->get('tbl_separate_student_provisional_degree');
        $result_student_separate_provisional_all = $result_student_separate_provisional_all->result();

        $z = 0;
        foreach($result_student_separate_provisional_all as $result_arr){
                $result_student_separate_provisional_all[$z++]->fees_type = 'provisinal'; 
                
        }

        $this->db->select("tbl_separate_student_transfer.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('tbl_separate_student_transfer.student_id',$this->uri->segment(2));
        $this->db->where('tbl_separate_student_transfer.is_deleted','0');
        $this->db->where('tbl_separate_student_transfer.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_transfer.student_id');
        $tbl_separate_student_transfer_all  = $this->db->get('tbl_separate_student_transfer');
        $tbl_separate_student_transfer_all = $tbl_separate_student_transfer_all->result();
        $r = 0;
        foreach($tbl_separate_student_transfer_all as $result_arr){
                $tbl_separate_student_transfer_all[$r++]->fees_type = 'transfer'; 
                
        }

        $this->db->select("tbl_separate_student_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('tbl_separate_student_degree.student_id',$this->uri->segment(2));
        $this->db->where('tbl_separate_student_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_degree.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_degree.student_id');
        $result_separate_student_degree_all  = $this->db->get('tbl_separate_student_degree');
        $result_separate_student_degree_all = $result_separate_student_degree_all->result();
        $p = 0;
        foreach($result_separate_student_degree_all as $result_arr){
                $result_separate_student_degree_all[$p++]->fees_type = 'Degree'; 
                
        }

        $this->db->select("tbl_separate_transcript.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_transcript.payment_date as created_on,tbl_separate_transcript.registration_id as student_id");
        $this->db->where('tbl_separate_transcript.registration_id',$this->uri->segment(2));
        $this->db->where('tbl_separate_transcript.is_deleted','0');
        $this->db->where('tbl_separate_transcript.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_transcript.registration_id');
        $result_separate_student_transcript_all  = $this->db->get('tbl_separate_transcript');
        $result_separate_student_transcript_all = $result_separate_student_transcript_all->result();
        
        $q = 0;
        foreach($result_separate_student_transcript_all as $result_arr){
                $result_separate_student_transcript_all[$q++]->fees_type = 'transcript'; 
                
        }

        $result = array_merge($result_student_separate_fee_all,$result_student_separate_migration_all,$result_student_separate_provisional_all,$tbl_separate_student_transfer_all,$result_separate_student_degree_all,$result_separate_student_transcript_all);
        return $result;
  }

  public function get_single_student_account(){
       $this->db->where('id',$this->uri->segment(2));
       $this->db->where('is_deleted','0');
       $result_student = $this->db->get('tbl_student');
       $result_student = $result_student->row(); 
       return $result_student;
  }
  public function get_single_separate_account(){
       $this->db->where('id',$this->uri->segment(2));
       $this->db->where('is_deleted','0');
       $result_student_seperate = $this->db->get('tbl_separate_student');
       $result_student_seperate = $result_student_seperate->row(); 
       return $result_student_seperate;   
  }
  public function get_yealy_account_center(){
        $this->db->select('tbl_center.center_name,tbl_center.contact_person_name,tbl_center.contact_person_contact,tbl_center_payment.transaction_no,tbl_center_payment.amount,tbl_center_payment.payment_date,tbl_center_payment.center_id');
        $this->db->where('YEAR(tbl_center_payment.payment_date)',date("Y"));
        $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->where('tbl_center_payment.payment_status','1');
        $this->db->join('tbl_center','tbl_center.id = tbl_center_payment.center_id');
        $result = $this->db->get('tbl_center_payment');
        return $result->result();
  }
  public function get_account_details_center_yearly_all(){
        $this->db->where('tbl_center_payment.center_id',$this->uri->segment(2));
        $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->where('tbl_center_payment.payment_status','1');
        $result = $this->db->get('tbl_center_payment');
       return $result->result();
  }
  public function get_yearly_account_details(){
        $type_of_fee = array('1','4','2');
        $this->db->select("tbl_student_fees.*,tbl_student.center_id,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_fees.lateral_entry_fees,tbl_student_fees.original_amount,tbl_student_fees.total_fees");
        $this->db->where('YEAR(tbl_student_fees.payment_date)',date("Y"));
        $this->db->where_in('tbl_student_fees.fees_type',$type_of_fee);
        $this->db->where('tbl_student_fees.is_deleted','0');
        $this->db->where('tbl_student_fees.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
        $result_student_fee_yearly = $this->db->get('tbl_student_fees');
        $result_student_fee_yearly = $result_student_fee_yearly->result();

        $this->db->select("tbl_student_migration.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_migration.created_on as payment_date ");
        $this->db->where('YEAR(tbl_student_migration.created_on)',date("Y"));
        $this->db->where('tbl_student_migration.is_deleted','0');
        $this->db->where('tbl_student_migration.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id');
        $result_student_migration_yearly  = $this->db->get('tbl_student_migration');
        $result_student_migration_yearly = $result_student_migration_yearly->result();
       
       
        $k = 0;
        foreach($result_student_migration_yearly as $result_arr){
                $result_student_migration_yearly[$k++]->fees_type = 'migration'; 
        }
       

        $this->db->select("tbl_student_provisional_degree.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_provisional_degree.created_on as payment_date");
        $this->db->where('YEAR(tbl_student_provisional_degree.created_on)',date("Y"));
        $this->db->where('tbl_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_student_provisional_degree.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_provisional_degree.student_id');
        $result_student_provisional_yearly  = $this->db->get('tbl_student_provisional_degree');
        $result_student_provisional_yearly = $result_student_provisional_yearly->result();

        $l = 0;
        foreach($result_student_provisional_yearly as $result_arr){
                $result_student_provisional_yearly[$l++]->fees_type = 'provisinal'; 
                
        }
       
        $this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile ,tbl_student_transfer.created_on as payment_date");
        $this->db->where('YEAR(tbl_student_transfer.created_on)',date("Y"));
        $this->db->where('tbl_student_transfer.is_deleted','0');
        $this->db->where('tbl_student_transfer.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_transfer.student_id');
        $result_student_transfer_yearly = $this->db->get('tbl_student_transfer');
        $result_student_transfer_yearly = $result_student_transfer_yearly->result();

        $a = 0;
        foreach($result_student_transfer_yearly as $result_arr){
                $result_student_transfer_yearly[$a++]->fees_type = 'transfer'; 
                
        }
       

        $this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_degree.created_on as payment_date");
        $this->db->where('YEAR(tbl_student_degree.created_on)',date("Y"));
        $this->db->where('tbl_student_degree.is_deleted','0');
        $this->db->where('tbl_student_degree.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_degree.student_id');
        $result_student_degree_yearly  = $this->db->get('tbl_student_degree');
        $result_student_degree_yearly = $result_student_degree_yearly->result();

        $b = 0;
        foreach($result_student_degree_yearly as $result_arr){
                $result_student_degree_yearly[$b++]->fees_type = 'Degree'; 
                
        }
       

        $this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_transcript.registration_id  as student_id ,tbl_transcript.created_on as payment_date");
       
        $this->db->where('YEAR(tbl_transcript.created_on)',date("Y"));
        $this->db->where('tbl_transcript.is_deleted','0');
        $this->db->where('tbl_transcript.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_transcript.registration_id');
        $result_student_transcript_yearly  = $this->db->get('tbl_transcript');
        $result_student_transcript_yearly = $result_student_transcript_yearly->result();
        $c = 0;
        foreach($result_student_transcript_yearly as $result_arr){
                $result_student_transcript_yearly[$c++]->fees_type = 'transcript'; 
                
        }


        $result = array_merge($result_student_fee_yearly,$result_student_migration_yearly,$result_student_provisional_yearly,$result_student_transfer_yearly,$result_student_degree_yearly,$result_student_transcript_yearly);
     
        return $result;
  }
  public function get_yearly_account_separate_students(){

        $this->db->select("tbl_separate_student_fees.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_student_fees.fees as amount,tbl_separate_student_fees.separate_student_id as  student_id");
        $this->db->where('YEAR(tbl_separate_student_fees.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_fees.is_deleted','0');
        //$this->db->where('tbl_separate_student_fees.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_fees.separate_student_id');
        $result_student_separate_fee = $this->db->get('tbl_separate_student_fees');
        $result_student_separate_fee = $result_student_separate_fee->result();
        $x = 0;
        foreach($result_student_separate_fee as $result_arr){
                $result_student_separate_fee[$x++]->fees_type = 'admission'; 
                
        }

      
        $this->db->select("tbl_separate_student_migration.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('YEAR(tbl_separate_student_migration.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_migration.is_deleted','0');
        $this->db->where('tbl_separate_student_migration.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_migration.student_id');
        $result_student_separate_migration  = $this->db->get('tbl_separate_student_migration');
        $result_student_separate_migration = $result_student_separate_migration->result();
        $y = 0;
        foreach($result_student_separate_migration as $result_arr){
                $result_student_separate_migration[$y++]->fees_type = 'migration'; 
                
        }
      

        $this->db->select("tbl_separate_student_provisional_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('YEAR(tbl_separate_student_provisional_degree.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_provisional_degree.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_provisional_degree.student_id');
        $result_student_separate_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
        $result_student_separate_provisional = $result_student_separate_provisional->result();

        $z = 0;
        foreach($result_student_separate_provisional as $result_arr){
                $result_student_separate_provisional[$z++]->fees_type = 'provisinal'; 
                
        }


        $this->db->select("tbl_separate_student_transfer.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('YEAR(tbl_separate_student_transfer.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_transfer.is_deleted','0');
        $this->db->where('tbl_separate_student_transfer.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_transfer.student_id');
        $tbl_separate_student_transfer  = $this->db->get('tbl_separate_student_transfer');
        $tbl_separate_student_transfer = $tbl_separate_student_transfer->result();
        $r = 0;
        foreach($tbl_separate_student_transfer as $result_arr){
                $tbl_separate_student_transfer[$r++]->fees_type = 'transfer'; 
                
        }

        $this->db->select("tbl_separate_student_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('YEAR(tbl_separate_student_degree.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_degree.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_degree.student_id');
        $result_separate_student_degree  = $this->db->get('tbl_separate_student_degree');
        $result_separate_student_degree = $result_separate_student_degree->result();
        $p = 0;
        foreach($result_separate_student_degree as $result_arr){
                $result_separate_student_degree[$p++]->fees_type = 'Degree'; 
                
        }

        $this->db->select("tbl_separate_transcript.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_transcript.payment_date as created_on,tbl_separate_transcript.registration_id as student_id");
  
        $this->db->where('YEAR(tbl_separate_transcript.payment_date)',date("Y"));
        $this->db->where('tbl_separate_transcript.is_deleted','0');
        $this->db->where('tbl_separate_transcript.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_transcript.registration_id');
        $result_separate_student_transcript  = $this->db->get('tbl_separate_transcript');
        $result_separate_student_transcript = $result_separate_student_transcript->result();
        
        $q = 0;
        foreach($result_separate_student_transcript as $result_arr){
                $result_separate_student_transcript[$q++]->fees_type = 'transcript'; 
                
        }


        $result = array_merge($result_student_separate_fee,$result_student_separate_migration,$result_student_separate_provisional,$tbl_separate_student_transfer,$result_separate_student_degree,$result_separate_student_transcript);
      
     
        return $result;

  }

  public function get_account_total_collection(){
        $this->db->select('tbl_center.center_name,tbl_center.contact_person_name,tbl_center.contact_person_contact,tbl_center_payment.transaction_no,tbl_center_payment.amount,tbl_center_payment.payment_date,tbl_center_payment.center_id');          $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->where('tbl_center_payment.payment_status','1');
        $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->join('tbl_center','tbl_center.id = tbl_center_payment.center_id');
        $result = $this->db->get('tbl_center_payment');
        return $result->result();
  }
  public function get_student_total_collection(){
       $this->db->select('payment_date');
       $this->db->group_by('YEAR(tbl_student_fees.payment_date)');
       $year = $this->db->get('tbl_student_fees');
       $year = $year->result();
       $tution_data = array();
       $re_tution_data = array();
       $exam_fees = array();
       $migration_fees = array();
       $provisional_fees = array();
       $transfer_fees = array();
       $degree_fees = array();
       $transcript_fees = array(); 
       if(!empty($year)){
               foreach($year as $year_result){  
                        $this->db->select("tbl_student_fees.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_fees.lateral_entry_fees,tbl_student_fees.original_amount,tbl_student_fees.total_fees,tbl_student.center_id");
                        $this->db->where_in('tbl_student_fees.fees_type',array(1));
                        $this->db->where('tbl_student_fees.is_deleted','0');
                        $this->db->where('tbl_student_fees.payment_status','1');  
                        $this->db->where('YEAR(tbl_student_fees.payment_date)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id'); 
                        $result_student_admission = $this->db->get('tbl_student_fees');
                        $result_student_admission = $result_student_admission->result(); 

                        if(!empty($result_student_admission)){
                                $total_fees = 0;
                                $center_amount = 0;     
                                $total_amount = 0;
                                foreach($result_student_admission as $result_student_fee_all_result){
                                        $exp = $this->Account_model->get_original_amount($result_student_fee_all_result->student_id);
                                        $exp = explode('@@@',$exp);
                                        $original_amount = $exp[1];
                                        $actual_amount = (int) $student_account_result->lateral_entry_fees + (int)$original_amount;
                                        if($student_account_result->center_id == 1){    
                                                $total_fees += $original_amount;
                                                $center_amount += 0;     
                                                $total_amount += $original_amount;
                                        }else{ 
                                                $total_fees += $original_amount-$exp[0];
                                                $center_amount += $exp[0];     
                                                $total_amount += $original_amount;
                                        } 
                                }
                        }
                        $tution_data[] = array(
                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                'fees_type'     => 'Admission',
                                'btu_fees'    => $total_fees,
                                'center_amount' => $center_amount,
                                'total_amount'  => $total_amount
                        );  

                        $this->db->select("tbl_student_fees.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student_fees.lateral_entry_fees,tbl_student_fees.original_amount,tbl_student_fees.total_fees,tbl_student.center_id");
                        $this->db->where_in('tbl_student_fees.fees_type',array(4));
                        $this->db->where('tbl_student_fees.is_deleted','0');
                        $this->db->where('tbl_student_fees.payment_status','1');  
                        $this->db->where('YEAR(tbl_student_fees.payment_date)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id'); 
                        $result_student_reregistration = $this->db->get('tbl_student_fees');
                        $result_student_reregistration = $result_student_reregistration->result(); 

                        if(!empty($result_student_reregistration)){
                                $re_total_fees = 0;
                                $re_center_amount = 0;     
                                $re_total_amount = 0;
                                foreach($result_student_reregistration as $result_student_fee_all_result){
                                        $exp = $this->Account_model->get_original_amount($result_student_fee_all_result->student_id);
                                        $exp = explode('@@@',$exp);
                                        $original_amount = $exp[1];
                                        $actual_amount = (int) $student_account_result->lateral_entry_fees + (int)$original_amount;
                                        if($student_account_result->center_id == 1){    
                                                $re_total_fees += $original_amount;
                                                $re_center_amount += 0;     
                                                $re_total_amount += $original_amount;
                                        }else{ 
                                                $re_total_fees += $original_amount-$exp[0];
                                                $re_center_amount += $exp[0];     
                                                $re_total_amount += $original_amount;
                                        } 
                                }
                        }
                        $re_tution_data[] = array(
                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                'fees_type'     => 'Re-registration',
                                'btu_fees'    => $re_total_fees,
                                'center_amount' => $re_center_amount,
                                'total_amount'  => $re_total_amount
                        );  

                        $this->db->select("SUM(tbl_student_fees.total_fees) as  total_fees");
                        $this->db->where('tbl_student_fees.fees_type','2');
                        $this->db->where('tbl_student_fees.is_deleted','0');
                        $this->db->where('tbl_student_fees.payment_status','1'); 
                        $this->db->where('YEAR(tbl_student_fees.payment_date)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id'); 
                        $result_student_fee_all_exam = $this->db->get('tbl_student_fees');
                        $result_student_fee_all_exam = $result_student_fee_all_exam->result();
                        if(!empty($result_student_fee_all_exam)){
                                foreach($result_student_fee_all_exam as $result_student_fee_all_exam_result){
                                        $exam_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Exam Fees',
                                                'btu_fees'      => $result_student_fee_all_exam_result->total_fees,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_fee_all_exam_result->total_fees
                                        );  
                                }
                        }

                        $this->db->select("SUM(tbl_student_migration.amount) as total_amount");
                        $this->db->where('tbl_student_migration.is_deleted','0');
                        $this->db->where('tbl_student_migration.payment_status','1');
                        $this->db->where('YEAR(tbl_student_migration.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id');
                        $result_student_migration_all  = $this->db->get('tbl_student_migration');
                        $result_student_migration_all = $result_student_migration_all->result();

                        if(!empty($result_student_migration_all)){
                                foreach($result_student_migration_all as $result_student_migration_all_result){
                                        $migration_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Migration Fees',
                                                'btu_fees'      => $result_student_migration_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_migration_all_result->total_amount
                                        );  
                                }
                        }

                        $this->db->select("SUM(tbl_student_provisional_degree.amount) as total_amount");
                        $this->db->where('tbl_student_provisional_degree.is_deleted','0');
                        $this->db->where('tbl_student_provisional_degree.payment_status','1');
                        $this->db->where('YEAR(tbl_student_provisional_degree.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id =  tbl_student_provisional_degree.student_id');
                        $result_student_provisional_all  = $this->db->get('tbl_student_provisional_degree');
                        $result_student_provisional_all = $result_student_provisional_all->result();
                        
                        if(!empty($result_student_provisional_all)){
                                foreach($result_student_provisional_all as $result_student_provisional_all_result){
                                        $provisional_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Provisional Fees',
                                                'btu_fees'      => $result_student_provisional_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_provisional_all_result->total_amount
                                        );  
                                }
                        }

                        $this->db->select("SUM(tbl_student_transfer.amount) as total_amount");
                        $this->db->where('tbl_student_transfer.is_deleted','0');
                        $this->db->where('tbl_student_transfer.payment_status','1');
                        $this->db->where('YEAR(tbl_student_transfer.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id =  tbl_student_transfer.student_id');
                        $result_student_transfer_all = $this->db->get('tbl_student_transfer');
                        $result_student_transfer_all = $result_student_transfer_all->result();

                        if(!empty($result_student_transfer_all)){
                                foreach($result_student_transfer_all as $result_student_transfer_all_result){
                                        $transfer_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'TC Fees',
                                                'btu_fees'      => $result_student_transfer_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_transfer_all_result->total_amount
                                        );  
                                }
                        }
                        
                        $this->db->select("SUM(tbl_student_degree.amount) as total_amount");
                        $this->db->where('tbl_student_degree.is_deleted','0');
                        $this->db->where('tbl_student_degree.payment_status','1');
                        $this->db->where('YEAR(tbl_student_degree.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id =  tbl_student_degree.student_id');
                        $result_student_degree_all  = $this->db->get('tbl_student_degree');
                        $result_student_degree_all = $result_student_degree_all->result();

                        if(!empty($result_student_degree_all)){
                                foreach($result_student_degree_all as $result_student_degree_all_result){
                                        $degree_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Degree Fees',
                                                'btu_fees'      => $result_student_degree_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_degree_all_result->total_amount
                                        );  
                                }
                        }

                        $this->db->select("SUM(tbl_transcript.amount) as total_amount"); 
                        $this->db->where('tbl_transcript.is_deleted','0');
                        $this->db->where('tbl_transcript.payment_status','1');
                        $this->db->where('YEAR(tbl_transcript.payment_date)',date("Y",strtotime($year_result->payment_date))); 
                        $this->db->join('tbl_student','tbl_student.id =  tbl_transcript.registration_id');
                        $result_student_transcript_all  = $this->db->get('tbl_transcript'); 
                        $result_student_transcript_all = $result_student_transcript_all->result();

                        if(!empty($result_student_transcript_all)){
                                foreach($result_student_transcript_all as $result_student_transcript_all_result){
                                        $transcript_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Transcript Fees',
                                                'btu_fees'      => $result_student_transcript_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_transcript_all_result->total_amount
                                        );  
                                }
                        }
               }
       }  
        $result = array_merge($tution_data,$re_tution_data,$exam_fees,$migration_fees,$provisional_fees,$transfer_fees,$degree_fees,$transcript_fees);
        return $result;
     }

     public function get_seperate_student_total_collection(){

       $this->db->select('created_on');
       $this->db->group_by('YEAR(tbl_separate_student_fees.created_on)');
       $year = $this->db->get('tbl_separate_student_fees');
       $year = $year->result();
       
       $tution_data = array(); 
       $migration_fees = array();
       $provisional_fees = array();
       $transfer_fees = array();
       $degree_fees = array();
       $transcript_fees = array(); 
       if(!empty($year)){
               foreach($year as $year_result){  
                        $this->db->select("SUM(tbl_separate_student_fees.fees) as total_amount");
                        $this->db->where('tbl_separate_student_fees.is_deleted','0'); 
                        $this->db->where('YEAR(tbl_separate_student_fees.created_on)',date("Y",strtotime($year_result->created_on))); 
                        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_fees.separate_student_id'); 
                        $result_student_admission = $this->db->get('tbl_separate_student_fees');
                        $result_student_admission = $result_student_admission->result(); 

                        if(!empty($result_student_admission)){
                                $total_fees = 0;
                                $center_amount = 0;     
                                $total_amount = 0;
                                foreach($result_student_admission as $result_student_fee_all_result){
                                        $total_fees += $result_student_fee_all_result->total_amount;
                                        $center_amount += 0;     
                                        $total_amount += $result_student_fee_all_result->total_amount; 
                                }
                        }
                        $tution_data[] = array(
                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                'fees_type'     => 'Admission',
                                'btu_fees'    => $total_fees,
                                'center_amount' => $center_amount,
                                'total_amount'  => $total_amount
                        );   
                      
                        
                        $this->db->select("SUM(tbl_separate_student_migration.amount) as total_amount");
                        $this->db->where('tbl_separate_student_migration.is_deleted','0');
                        $this->db->where('tbl_separate_student_migration.payment_status','1');
                        $this->db->where('YEAR(tbl_separate_student_migration.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $result_student_migration_all  = $this->db->get('tbl_separate_student_migration');
                        $result_student_migration_all = $result_student_migration_all->result();

                        if(!empty($result_student_migration_all)){
                                foreach($result_student_migration_all as $result_student_migration_all_result){
                                        $migration_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Migration Fees',
                                                'btu_fees'      => $result_student_migration_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_migration_all_result->total_amount
                                        );  
                                }
                        }
                        
                        $this->db->select("SUM(tbl_separate_student_provisional_degree.amount) as total_amount");
                        $this->db->where('tbl_separate_student_provisional_degree.is_deleted','0');
                        $this->db->where('tbl_separate_student_provisional_degree.payment_status','1');
                        $this->db->where('YEAR(tbl_separate_student_provisional_degree.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $result_student_provisional_all  = $this->db->get('tbl_separate_student_provisional_degree');
                        $result_student_provisional_all = $result_student_provisional_all->result();
                        
                        if(!empty($result_student_provisional_all)){
                                foreach($result_student_provisional_all as $result_student_provisional_all_result){
                                        $provisional_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Provisional Fees',
                                                'btu_fees'      => $result_student_provisional_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_provisional_all_result->total_amount
                                        );  
                                }
                        }

                        $this->db->select("SUM(tbl_separate_student_transfer.amount) as total_amount");
                        $this->db->where('tbl_separate_student_transfer.is_deleted','0');
                        $this->db->where('tbl_separate_student_transfer.payment_status','1');
                        $this->db->where('YEAR(tbl_separate_student_transfer.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $result_student_transfer_all = $this->db->get('tbl_separate_student_transfer');
                        $result_student_transfer_all = $result_student_transfer_all->result();

                        if(!empty($result_student_transfer_all)){
                                foreach($result_student_transfer_all as $result_student_transfer_all_result){
                                        $transfer_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'TC Fees',
                                                'btu_fees'      => $result_student_transfer_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_transfer_all_result->total_amount
                                        );  
                                }
                        }
                        
                        $this->db->select("SUM(tbl_separate_student_degree.amount) as total_amount");
                        $this->db->where('tbl_separate_student_degree.is_deleted','0');
                        $this->db->where('tbl_separate_student_degree.payment_status','1');
                        $this->db->where('YEAR(tbl_separate_student_degree.created_on)',date("Y",strtotime($year_result->payment_date))); 
                        $result_student_degree_all  = $this->db->get('tbl_separate_student_degree');
                        $result_student_degree_all = $result_student_degree_all->result();

                        if(!empty($result_student_degree_all)){
                                foreach($result_student_degree_all as $result_student_degree_all_result){
                                        $degree_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Degree Fees',
                                                'btu_fees'      => $result_student_degree_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_degree_all_result->total_amount
                                        );  
                                }
                        }

                        $this->db->select("SUM(tbl_separate_transcript.amount) as total_amount"); 
                        $this->db->where('tbl_separate_transcript.is_deleted','0');
                        $this->db->where('tbl_separate_transcript.payment_status','1');
                        $this->db->where('YEAR(tbl_separate_transcript.payment_date)',date("Y",strtotime($year_result->payment_date))); 
                        $result_student_transcript_all  = $this->db->get('tbl_separate_transcript'); 
                        $result_student_transcript_all = $result_student_transcript_all->result();

                        if(!empty($result_student_transcript_all)){
                                foreach($result_student_transcript_all as $result_student_transcript_all_result){
                                        $transcript_fees[] = array(
                                                'year'          => date("Y",strtotime($year_result->payment_date)),
                                                'fees_type'     => 'Transcript Fees',
                                                'btu_fees'      => $result_student_transcript_all_result->total_amount,
                                                'center_amount' => 0,
                                                'total_amount'  => $result_student_transcript_all_result->total_amount
                                        );  
                                }
                        }
               }
       }  
        $result = array_merge($tution_data,$migration_fees,$provisional_fees,$transfer_fees,$degree_fees,$transcript_fees);
        return $result; 
     }
     public function get_account_payment_pending_center(){
        $this->db->select('tbl_center.center_name,tbl_center.contact_person_name,tbl_center.contact_person_contact,tbl_center_payment.transaction_no,tbl_center_payment.amount,tbl_center.end_date,tbl_center_payment.center_id');        
        $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->where('tbl_center_payment.payment_status','1');
        $this->db->where('tbl_center.end_date <' ,date("Y-m-d"));
        $this->db->join('tbl_center','tbl_center.id = tbl_center_payment.center_id');
        $result = $this->db->get('tbl_center_payment');
        return $result->result();
     }
    public function get_account_details_center_pending(){                   
        $this->db->where('tbl_center_payment.center_id',$this->uri->segment(2));
        $this->db->where('tbl_center_payment.is_deleted','0');
        $this->db->where('tbl_center_payment.payment_status','1');
        $result = $this->db->get('tbl_center_payment');
        return $result->result();
    }

    public function get_separate_payment_pending(){
        $this->db->select("tbl_separate_student_fees.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_student_fees.fees as amount,tbl_separate_student_fees.separate_student_id as  student_id");
        $this->db->where('YEAR(tbl_separate_student_fees.created_on)',date("Y"));  
         $this->db->where('tbl_separate_student_fees.is_deleted','0');
        //$this->db->where('tbl_separate_student_fees.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_fees.separate_student_id');
        $result_student_separate_fee = $this->db->get('tbl_separate_student_fees');
        $result_student_separate_fee = $result_student_separate_fee->result();
        $x = 0;
        foreach($result_student_separate_fee as $result_arr){
                $result_student_separate_fee[$x++]->fees_type = 'admission'; 
                
        }

      
        $this->db->select("tbl_separate_student_migration.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
  
        $this->db->where('tbl_separate_student_migration.is_deleted','0');
        $this->db->where('tbl_separate_student_migration.payment_status','0');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_migration.student_id');
        $result_student_separate_migration  = $this->db->get('tbl_separate_student_migration');
        $result_student_separate_migration = $result_student_separate_migration->result();
        $y = 0;
        foreach($result_student_separate_migration as $result_arr){
                $result_student_separate_migration[$y++]->fees_type = 'migration'; 
                
        }


        $this->db->select("tbl_separate_student_provisional_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('tbl_separate_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_provisional_degree.payment_status','0');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_provisional_degree.student_id');
        $result_student_separate_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
        $result_student_separate_provisional = $result_student_separate_provisional->result();

        $z = 0;
        foreach($result_student_separate_provisional as $result_arr){
                $result_student_separate_provisional[$z++]->fees_type = 'provisinal'; 
                
        }


        $this->db->select("tbl_separate_student_transfer.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('tbl_separate_student_transfer.is_deleted','0');
        $this->db->where('tbl_separate_student_transfer.payment_status','0');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_transfer.student_id');
        $tbl_separate_student_transfer  = $this->db->get('tbl_separate_student_transfer');
        $tbl_separate_student_transfer = $tbl_separate_student_transfer->result();
        $r = 0;
        foreach($tbl_separate_student_transfer as $result_arr){
                $tbl_separate_student_transfer[$r++]->fees_type = 'transfer'; 
                
        }

        $this->db->select("tbl_separate_student_degree.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile");
        $this->db->where('tbl_separate_student_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_degree.payment_status','0');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_degree.student_id');
        $result_separate_student_degree  = $this->db->get('tbl_separate_student_degree');
        $result_separate_student_degree = $result_separate_student_degree->result();
        $p = 0;
        foreach($result_separate_student_degree as $result_arr){
                $result_separate_student_degree[$p++]->fees_type = 'Degree'; 
                
        }

        $this->db->select("tbl_separate_transcript.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_separate_student.mobile,tbl_separate_transcript.payment_date as created_on,tbl_separate_transcript.registration_id as student_id");
        $this->db->where('tbl_separate_transcript.is_deleted','0');
        $this->db->where('tbl_separate_transcript.payment_status','0');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_transcript.registration_id');
        $result_separate_student_transcript  = $this->db->get('tbl_separate_transcript');
        $result_separate_student_transcript = $result_separate_student_transcript->result();
        
        $q = 0;
        foreach($result_separate_student_transcript as $result_arr){
                $result_separate_student_transcript[$q++]->fees_type = 'transcript'; 
                
        }


        $result = array_merge($result_student_separate_fee,$result_student_separate_migration,$result_student_separate_provisional,$tbl_separate_student_transfer,$result_separate_student_degree,$result_separate_student_transcript);
        return $result;
        //print_r($result);

    }
    /*
    public function get_center_name_pending($student_id){
            $this->db->where("is_deleted",'0');
            $this->db->where('')
    }*/

    public function get_date_wise_student_amount($date){
        $date = date("Y-m-").$date;
        $type_of_fee = array('1','4','2');
        $this->db->select("SUM(tbl_student_fees.total_fees) as total_admission_fees"); 
        $this->db->where_in('tbl_student_fees.fees_type',$type_of_fee);
        $this->db->where('tbl_student_fees.is_deleted','0');
        $this->db->where('tbl_student_fees.payment_date',$date); 
        $this->db->where('tbl_student_fees.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
        $admission_fees = $this->db->get('tbl_student_fees');
        $admission_fees = $admission_fees->row();
       // echo "<pre>";print_r($admission_fees);exit;

        $this->db->select("SUM(amount) as total_migration");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('date(created_on)',$date); 
        $total_migration  = $this->db->get('tbl_student_migration');
        $total_migration = $total_migration->row();
        
    
        $this->db->select("SUM(amount) as total_provisional"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1'); 
        $this->db->where('date(created_on)',$date); 
        $total_provisional  = $this->db->get('tbl_student_provisional_degree');
        $total_provisional = $total_provisional->row(); 
    
        $this->db->select("SUM(amount) as total_transfer"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');  
        $this->db->where('date(created_on)',$date); 
        $total_transfer = $this->db->get('tbl_student_transfer');
        $total_transfer = $total_transfer->row(); 

        $this->db->select("SUM(amount) as total_degree");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('date(created_on)',$date);  
        $total_degree  = $this->db->get('tbl_student_degree');
        $total_degree = $total_degree->row(); 
    
        $this->db->select("SUM(amount) as total_transcript");
        $this->db->where('tbl_transcript.is_deleted','0');
        $this->db->where('tbl_transcript.payment_status','1');
        $this->db->where('date(created_on)',$date);  
        $total_transcript  = $this->db->get('tbl_transcript');
        $total_transcript = $total_transcript->row();
        return $admission_fees->total_admission_fees+$total_migration->total_migration+$total_provisional->total_provisional+$total_transfer->total_transfer+$total_degree->total_degree+$total_transcript->total_transcript;
    }
    public function get_date_wise_separate_student_amount($date){ 
           
        $date = date("Y-m-").$date;
        $this->db->select("SUM(tbl_separate_student_fees.fees) as total_admission_fees"); 
        $this->db->where('is_deleted','0');
        $this->db->where('Date(created_on)',$date); 
        $admission_fees_separate = $this->db->get('tbl_separate_student_fees');
        $admission_fees_separate = $admission_fees_separate->row();

        $this->db->select("SUM(amount) as total_migration");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('Date(created_on)',$date); 
        $total_migration  = $this->db->get('tbl_separate_student_migration');
        $total_migration = $total_migration->row();
      
    
        $this->db->select("SUM(amount) as total_provisional"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1'); 
        $this->db->where('Date(created_on)',$date); 
        $total_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
        $total_provisional = $total_provisional->row(); 
      
        $this->db->select("SUM(amount) as total_transfer"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');  
        $this->db->where('Date(created_on)',$date); 
        $total_transfer = $this->db->get('tbl_separate_student_transfer');
        $total_transfer = $total_transfer->row(); 
        
        $this->db->select("SUM(amount) as total_degree");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('Date(created_on)',$date); 
        $total_degree  = $this->db->get('tbl_separate_student_degree');
        $total_degree = $total_degree->row(); 
        $this->db->select("SUM(amount) as total_transcript");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('Date(created_on)',$date); 
        $total_transcript  = $this->db->get('tbl_separate_transcript');
        $total_transcript = $total_transcript->row();
        return $admission_fees_separate->total_admission_fees+$total_migration->total_migration+$total_provisional->total_provisional+$total_transfer->total_transfer+$total_degree->total_degree+$total_transcript->total_transcript;

     
    }
    public function  get_date_wise_center($day){
        $this->db->select("SUM(amount) as total_center");
        $this->db->where('DAY(payment_date)',$day);  
        $this->db->where('Month(Payment_date)',date("m"));
        $this->db->where('YEAR(Payment_date)',date("Y"));
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $result = $this->db->get('tbl_center_payment');
        $result = $result->row();
       return $result->total_center;
    }
    public function get_date_wise_center_yearly($month){
        $this->db->select("SUM(amount) as total_center");
        $this->db->where('MONTH(payment_date)',$month); 
        $this->db->where('YEAR(payment_date)',date("Y"));
        $this->db->where('payment_status','1');
        $this->db->where('is_deleted','0');
        $result = $this->db->get('tbl_center_payment');
        $result = $result->row();
        return $result->total_center;
    }
    public function get_date_wise_center_total_collection($years){
        $this->db->select("SUM(amount) as total_center");
        $this->db->where('YEAR(payment_date)',$years);  
        $this->db->where('is_deleted','0');
        $result = $this->db->get('tbl_center_payment');
        $result = $result->row();
       return $result->total_center;
    }
    public function get_date_wise_student_amount_yearly($month){
        $type_of_fee = array('1','4','2');
        $this->db->select("SUM(total_fees) as total_admission_fees");       
        $this->db->where('is_deleted','0');
        $this->db->where_in('fees_type',$type_of_fees);
        $this->db->where('MONTH(payment_date)',$month);
        $this->db->where('YEAR(payment_date)',date("Y")); 
        $this->db->where('payment_status','1'); 
        $admission_fees = $this->db->get('tbl_student_fees');
        $admission_fees = $admission_fees->row();

        $this->db->select("SUM(amount) as total_migration");
        $this->db->where('is_deleted','0');
        $this->db->where('YEAR(created_on)',date("Y")); 
        $this->db->where('payment_status','1');
        $this->db->where('MONTH(created_on)',$month); 
        $total_migration  = $this->db->get('tbl_student_migration');
        $total_migration = $total_migration->row();
        
        $this->db->select("SUM(amount) as total_provisional"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1'); 
        $this->db->where('MONTH(created_on)',$month); 
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_provisional  = $this->db->get('tbl_student_provisional_degree');
        $total_provisional = $total_provisional->row(); 
      
        $this->db->select("SUM(amount) as total_transfer"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');  
        $this->db->where('MONTH(created_on)',$month); 
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_transfer = $this->db->get('tbl_student_transfer');
        $total_transfer = $total_transfer->row(); 
      
    
        $this->db->select("SUM(amount) as total_degree");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('MONTH(created_on)',$month);
        $this->db->where('YEAR(created_on)',date("Y"));   
        $total_degree  = $this->db->get('tbl_student_degree');
        $total_degree = $total_degree->row(); 
       
        $this->db->select("SUM(amount) as total_transcript");
        $this->db->where('tbl_transcript.is_deleted','0');
        $this->db->where('tbl_transcript.payment_status','1');
        $this->db->where('MONTH(created_on)',$month);  
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_transcript  = $this->db->get('tbl_transcript');
        $total_transcript = $total_transcript->row();
        //return ($total_transcript->total_transcript);
 
        return $admission_fees->total_admission_fees+$total_migration->total_migration+$total_provisional->total_provisional+$total_transfer->total_transfer+$total_degree->total_degree+$total_transcript->total_transcript;


    }
    public function get_date_wise_Separate_student_amount_yearly($month){
    
        $this->db->select("SUM(tbl_separate_student_fees.fees) as total_admission_fees"); 
        $this->db->where('is_deleted','0');
        $this->db->where('Month(created_on)',$month); 
        $this->db->where('YEAR(created_on)',date("Y")); 
        $admission_fees_separate = $this->db->get('tbl_separate_student_fees');
        $admission_fees_separate = $admission_fees_separate->row();
       
        $this->db->select("SUM(amount) as total_migration");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('Month(created_on)',$month); 
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_migration  = $this->db->get('tbl_separate_student_migration');
        $total_migration = $total_migration->row();

    
        $this->db->select("SUM(amount) as total_provisional"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1'); 
        $this->db->where('month(created_on)',$month); 
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
        $total_provisional = $total_provisional->row(); 
       
        $this->db->select("SUM(amount) as total_transfer"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');  
        $this->db->where('Month(created_on)',$month); 
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_transfer = $this->db->get('tbl_separate_student_transfer');
        $total_transfer = $total_transfer->row(); 


        $this->db->select("SUM(amount) as total_degree");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('Month(created_on)',$month);  
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_degree  = $this->db->get('tbl_separate_student_degree');
        $total_degree = $total_degree->row(); 

        $this->db->select("SUM(amount) as total_transcript");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('Month(created_on)',$month);  
        $this->db->where('YEAR(created_on)',date("Y")); 
        $total_transcript  = $this->db->get('tbl_separate_transcript');
        $total_transcript = $total_transcript->row();
        return $admission_fees_separate->total_admission_fees+$total_migration->total_migration+$total_provisional->total_provisional+$total_transfer->total_transfer+$total_degree->total_degree+$total_transcript->total_transcript;
      

        
     }
     public function get_date_wise_student_total_collection($year){
        $type_of_fee = array('1','4','2');
        $this->db->select("SUM(tbl_student_fees.total_fees) as total_admission_fees"); 
        $this->db->where('is_deleted','0');
        $this->db->where('YEAR(payment_date)',$year);
        $this->db->where_in('fees_type',$type_of_fee); 
        $this->db->where('payment_status','1');
        $admission_fees = $this->db->get('tbl_student_fees');
        $admission_fees = $admission_fees->row();
        

        $this->db->select("SUM(amount) as total_migration");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('YEAR(created_on)',$year); 
        $total_migration  = $this->db->get('tbl_student_migration');
        $total_migration = $total_migration->row();
        
    
        $this->db->select("SUM(amount) as total_provisional"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1'); 
        $this->db->where('YEAR(created_on)',$year); 
        $total_provisional  = $this->db->get('tbl_student_provisional_degree');
        $total_provisional = $total_provisional->row(); 
    
        $this->db->select("SUM(amount) as total_transfer"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');  
        $this->db->where('YEAR(created_on)',$year); 
        $total_transfer = $this->db->get('tbl_student_transfer');
        $total_transfer = $total_transfer->row(); 

        $this->db->select("SUM(amount) as total_degree");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('YEAR(created_on)',$year);  
        $total_degree  = $this->db->get('tbl_student_degree');
        $total_degree = $total_degree->row(); 
    
        $this->db->select("SUM(amount) as total_transcript");
        $this->db->where('tbl_transcript.is_deleted','0');
        $this->db->where('tbl_transcript.payment_status','1');
        $this->db->where('YEAR(created_on)',$year);  
        $total_transcript  = $this->db->get('tbl_transcript');
        $total_transcript = $total_transcript->row();
        return $admission_fees->total_admission_fees+$total_migration->total_migration+$total_provisional->total_provisional+$total_transfer->total_transfer+$total_degree->total_degree+$total_transcript->total_transcript;   
        
     }
     public function get_date_wise_Separate_student_total_collection($year){
      
        $this->db->select("SUM(tbl_separate_student_fees.fees) as total_admission_fees"); 
        $this->db->where('is_deleted','0');
        $this->db->where('YEAR(created_on)',$year); 
        $admission_fees_separate = $this->db->get('tbl_separate_student_fees');
        $admission_fees_separate = $admission_fees_separate->row();
       
        $this->db->select("SUM(amount) as total_migration");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('YEAR(created_on)',$year); 
        $total_migration  = $this->db->get('tbl_separate_student_migration');
        $total_migration = $total_migration->row();
      
    
        $this->db->select("SUM(amount) as total_provisional"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1'); 
        $this->db->where('YEAR(created_on)',$year); 
        $total_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
        $total_provisional = $total_provisional->row(); 
      
        $this->db->select("SUM(amount) as total_transfer"); 
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');  
        $this->db->where('YEAR(created_on)',$year); 
        $total_transfer = $this->db->get('tbl_separate_student_transfer');
        $total_transfer = $total_transfer->row(); 
        
        $this->db->select("SUM(amount) as total_degree");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('YEAR(created_on)',$year);  
        $total_degree  = $this->db->get('tbl_separate_student_degree');
        $total_degree = $total_degree->row(); 
        $this->db->select("SUM(amount) as total_transcript");
        $this->db->where('is_deleted','0');
        $this->db->where('payment_status','1');
        $this->db->where('YEAR(created_on)',$year);  
        $total_transcript  = $this->db->get('tbl_separate_transcript');
        $total_transcript = $total_transcript->row();
        return $admission_fees_separate->total_admission_fees+$total_migration->total_migration+$total_provisional->total_provisional+$total_transfer->total_transfer+$total_degree->total_degree+$total_transcript->total_transcript;


     }
     public function get_student_payment_pending(){
        $this->db->select('tbl_examination_form.year_sem,tbl_examination_form.examination_fees,tbl_examination_form.student_id,tbl_examination_form.payment_date,tbl_student.mobile,tbl_student.year_sem,tbl_examination_form.id as exam_id,tbl_examination_form.student_id');
        $this->db->where('tbl_examination_form.is_deleted','0');
        $this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
        $this->db->group_by('tbl_examination_form.student_id'); 
        $this->db->order_by('tbl_examination_form.id','DESC');
        $result = $this->db->get('tbl_examination_form');
        $result = $result->result();
        return $result;
     }

     public function get_center_name_pending_student($id){   
        $this->db->where('is_deleted','0');
        $this->db->where('student_id',$id);
        $result = $this->db->get('tbl_center');
        $result = $result->row();    
        return $result;       
     }
     public function get_student_pending_info($student_id,$year_sem){
        $this->db->select('tbl_student.*,tbl_center.center_name');
        $this->db->where('tbl_student.is_deleted','0');
        $this->db->where('tbl_student.id',$student_id);
        $this->db->where('tbl_student.year_sem',$year_sem);
        $this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
        $result = $this->db->get('tbl_student');
        return $result->row();
       
     }
     public function get_student_reregistration_info($student_id,$year_sem){
        $this->db->select('tbl_student.*,tbl_center.center_name');
        $this->db->where('tbl_student.is_deleted','0');
        $this->db->where('tbl_student.id',$student_id);
        $this->db->where('tbl_student.year_sem',$year_sem);
        $this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
        $result = $this->db->get('tbl_student');
        return $result->row();
     }
     public function get_examination_all(){
        $this->db->select('tbl_student.*,tbl_student_fees.payment_date,tbl_student_fees.transaction_id,tbl_student_fees.amount');
        $this->db->where('tbl_student.is_deleted','0');
        $this->db->where('tbl_student_fees.student_id',$this->uri->segment(2));
        $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
        $result = $this->db->get('tbl_student_fees');
        $result = $result->result();
        return $result;
       
     }
     public function get_student_pending_reregistration(){

        $this->db->select('tbl_re_registered_student.*,tbl_student.course_id,tbl_student.course_mode,tbl_student.mobile');
        $this->db->join('tbl_student','tbl_student.id = tbl_re_registered_student.student_id');
        $this->db->group_by('tbl_re_registered_student.student_id'); 
        $this->db->order_by('tbl_re_registered_student.id','DESC');
        $result = $this->db->get('tbl_re_registered_student');

        $result = $result->result();
        return $result;

     }
     public function get_student_name_center(){
        $this->db->select('tbl_student.student_name,tbl_center.center_name');
        $this->db->where('tbl_student.is_deleted','0');
        $this->db->where('tbl_student.id',$this->uri->segment(2));
        $this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
        $result = $this->db->get('tbl_student');
        $result = $result->row();
        return $result;
     }
     public function get_reregistration_all(){
        $this->db->select('tbl_student.id as stud_id,tbl_student.*,tbl_re_registered_student.created_on as date,tbl_re_registered_student.transaction_id,tbl_re_registered_student.payment_amount');
        $this->db->where('tbl_re_registered_student.is_deleted','0');
        $this->db->where('tbl_re_registered_student.student_id',$this->uri->segment(2));
        //$this->db->join('tbl_student','tbl_student.id = tbl_center.student_id');
        //$this->db->join('tbl_fees_realtion','tbl_fees_realtion.id = tbl_student.center_id');
        $this->db->join('tbl_student','tbl_student.id = tbl_re_registered_student.student_id');
        $result = $this->db->get('tbl_re_registered_student');
        $result = $result->result();
        return $result;
             
     }
     public function get_center_share_reregistration($student_id,$session_id,$course_id,$stream_id){
        $this->db->select('tbl_fees_realtion.*');
        $this->db->where('course_id',$course_id);
        $this->db->where('session_id',$session_id);
        $this->db->where('is_deleted','0');
        $this->db->where('stream_id',$stream_id);
        $result = $this->db->get('tbl_fees_realtion');
        $result = $result->row();
       // print_r($result);
       return $result;
     }
     public function get_center_share($student_id){
             
        $this->db->select('tbl_center.fee_share,tbl_student.id,tbl_student.country,tbl_center.id as center_id ');
        $this->db->where('tbl_student.is_deleted','0');
        $this->db->where('tbl_student.id',$student_id);
        $this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
        $result =  $this->db->get('tbl_student');
        $result = $result->row();
        return $result;
     }
}
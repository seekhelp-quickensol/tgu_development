<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ext_account_api extends CI_Controller { 
    public function __construct() {
        parent::__construct();
        $this->load->model('api/Ext_account_model');
    }
    public function get_ext_account_login() {
        $this->Ext_account_model->get_ext_account_login();
    }
    public function get_ext_update_password() {
        $this->Ext_account_model->get_ext_update_password();
    }
    public function get_ext_student_list() {
        $this->Ext_account_model->get_ext_student_list();
    }
    public function get_ext_single_student_account() {
        $this->Ext_account_model->get_ext_single_student_account();
    }
    public function get_ext_single_student_account_migration() {
        $this->Ext_account_model->get_ext_single_student_account_migration();
    }
    public function get_ext_single_account() {
        $this->Ext_account_model->get_ext_single_account();
    }
    public function get_ext_bank_account() {
        $this->Ext_account_model->get_ext_bank_account();
    }
    public function get_ext_get_unique_transaction() {
        $this->Ext_account_model->get_ext_get_unique_transaction();
    }
    public function set_ext_payment_details() {
        $this->Ext_account_model->set_ext_payment_details();
    }
    public function get_ext_get_my_verified_list() {
        $this->Ext_account_model->get_ext_get_my_verified_list();
    }
    public function get_ext_delete_transaction() {
        $this->Ext_account_model->get_ext_delete_transaction();
    }
    public function get_ext_confrom_all_verified() {
        $this->Ext_account_model->get_ext_confrom_all_verified();
    }
    public function get_ext_single_student_account_ledger() {
        $this->Ext_account_model->get_ext_single_student_account_ledger();
    }
    public function get_ext_student_paid_addmission_fees() {
        $this->Ext_account_model->get_ext_student_paid_addmission_fees();
    }
    public function get_ext_student_paid_exam_fees() {
        $this->Ext_account_model->get_ext_student_paid_exam_fees();
    }
    public function get_ext_delete_migration_fees() {
        $this->Ext_account_model->get_ext_delete_migration_fees();
    }
    public function get_ext_single_student_account_migration_details() {
        $this->Ext_account_model->get_ext_single_student_account_migration_details();
    }
    public function set_ext_migration_payment() {
        $this->Ext_account_model->set_ext_migration_payment();
    }
    public function get_ext_single_student_account_provisional() {
        $this->Ext_account_model->get_ext_single_student_account_provisional();
    }
    public function get_ext_delete_provisional_degree() {
        $this->Ext_account_model->get_ext_delete_provisional_degree();
    }
    public function get_ext_single_student_account_provisional_degree_details() {
        $this->Ext_account_model->get_ext_single_student_account_provisional_degree_details();
    }
    public function set_ext_provisional_degree_payment() {
        $this->Ext_account_model->set_ext_provisional_degree_payment();
    }
}
<?php
class answer_model
{

    private $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    public static function get_answer_to_form($id_question)
    {
        return $data = Database::query("SELECT ans_id, ans_description FROM cap_answer WHERE qus_id = ". $id_question ." AND ans_status = 1 AND ans_description != 'Falta respuesta'");
    }

    public static function create_answer($qus_id, $ans_id, $per_id, $afr_date)
    {
        $rees = Database::queryChange("INSERT INTO cap_ans_form(qus_id, ans_id, per_id, afr_date_register) VALUES (?,?,?,?)", 
        array($qus_id,$ans_id,$per_id,$afr_date));

        return $rees;
    }

}

?>
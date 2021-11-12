<?php
class result_model
{
    private $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    public static function get_result_to_form($per_id)
    {
        $result = Database::query("SELECT mat_result, mat_product FROM cap_matriz  
        WHERE mat_answerone = (SELECT ans_id FROM cap_ans_form WHERE qus_id = 7 AND per_id = '".$per_id."')");
        return $result ;
    }
    public static function get_question_answer()
    {
        $result = Database::query("SELECT cap_answer.ans_description
        FROM cap_ans_form,cap_question,cap_answer,cap_person
        WHERE cap_ans_form.per_id = cap_person.per_id and cap_ans_form.qus_id =cap_question.qus_id and cap_ans_form.ans_id = cap_answer.ans_id");
        return $result ;
    }
    public static function get_tips_to_form($per_id)
    {
        $result = Database::query("SELECT mat_result, mat_product, mat_key_code FROM cap_matriz  
        WHERE mat_answerone = (SELECT ans_id FROM cap_ans_form WHERE qus_id = 11 AND per_id = '".$per_id."') 
        AND mat_answertwo = (SELECT ans_id FROM cap_ans_form WHERE qus_id = 12 AND per_id = '".$per_id."')");
        return $result ;
    }

}
?>
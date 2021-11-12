<?php
class question_model
{

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public static function get_questions()
    {
        $data = Database::query(
            "SELECT  cap_person.per_id, cap_ans_form.afr_id,cap_person.per_mail,cap_person.per_name,cap_person.per_lastname,cap_ans_form.afr_date_register
        FROM cap_ans_form,cap_person
        WHERE cap_ans_form.per_id = cap_person.per_id GROUP BY cap_person.per_id;");
        return $data;
    }

    // WEB

    public static function create_person_from_form($person)
    {
        Database::queryChange("INSERT INTO cap_person(per_name,per_lastname, per_mail, per_year, per_sex, per_phone, per_date, per_status) VALUES (?,?,?,?,?,?,?,?)",
            array($person["per_name"], $person["per_lastname"], $person["per_mail"], $person["per_year"], $person["per_sex"], $person["per_phone"], $person["date"], 1));

    }

    public static function get_person($person)
    {
        $person_date= Database::query("SELECT per_mail, per_name, per_sex FROM cap_person WHERE per_id =" . $person );
        return $person_date;

    }

    public static function search_person($person)
    {
        $id = Database::query("SELECT per_id FROM cap_person WHERE per_name ='" . $person['per_name'] . "'AND per_lastname = '" . $person['per_lastname'] . "' AND per_mail='" . $person['per_mail'] . "' AND per_phone= '" . $person['per_phone'] . "'");

        if ( count($id) == 0 ) {
            return "Null";
        } else {
            foreach ($id as $idperson) {
                $per_id = $idperson['per_id'];
            }
            return ['accion'=> 'E','datos'=>$per_id];
        }

    }

    public static function search_person_two($person)
    {
        $id = Database::query("SELECT per_id FROM cap_person WHERE per_name ='" . $person['per_name'] . "'AND per_lastname = '" . $person['per_lastname'] . "' AND per_mail='" . $person['per_mail'] . "' AND per_phone= '" . $person['per_phone'] . "'");

        if ( count($id) == 0 ) {
            return "Null";
        } else {
            foreach ($id as $idperson) {
                $per_id = $idperson['per_id'];
            }
            return ['accion'=> 'C','datos'=>$per_id];
        }

    }

    public static function get_question_to_form()
    {
        return $data = Database::query("SELECT qus_id, qus_description FROM cap_question WHERE qus_status = 1");
    }

}

<?php
require "send_mail.php";
class question_controller
{
    public static function decoding()
    {

        $cadena = explode('/', $_SERVER["REQUEST_URI"]);
        if (isset($cadena[3])) {
            try {
                $cadena = $cadena[3];
                $cadena = base64_decode($cadena);
                $control = "control";
                $cadena = str_replace($control, "", "$cadena");
                $cadena_get = explode("&", $cadena);
                return $cadena_get;

            } catch (Event $e) {
                echo $e;
            }
        } else {
            include_once "vistas/public/select.php";
        }

    }

    public static function index()
    {
        date_default_timezone_set('America/Lima');
        $date = date('YmdhisA');

        include_once "vistas/public/select.php";
    }

    public static function question()
    {

        $cadena_get = question_controller::decoding();

        foreach ($cadena_get as $value) {
            $val_gets = explode("=", $value);
            $_GET[$val_gets[0]] = utf8_decode($val_gets[1]);
        }

        if ($_GET['id']) {
            $id_person = $_GET['id'];
            $question = question_model::get_question_to_form();
            include_once "vistas/public/question.php";
        } else {
            $error = "404IDN";
            include_once "vistas/public/error.php";
        }

    }

    public static function person_create()
    {

        $person['per_name'] = $_REQUEST['per_name'];
        $person['per_lastname'] = $_REQUEST['per_lastname'];
        $person['per_mail'] = $_REQUEST['per_mail'];
        $person['per_year'] = $_REQUEST['per_year'];
        $person['per_sex'] = $_REQUEST['per_sex'];
        $person['per_phone'] = $_REQUEST['per_phone'];
        $person['date'] = $_REQUEST['date'];

        $data = question_model::search_person($person);
        if ($data == "Null") {

            question_model::create_person_from_form($person);
            $data = question_model::search_person_two($person);
            echo json_encode($data);

        } elseif ($data !== "Null") {
            echo json_encode($data);
        }
    }

    public static function person_update()
    {

        $person['per_name'] = $_REQUEST['per_name'];
        $person['per_lastname'] = $_REQUEST['per_lastname'];
        $person['per_mail'] = $_REQUEST['per_mail'];
        $person['per_year'] = $_REQUEST['per_year'];
        $person['per_sex'] = $_REQUEST['per_sex'];
        $person['per_phone'] = $_REQUEST['per_phone'];
        $person['date'] = $_REQUEST['date'];

        question_model::create_person_from_form($person);
        $data = question_model::search_person_two($person);
        echo json_encode($data);
    }

    public static function register_answer_from_form()
    {
        // date_default_timezone_set('America/Lima');
        $date = date('Y/m/d h:i:s A');

        $person = $_POST['id_person'];
        $datos =
            [
            [
                "qus_id" => "1",
                "ans_id" => $_POST['1'],
            ],
            [
                "qus_id" => "2",
                "ans_id" => $_POST['2'],
            ],
            [
                "qus_id" => "3",
                "ans_id" => $_POST['3'],
            ],
            [
                "qus_id" => "4",
                "ans_id" => $_POST['4'],
            ],
            [
                "qus_id" => "5",
                "ans_id" => $_POST['5'],
            ],
            [
                "qus_id" => "6",
                "ans_id" => $_POST['6'],
            ],
            [
                "qus_id" => "7",
                "ans_id" => $_POST['7'],
            ],
            [
                "qus_id" => "8",
                "ans_id" => $_POST['8'],
            ],
            [
                "qus_id" => "9",
                "ans_id" => $_POST['9'],
            ],
            [
                "qus_id" => "10",
                "ans_id" => $_POST['10'],
            ],
            [
                "qus_id" => "11",
                "ans_id" => $_POST['11'],
            ],
            [
                "qus_id" => "12",
                "ans_id" => $_POST['12'],
            ],
        ];
        foreach ($datos as $dato) {
            answer_model::create_answer($dato["qus_id"], $dato["ans_id"], $person, $date);
        }

        $uriSplit = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $res = question_controller::sended_email($person);
        
        if ($res == true) {
            // $resp = "nou";
            $res = ['status' => '1'];
        } else {
            // $resp = "yes";
            $res = ['status' => '0'];
        }
        echo json_encode($res);

    }

    public static function sended_email($id){
        $name="";
        $emailto="";
        $gender="";
        $result_zero="";
        $other_result="";
        $products="";
        $stored="";
        foreach ((question_model::get_person($id)) as $data) {
            $name = utf8_decode($data['per_name']);
            $emailto = utf8_decode($data['per_mail']);
            $gender = utf8_decode($data['per_sex']);
        }

        foreach (result_model::get_result_to_form($id) as $tip) {
            $result_zero = utf8_decode($tip['mat_result']);
        }

        foreach (result_model::get_tips_to_form($id) as $tip) {
            $other_result = utf8_decode($tip['mat_result']);
            $products = utf8_decode(str_replace('-', ' </li><li> ', utf8_decode($tip['mat_product'])));
            $stored = $tip["mat_key_code"];
        }

        $response = send_mail($name, $emailto, $gender, $result_zero, $other_result, $products, $stored, $id);

        if($response == true){
            return true;
        }else{
            return false;
        }
        
    }

    public static function admin_claim()
    {
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {

            $listclaim = question_model::get_questions();
            $listquestion = question_model::get_question_to_form();

            $list_question_answer = result_model::get_question_answer();

            include_once "vistas/admin/admin_claim/admin_claim.php";
        } else {
            include_once "vistas/login.php";
        }
    }

    public static function claim_ver()
    {
        $userSession = new user_session_model();

        if (isset($_SESSION['user'])) {
            $cadena = explode('/', $_SERVER["REQUEST_URI"]);
            if (isset($cadena[3])) {

                $id_person = $cadena[3];

            }
            //$status = $claim;
            //$projects = $claim;

            //$liststatus = question_model::getAllStatus();

            $tip_zero = result_model::get_result_to_form($id_person);
            $tip_others = result_model::get_tips_to_form($id_person);
            include_once "vistas/admin/admin_claim/admin_result.php";
        } else {
            include_once "vistas/login.php";
        }
    }
    public static function admin_download()
    {
        $userSession = new user_session_model();

        if (isset($_SESSION['user'])) {
            $cadena = explode('/', $_SERVER["REQUEST_URI"]);
            if (isset($cadena[3])) {

                $id_person = $cadena[3];

            }
            //$status = $claim;
            //$projects = $claim;

            //$liststatus = question_model::getAllStatus();
            $listclaim = question_model::get_questions();
            $listquestion = question_model::get_question_to_form();

            $list_question_answer = result_model::get_question_answer();
            $tip_zero = array();
            $tip_others = array();

            foreach ($listclaim as $x) {

                array_push($tip_zero, result_model::get_result_to_form($x["per_id"]));
                array_push($tip_others, result_model::get_tips_to_form($x["per_id"]));

            };

            include_once "vistas/admin/admin_claim/admin_download.php";
        } else {
            include_once "vistas/login.php";
        }
    }

}

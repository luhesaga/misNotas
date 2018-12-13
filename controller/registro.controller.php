<?php
require_once 'model/registro.php';

class registroController{

    private $model;

    public function __construct(){
        $this->model = new registro();
    }


    public function listarNotas($user){
        $reg = new registro();
        $reg = $this->model->listaNot($user);
        return $reg;

    }

    public function listarDetalle($id){
        $serv = new serviceMF();
        $serv = $this->model->serviceId($id);
        return $serv;

    }

    public function inscribir($id,$user,$horario){
        $serv = new serviceMF();
        $serv = $this->model->suscribir($id,$user,$horario);
        return $serv;

    }


}

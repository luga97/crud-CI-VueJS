<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tareas_ajax extends CI_Controller {
   private $request;
   public function __construct(){
      parent::__construct();
      $this->load->model('Estado_model');
      $this->load->model('Tarea_model');
      $this->request = json_decode(file_get_contents('php://input'));
   }
   public function recuperar_estados(){
      $estados = $this->Estado_model->listar();
      echo json_encode($estados);
   }
   public function recuperar_tareas(){
      $tareas = $this->Tarea_model->listar();
      echo json_encode($tareas);
   }
   public function crear_tarea(){
      $this->Tarea_model->insertar(array(
         'titulo' => $this->request->titulo,
         'descripcion' => $this->request->descripcion
      ));
   }
   public function modificar_tarea(){
      $this->Tarea_model->modificar(array(
         'id_tarea' => $this->request->id_tarea,
         'titulo' => $this->request->titulo,
         'descripcion' => $this->request->descripcion,
         'id_estado' => $this->request->id_estado
      ));
   }
   public function eliminar_tarea(){
      $this->Tarea_model->eliminar(array(
         'id_tarea' => $this->request->id_tarea
      ));

   }
}
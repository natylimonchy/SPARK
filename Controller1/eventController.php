<?php


require_once("../Model/EventModel.php");

class EventController {
    
    private $model;

    public function __construct() {
        $this->model = new EventModel();
    }

 public function registerEvent() {
        
}

public function getEvents() {
   
}


public function updateEvent($Id_Evento, $nombre, $descripcion, $fecha_evento, $ubicacion) {
   
        return $this->model->updateEvent($Id_Evento, $nombre, $descripcion, $fecha_evento, $ubicacion);
     
   
}
public function deleteEvent($Id_Evento){
    
        return $this->model->deleteEvent($Id_Evento);


}
}
?>


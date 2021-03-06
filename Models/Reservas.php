<?php 
namespace Models;
use Lib\DataBase;

class Reservas extends Database{
    public function __construct(
        ){
          parent::__construct();
        }

    function getIdSesion($id){
        $prep = $this->conexion->prepare('select sesion_id from reservas,sesiones where reservas.id= :id');
        return $prep->execute(array(':id'=>$id));
    }

    function consulReservas($id = ''){
        if ($id != ''){
            $prep = $this->conexion->prepare('select reservas.id, sesiones.pelicula, sesiones.fecha from reservas,clientes,sesiones where reservas.cliente_id = clientes.id and reservas.sesion_id=sesiones.id and reservas.cliente_id = :id');
            $prep->execute(array(':id'=>$id));
            return $prep;
        }else{
            $sql = 'select clientes.nombre as Cnombre, clientes.apellidos as Capellidos, reservas.id, sesiones.pelicula, sesiones.fecha from reservas,clientes,sesiones where reservas.cliente_id = clientes.id and reservas.sesion_id=sesiones.id';
            return $this->conexion->query($sql);
        }
    }

    function deleteReserva($id){
        $prep = $this->conexion->prepare('delete from reservas where id=:id');
        $prep->execute(array(':id'=>$id));
    }

    function Consuldet(){
        $sqlP = 'select id, nombre, apellidos, alta from clientes';
        $sqlD = 'select  id, pelicula, fecha, butacas_disponibles from sesiones';
        $resul = [];
        $resul['clientes'] = $this->conexion->query($sqlP);
        $resul['sesiones'] = $this->conexion->query($sqlD);
        return $resul;
    }

    function insertReservas($data){
        $prep = $this->conexion->prepare('Insert into reservas(cliente_id, sesion_id) values(:cliente,:sesion)');
        foreach($data as $clave=>$dato){
            $prep->bindValue($clave,$dato);
        }
        $prep->execute();
    }

    function quitarButaca($id){
        $prep = $this->conexion->prepare('update sesiones set butacas_disponibles = (butacas_disponibles-1) where id=:id');
        $prep->execute(array(':id'=>$id));
    }

    function anadirButaca($id){
        $prep = $this->conexion->prepare('update sesiones set butacas_disponibles = (butacas_disponibles+1) where id=:id');
        $prep->execute(array(':id'=>$id));
    }

    // function anadirButaca2($id_reserva){
    //     $this->conexion->$this->conexion->prepare("select sesion_id from reservas where id= :id");
    //     $this->conexion->execute(array(':id'=>$id_reserva));
    //     $id = $this->conexion->extraer_registro();
    //     $prep = $this->conexion->prepare('update sesiones set butacas_disponibles = (butacas_disponibles+1) where id=:id');
    //     $prep->execute(array(':id'=>$id));
    // }
}



?>

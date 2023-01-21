<?php


class Categoria extends Conectar{

//Metodo get para obtener los datos de la organizacion
    public function get_organizacion(){
        $conectar=parent::conexion();
        parent::set_name();
        
        $sql="SELECT * FROM organizacion";
        $sql=$conectar->prepare($sql);
        $sql->execute();
 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

//Metodo get para consultar el personal
    public function get_personal(){
        $conectar=parent::conexion();
        parent::set_name();
        
        $sql="SELECT * FROM personal";
        $sql=$conectar->prepare($sql);
        $sql->execute();
 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

//Metodo get para obtener productos
    public function get_productos(){
       $conectar=parent::conexion();
       parent::set_name();
       
       $sql="SELECT * FROM tm_categoria";
       $sql=$conectar->prepare($sql);
       $sql->execute();

       return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Metodo get para obtener productos mediante consulta del cliente, 
    //para esto se usa Thunder Client en contenido json
    public function get_productos_x_codigo($cat_id){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="SELECT * FROM tm_categoria WHERE cat_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

     //Metodo para ingresar la información básica y el rol del personal 
     public function set_personal($Nombre,$Contacto,$Rol){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="INSERT INTO personal(ID, Nombre, Contacto, Rol) VALUES(NULL, ?, ?, ?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$Nombre);
        $sql->bindValue(2,$Contacto);
        $sql->bindValue(3,$Rol);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }


     //Metodo para enviar nombre, descripción y foto del producto 
     public function set_producto($Nombre,$Descripcion,$Foto){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="INSERT INTO tm_categoria(cat_id, Nombre, Descripcion, Foto) VALUES(NULL, ?, ?, ?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$Nombre);
        $sql->bindValue(2,$Descripcion);
        $sql->bindValue(3,$Foto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

      //Metodo para registrar la información enviada por el cliente 
      public function set_contacto($Nombre_cliente,$Mensaje){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="INSERT INTO contacto(ID, Nombre_cliente, Mensaje) VALUES(NULL, ?, ?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$Nombre_cliente);
        $sql->bindValue(2,$Mensaje);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

}


?>
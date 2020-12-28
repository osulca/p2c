<?php
class Estudiantes{
    public function traerTodo(){
        $array = [
            [
                "nombres"=>"Marcela",
                "apellidos"=>"Briceño"
            ],
            [
                "nombres"=>"Pedro",
                "apellidos"=>"Perez"
            ],
            [
                "nombres"=>"Antonio",
                "apellidos"=>"Suarez"
            ],
            [
                "nombres"=>"Maria",
                "apellidos"=>"Estevez"
            ],
            [
                "nombres"=>"Josefina",
                "apellidos"=>"Torres"
            ]
        ];
        return $array;
    }
}

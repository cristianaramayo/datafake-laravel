<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Faker;


class FakeLib 
{
    
    private function attachMain($data_string)
    {
        /*
        $data_string = 
        "fake_workers = [{'x,
        'Worker Name' : fake .name(10),
        'Hire Date' : fake.date(5),
        'Production Date' : fake.date.only,
        'Number Produced ' : fake.randomNumber(),
        'Worker Status' : random([part_time, full_time]),
        'Team' : random([azul, rojo, amarillo, verde]), 
        } for x in range(30)]";
        */
        //----------------------------------------------
        //Convertimos de string a array separados por saltos de carro 
        $split_inputs = $This->splitInputs($data_string);
        //$string = str_replace(" ", "",$string);
        array_shift($split_inputs);
        $data_row = array_pop($split_inputs);

        $fake_num_sent = [];
        $fake_sent = [];
        $random_sent =[];
        
        $fake_only_sent =[];
        //Separamos Inputs o "Saltos de carro" segun el tipo
        foreach ($split_inputs as $input)
        {
            switch ($this->typeSentence($input)) {
                case "fake"://fake[]
                    array_push($fake_sent, $input);
                    break;
                case "fake.num"://fake[num]
                    array_push($fake_num_sent, $input);
                    break;
                case "fake.only"://fake()
                    array_push($fake_only_sent, $input);
                    break;
                case "randmon"://random[array]
                    array_push($random_sent, $input);
                    break;
            }
        }
        //Obtenemos array de arrays random ingresado por el usuario (datos reales)
        $random_array = [];
        foreach($random_sent as $input){
            array_push($random_array, $this->splitArray($input));    
        }

        //Se ordena el Array con sentencias 'fake[num]', con 'num' mayor primero
        $fake_num_sent = $this->orderByCount($fake_num_sent);
        $first_fake = array_shift($fake_num_sent);//obtenemos y guardamos el primer input
        //Completamos con datos falsos los demas, y los guardamos en un array
        $faker = Faker\Factory::create('es_ES');
        $fake_num_array = [];
        foreach($fake_num_sent as $input){
            array_push($fake_num_array, $this->factoryArray($input, $faker));    
        }

        $f_count = $this->splitCount($first_fake);//toma el primero
        $f_key = $this->splitName($first_fake);
        $f_type =$this->splitType($first_fake);

        //Completamos con datos falsos el primer y mayor input 
        $partial_array = [];
        for($i=1; $i<=$f_count; $i++){

            $faker_row = [];
            $faker_row[$f_key] = $faker->$f_type;
            foreach ($fake_num_array as $fake_column ){      
                $key = array_key_first($fake_column);
                $value = $fake_column[$key];
                $faker_row[$key] = array_rand(array_flip($value), 1);   
            }
            //
            foreach($fake_sent as $input){
                $key = $this->splitName($input);
                $type = $this->splitType($input);
                $faker_row[$key] = $faker->$type;
            }
            //
            foreach($random_array as $real_column){
                $key = array_key_first($real_column);
                $value = $real_column[$key];
                $faker_row[$key] = array_rand(array_flip($value), 1);
            }
            //Metemos filas al Array mayor
            array_push($partial_array, $faker_row);
        }       
        //var_dump($no_fake_array);
        
         
        $total_array = [];
        $row = $this->splitCount($data_row);
        for ($i=0; $i<=($row-1); $i++)
        {
            shuffle($partial_array);
            //elegimos un registro del array parcial al azar
            foreach($fake_only_sent as $input){
                $key = $this->splitName($input);
                $type = $this->splitType($input);
                $only_row[$key] = $faker->$type;
                //Y realizamos merge del valor 'independiente' al regitro 
                $total_array[$i] = array_merge($partial_array[1], $only_row);
            }           
            
        }
        return $total_array;
        
    }
    
    private function orderByCount($fake_num_sent)
    {
        $array = $fake_num_sent;
        $first_sent = array_shift($array);
        $mayor = $this->splitCount($array);//toma el primero
        $first = $first_sent;
        foreach ($array as $input ){      
            $count = $this->splitCount($input);
            if ($count>$mayor){
                $mayor = $count;
                $first = $input;
            }
        }
        $new_array = ($first);
        
        foreach ($fake_num_sent as $input){
            if ($input != $first){
                array_push($new_array, $input);
            }
        } 
        return $new_array;   
    }

    private function typeSentence($input)
    {
        $type ="";
        if(stristr($input, "fake.") == TRUE) {

            if(stristr($input, "[]") == TRUE) {
                $type = "fake";
            }elseif(stristr($input, "()") == TRUE){
                    $type = "fake.only";
            }elseif(empty(splitCount($input))){
                    $type = "fake.num";    
            }
        }elseif(stristr($input, "random") == TRUE){
            $type = "random";
        }
        return $type;
    }

    public function splitInputs($string)
    {
        $split = "\n";
        $array_string = explode($split, $string);
        
        
        //var_dump($string);
        return $array_string;
    }

    public function splitName($string)
    {
        //$string = str_replace(" ", "",$string);

        $name = "";
        $char = substr($string, 0, 1);
        
        while  ($char != ":") 
        {    
            
            $name = $name.$char ;        
            $string = substr($string, 1); 
            $char = substr($string, 0, 1);
        }
        $name = trim($name," '");        
        return $name;
    }

    public function splitCount($string)
    {
        $string = str_replace(" ", "",$string);

        
        $char = substr($string, (strlen($string)-1), 1);
        while  ((is_numeric($char)==FALSE) && ($char != "")) 
        {
            
            $string = substr($string, 0, (strlen($string)-1));
            $char = substr($string, (strlen($string)-1), 1);
            

        }
        $count = "";
        while  (is_numeric($char)) 
        {
            $count = $char.$count ; 
            $string = substr($string, 0, (strlen($string)-1));
            $char = substr($string, (strlen($string)-1), 1);
            

        }
        //lo convertimos a entero
        if ($count != "") $count = intval($count);
        return $count;
    }

    

    public function splitTitle($string)
    {
        //$string = str_replace(" ", "",$string);

        $name = "";
        $char = substr($string, 0, 1);
        
        while  ($char != "=") 
        {    
            
            $name = $name.$char ;        
            $string = substr($string, 1); 
            $char = substr($string, 0, 1);
        }
        $name = trim($name," '");        
        return $name;
    }

    public function splitType($string)
    {
        $string = str_replace(" ", "",$string);

        $name = "";
        
        $char = substr($string, (strlen($string)-1), 1);
        while  ($char != ".") 
        {    
            $name = $char.$name ;        
            
            $string = substr($string, 0, (strlen($string)-1));
            $char = substr($string, (strlen($string)-1), 1);

        }
        $type = "";
        $char = substr($name, 0, 1);
       
        while  ($char != "(") 
        {    
            
            $type = $type.$char ;        
            $name = substr($name, 1); 
            $char = substr($name, 0, 1);
        }
               
        return $type;
    }

   public function factoryArray($string, $faker)
    { 
        $type = $this->splitType($string);
        $llave = $this->splitName($string);

        $count = $this->splitCount($string);
        $array_f = [];
        for ($i=1; $i<=$count; $i++)
        {  
            array_push($array_f, $faker->$type); 
        }
        $array = [$llave => $array_f ]; 
        return $array;
    }
   
    public function splitArray($string)
    {
        

        $llave = $this->splitName($string);
        $string = str_replace(" ", "",$string);
        $array_i = explode('[', $string);
        $array_d = explode(']', $array_i[1]);
        $string_c = $array_d[0];

        $array_s = explode(',', $string_c);
        
        $array = [$llave => $array_s ];       

        return $array;
    }
}

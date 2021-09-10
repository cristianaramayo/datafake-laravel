<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Custom\FakeLib;

class DatasetController extends Controller
{
   
    public function strore(Request $request)
    {
        //recibimos un String DESDE FRONTEND  -----------
        
        $array = FakeLib::attachMain($request->code);
       
        $data1 = array_shift($array);
        $data2 = array_shift($array);
        $datan = array_pop($array);

        $datas = [$data1, $data2, $datan];

        //temporlamente
        $this->create($request->code);

        return Inertia::render('Show', compact('datas'));
        
    }

    public function create($data_string)
    {
        $split_array = FakeLib::splitInputs($data_string);
        //$string = str_replace(" ", "",$string);
        $data_name = array_shift($split_array);
        $my_name = $this->splitTitle($data_name);
        $array_csv = $this->attachMain($data_string);

        $this->createCsv($array_csv, $my_name);

    }  

    private function createCsv($array, $name)
    {
        // Creamos y abrimos un archivo con el nombre 'archivo.csv' 
        //$name = $name.'.csv';
        $file = fopen($name.'.csv', 'w');
        // Escribimos los datos en el archivo 'archivo.csv'
        //$array = array_map("utf8_decode", $array);
        foreach ($array as $row )
        {
            fputcsv($file, $row);
        }
    
        // Después de terminar de escribir los datos, cerramos el archivo 'archivo.csv'
        fclose($file);
    } 

    

}

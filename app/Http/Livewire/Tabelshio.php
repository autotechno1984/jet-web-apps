<?php

namespace App\Http\Livewire;

use App\Models\shio;
use Livewire\Component;

class Tabelshio extends Component
{

    public $index1 = 1;
    public $shio1;
    public $index2 = 2;
    public $shio2;
    public $index3 = 3;
    public $shio3;
    public $index4 = 4;
    public $shio4;
    public $index5 = 5;
    public $shio5;
    public $index6 = 6;
    public $shio6;
    public $index7 = 7;
    public $shio7;
    public $index8 = 8;
    public $shio8;
    public $index9 = 9;
    public $shio9;
    public $index10 = 10;
    public $shio10;
    public $index11 = 11;
    public $shio11;
    public $index12 = 12;
    public $shio12;
    public function render()
    {

        $shio = shio::select('nama','nomor')->get();
        return view('livewire.tabelshio',compact('shio'));

    }

    public function update()
    {

        $checkdata = shio::all();

        $data1 = array(

            array('nomor' => '01', 'nama' => $this->shio1),
            array('nomor' => '02', 'nama' => $this->shio2),
            array('nomor' => '03', 'nama' => $this->shio3),
            array('nomor' => '04', 'nama' => $this->shio4),
            array('nomor' => '05', 'nama' => $this->shio5),
            array('nomor' => '06', 'nama' => $this->shio6),
            array('nomor' => '07', 'nama' => $this->shio7),
            array('nomor' => '08', 'nama' => $this->shio8),
            array('nomor' => '09', 'nama' => $this->shio9),
            array('nomor' => '10', 'nama' => $this->shio10),
            array('nomor' => '11', 'nama' => $this->shio11),
            array('nomor' => '12', 'nama' => $this->shio12),
            array('nomor' => '13', 'nama' => $this->shio1),
            array('nomor' => '14', 'nama' => $this->shio2),
            array('nomor' => '15', 'nama' => $this->shio3),
            array('nomor' => '16', 'nama' => $this->shio4),
            array('nomor' => '17', 'nama' => $this->shio5),
            array('nomor' => '18', 'nama' => $this->shio6),
            array('nomor' => '19', 'nama' => $this->shio7),
            array('nomor' => '20', 'nama' => $this->shio8),
            array('nomor' => '21', 'nama' => $this->shio9),
            array('nomor' => '22', 'nama' => $this->shio10),
            array('nomor' => '23', 'nama' => $this->shio11),
            array('nomor' => '24', 'nama' => $this->shio12),
            array('nomor' => '25', 'nama' => $this->shio1),
            array('nomor' => '26', 'nama' => $this->shio2),
            array('nomor' => '27', 'nama' => $this->shio3),
            array('nomor' => '28', 'nama' => $this->shio4),
            array('nomor' => '29', 'nama' => $this->shio5),
            array('nomor' => '30', 'nama' => $this->shio6),
            array('nomor' => '31', 'nama' => $this->shio7),
            array('nomor' => '32', 'nama' => $this->shio8),
            array('nomor' => '33', 'nama' => $this->shio9),
            array('nomor' => '34', 'nama' => $this->shio10),
            array('nomor' => '35', 'nama' => $this->shio11),
            array('nomor' => '36', 'nama' => $this->shio12),
            array('nomor' => '37', 'nama' => $this->shio1),
            array('nomor' => '38', 'nama' => $this->shio2),
            array('nomor' => '39', 'nama' => $this->shio3),
            array('nomor' => '40', 'nama' => $this->shio4),
            array('nomor' => '41', 'nama' => $this->shio5),
            array('nomor' => '42', 'nama' => $this->shio6),
            array('nomor' => '43', 'nama' => $this->shio7),
            array('nomor' => '44', 'nama' => $this->shio8),
            array('nomor' => '45', 'nama' => $this->shio9),
            array('nomor' => '46', 'nama' => $this->shio10),
            array('nomor' => '47', 'nama' => $this->shio11),
            array('nomor' => '48', 'nama' => $this->shio12),
            array('nomor' => '49', 'nama' => $this->shio1),
            array('nomor' => '50', 'nama' => $this->shio2),
            array('nomor' => '51', 'nama' => $this->shio3),
            array('nomor' => '52', 'nama' => $this->shio4),
            array('nomor' => '53', 'nama' => $this->shio5),
            array('nomor' => '54', 'nama' => $this->shio6),
            array('nomor' => '55', 'nama' => $this->shio7),
            array('nomor' => '56', 'nama' => $this->shio8),
            array('nomor' => '57', 'nama' => $this->shio9),
            array('nomor' => '58', 'nama' => $this->shio10),
            array('nomor' => '59', 'nama' => $this->shio11),
            array('nomor' => '60', 'nama' => $this->shio12),
            array('nomor' => '61', 'nama' => $this->shio1),
            array('nomor' => '62', 'nama' => $this->shio2),
            array('nomor' => '63', 'nama' => $this->shio3),
            array('nomor' => '64', 'nama' => $this->shio4),
            array('nomor' => '65', 'nama' => $this->shio5),
            array('nomor' => '66', 'nama' => $this->shio6),
            array('nomor' => '67', 'nama' => $this->shio7),
            array('nomor' => '68', 'nama' => $this->shio8),
            array('nomor' => '69', 'nama' => $this->shio9),
            array('nomor' => '70', 'nama' => $this->shio10),
            array('nomor' => '71', 'nama' => $this->shio11),
            array('nomor' => '72', 'nama' => $this->shio12),
            array('nomor' => '73', 'nama' => $this->shio1),
            array('nomor' => '74', 'nama' => $this->shio2),
            array('nomor' => '75', 'nama' => $this->shio3),
            array('nomor' => '76', 'nama' => $this->shio4),
            array('nomor' => '77', 'nama' => $this->shio5),
            array('nomor' => '78', 'nama' => $this->shio6),
            array('nomor' => '79', 'nama' => $this->shio7),
            array('nomor' => '80', 'nama' => $this->shio8),
            array('nomor' => '81', 'nama' => $this->shio9),
            array('nomor' => '82', 'nama' => $this->shio10),
            array('nomor' => '83', 'nama' => $this->shio11),
            array('nomor' => '84', 'nama' => $this->shio12),
            array('nomor' => '85', 'nama' => $this->shio1),
            array('nomor' => '86', 'nama' => $this->shio2),
            array('nomor' => '87', 'nama' => $this->shio3),
            array('nomor' => '88', 'nama' => $this->shio4),
            array('nomor' => '89', 'nama' => $this->shio5),
            array('nomor' => '90', 'nama' => $this->shio6),
            array('nomor' => '91', 'nama' => $this->shio7),
            array('nomor' => '92', 'nama' => $this->shio8),
            array('nomor' => '93', 'nama' => $this->shio9),
            array('nomor' => '94', 'nama' => $this->shio10),
            array('nomor' => '95', 'nama' => $this->shio11),
            array('nomor' => '96', 'nama' => $this->shio12),
            array('nomor' => '97', 'nama' => $this->shio1),
            array('nomor' => '98', 'nama' => $this->shio2),
            array('nomor' => '99', 'nama' => $this->shio3),
            array('nomor' => '00', 'nama' => $this->shio4),

        );

        if($checkdata){
            Shio::truncate();
            shio::insert($data1);
            return redirect()->back();
        }else{
            dd('nodata');
        }
    }
}

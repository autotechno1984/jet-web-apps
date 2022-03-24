<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\Profile;
use App\Models\Result;
use Decimal\Decimal;
use Livewire\Component;
use Illuminate\Support\Collection;
use Auth;
use Illuminate\Support\Facades\DB;
class Empatd extends Component
{
    public $message;
    public $line;
    public $bb = array();
    public $num = array();
    public $empatd = array();
    public $tigad = array();
    public $duad = array();
    public $chekdua = [];
    public $dataproses = array();
    public $dataduad = [];
    public $contoh = [];
    public $i = 1;
    public $pasaran;
    public $amountempat = 0.00;
    public $amounttiga = 0.00;
    public $amountdua = 0.00;


    public function mount($id)
    {
        $this->pasaran = $id;
        $this->line = 10;
    }

    public function render()
    {

        return view('livewire.empatd');
    }

    public function createinvoice()
    {
        $kredituse = 0;

        Collection::macro('permute', function () {
            if ($this->isEmpty()) {
                return new static([[]]);
            }

            return $this->flatMap(function ($value, $index) {
                return (new static($this))
                    ->forget($index)
                    ->values()
                    ->permute()
                    ->map(function ($item) use ($value) {
                        return (new static($item))->prepend($value);
                    });
            });
        });

        $game = games::all();
        $diskon4 = $game->where('kode','4D')->pluck('diskon')->first();
        $diskon3 = $game->where('kode','3D')->pluck('diskon')->first();
        $diskon2 = $game->where('kode','2D')->pluck('diskon')->first();
        $cobadata = array();
        for($i = 1; $i <= $this->line; $i++){
            if( isset($this->num[$i]) &&  strlen($this->num[$i]) == 4){
                $validateempat = $this->validate(
                    ['empatd.'.$i => 'required'],
                    ['empatd.'.$i.'.required' => 'Min Bet 1'],
                );
                if(empty($this->bb[$i])){
                    $cobadata [] = array('kode' => '4D', 'nomor' => $this->num[$i], 'diskon' => $game->where('kode','4D')->pluck('diskon')->first() , 'amount' => $this->empatd[$i] );
                    $this->amountempat = $this->amountempat + $this->empatd[$i];
                }else{
                    $data = implode("," , str_split($this->num[$i], 1));
                    $empatbet = $this->empatd[$i];
                    $nomorArray = explode(',',$data);
                    $collection = collect($nomorArray)->permute();
                    $total = $collection->unique()->count();
                    $unique = $collection->unique()->toArray();
                    $test = array_merge($unique);
                    for($bb = 0; $bb < $total; $bb++ ){
                        $cc = array('kode' => '4D', 'nomor' => implode("",$test[$bb]), 'diskon' => $game->where('kode','4D')->pluck('diskon')->first(), 'amount' => $empatbet );
                        array_push($cobadata, $cc);
                        $this->amountempat = $this->amountempat + $this->empatd[$i];
                    }
                }
                if(isset($this->tigad[$i]) && $this->tigad[$i] > 0){
                   if(empty($this->bb[$i])){
                       $x = array('kode'=> '3D' , 'nomor' => substr($this->num[$i],-3), 'diskon' => $game->where('kode','3D')->pluck('diskon')->first(), 'amount' => $this->tigad[$i]);
                       array_push($cobadata, $x);
                        $this->amounttiga = $this->amounttiga + $this->tigad[$i];
                   }else{
                       $data = implode("," , str_split(substr($this->num[$i],-3), 1));
                       $tigabet = $this->tigad[$i];
                       $nomorArray = explode(',',$data);
                       $collection = collect($nomorArray)->permute();
                       $total = $collection->unique()->count();
                       $unique = $collection->unique()->toArray();
                       $test = array_merge($unique);
                       for($bb = 0; $bb < $total; $bb++ ){
                           $gg = array('kode' => '3D', 'nomor' => implode("",$test[$bb]), 'diskon' => $game->where('kode','3D')->pluck('diskon')->first(), 'amount' => $tigabet );
                           array_push($cobadata, $gg);
                           $this->amounttiga = $this->amounttiga + $this->tigad[$i];
                       }
                   }

                    if(isset($this->duad[$i]) && $this->duad[$i] > 0){
                        if(empty($this->bb[$i])){
                            $c = array('kode' => '2D', 'nomor' =>substr($this->num[$i],-2), 'diskon' => $game->where('kode','2D')->pluck('diskon')->first(), 'amount' => $this->duad[$i]);
                            array_push($cobadata, $c);
                            $this->amountdua = $this->amountdua + $this->duad[$i];
                        }else{
                            $data = implode("," , str_split(substr($this->num[$i],-2), 1));
                            $duabet = $this->duad[$i];
                            $nomorArray = explode(',',$data);
                            $collection = collect($nomorArray)->permute();
                            $total = $collection->unique()->count();
                            $unique = $collection->unique()->toArray();
                            $test = array_merge($unique);
                            for($bb = 0; $bb < $total; $bb++ ){
                                $jj = array('kode' => '2D', 'nomor' => implode("",$test[$bb]), 'diskon' => $game->where('kode','2D')->pluck('diskon')->first(), 'amount' => $duabet );
                                array_push($cobadata, $jj);
                                $this->amountdua = $this->amountdua + $this->duad[$i];
                            }
                        }
                    }
                }
            }
            elseif(isset($this->num[$i]) &&  strlen($this->num[$i]) == 3){
                $validateempat = $this->validate(
                    ['tigad.'.$i => 'required'],
                    ['tigad.'.$i.'.required' => 'Min Bet 1'],
                );
                if(empty($this->bb[$i])){
                    $g = array('kode'=> '3D' , 'nomor' => substr($this->num[$i],-3), 'diskon' => $game->where('kode','3D')->pluck('diskon')->first(), 'amount' => $this->tigad[$i]);
                    array_push($cobadata, $g);
                    $this->amounttiga = $this->amounttiga + $this->tigad[$i];

                }else{
                    $data = implode("," , str_split(substr($this->num[$i],-3), 1));
                    $tigabet = $this->tigad[$i];
                    $nomorArray = explode(',',$data);
                    $collection = collect($nomorArray)->permute();
                    $total = $collection->unique()->count();
                    $unique = $collection->unique()->toArray();
                    $test = array_merge($unique);
                    for($bb = 0; $bb < $total; $bb++ ){
                        $hh = array('kode' => '3D', 'nomor' => implode("",$test[$bb]), 'diskon' => $game->where('kode','3D')->pluck('diskon')->first(), 'amount' => $tigabet );
                        array_push($cobadata, $hh);
                        $this->amounttiga = $this->amounttiga + $this->tigad[$i];

                    }
                }
                if(isset($this->duad[$i]) && $this->duad[$i] > 0){
                    if(empty($this->bb[$i])){
                        $h = array('kode' => '2D', 'nomor' =>substr($this->num[$i],-2), 'diskon' => $game->where('kode','2D')->pluck('diskon')->first(), 'amount' => $this->duad[$i]);
                        array_push($cobadata, $h);
                        $this->amountdua = $this->amountdua + $this->duad[$i];

                    }else{
                        $data = implode("," , str_split(substr($this->num[$i],-2), 1));
                        $duabet = $this->duad[$i];
                        $nomorArray = explode(',',$data);
                        $collection = collect($nomorArray)->permute();
                        $total = $collection->unique()->count();
                        $unique = $collection->unique()->toArray();
                        $test = array_merge($unique);
                        for($bb = 0; $bb < $total; $bb++ ){
                            $hh = array('kode' => '2D', 'nomor' => implode("",$test[$bb]), 'diskon' => $game->where('kode','2D')->pluck('diskon')->first(), 'amount' => $duabet );
                            array_push($cobadata, $hh);
                            $this->amountdua = $this->amountdua + $this->duad[$i];
                        }
                    }

                }
            }elseif(isset($this->num[$i]) &&  strlen($this->num[$i]) == 2){
                $validateempat = $this->validate(
                    ['duad.'.$i => 'required'],
                    ['duad.'.$i.'.required' => 'Min Bet 1'],
                );
                if(empty($this->bb[$i])){
                    $l = array('kode' => '2D', 'nomor' =>substr($this->num[$i],-2), 'diskon' => $game->where('kode','2D')->pluck('diskon')->first(), 'amount' => $this->duad[$i] );
                    array_push($cobadata, $l);
                    $this->amountdua = $this->amountdua + $this->duad[$i];

                }else{
                    $data = implode("," , str_split(substr($this->num[$i],-2), 1));
                    $duabet = $this->duad[$i];
                    $nomorArray = explode(',',$data);
                    $collection = collect($nomorArray)->permute();
                    $total = $collection->unique()->count();
                    $unique = $collection->unique()->toArray();
                    $test = array_merge($unique);
                    for($bb = 0; $bb < $total; $bb++ ){
                        $hh = array('kode' => '2D', 'nomor' => implode("",$test[$bb]), 'diskon' => $game->where('kode','2D')->pluck('diskon')->first(), 'amount' => $duabet );
                        array_push($cobadata, $hh);
                        $this->amountdua = $this->amountdua + $this->duad[$i];
                    }
                }
            }
            else{

            }
        }

        // Cek pasaran =

        $totalamount = (float)$this->amountempat + (float)$this->amounttiga + (float)$this->amountdua;
        $totalamountdiskonempat = $this->amountempat * ($diskon4 /100);
        $totalamountdiskontiga = $this->amounttiga * ($diskon3/100);
        $totalamountdiskondua = $this->amountdua * ($diskon2/100);
        $totaldiskon = $totalamountdiskonempat + $totalamountdiskontiga + $totalamountdiskondua;
        $totalbet = $totalamount - $totaldiskon;
        $user_id =  Auth::user()->id;
        $kodepasaran = $this->pasaran;
        $result = Result::find($this->pasaran);
        if($result->status == 1){
            //Check kredit
            $kredit = Auth::user()->profile->kredit;
            if($kredit >= $totalbet){
                DB::beginTransaction();
                $invoice = new Invoices;
                $invoice->user_id = $user_id;
                $invoice->result_id = $kodepasaran;
                $invoice->amount = $totalamount;
                $invoice->total = $totalamount - $totaldiskon;
                $invoice->diskon = $totaldiskon;
                $invoice->winLose = 0;
                $invoice->status = 0;
                $invoice->adminid = 0;
                $invoice->tgl_invoice = now();
                $invoice->nonota = 0;
                $invoice->save();
                foreach($cobadata as $data){
                    $datainsert[] = array(
                        'invoice_id' => $invoice->id,
                        'result_id' => $this->pasaran,
                        'user_id' => $user_id,
                        'kode' => $data['kode'],
                        'posisi' => 0,
                        'data' => $data['nomor'],
                        'amount' => $data['amount'],
                        'diskon' => $data['diskon'],
                        'kei' => 0,
                        'winlose' => 0,
                        'total' => $data['amount'] - ($data['amount'] * ($data['diskon'] /100)),
                        'status' => 2,
                        'tgl_beli' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                    $kredituse = $kredituse + ( $data['amount'] - ( ($data['diskon'] / 100) * $data['amount'] )) ;
                }


                InvoiceDetail::insert($datainsert);
                Profile::where('user_id',$user_id)->update(['kredit' => $kredit - $kredituse]);
                DB::commit();
                session()->flash('success','Data Sudah Berhasil Disimpan');
                return redirect()->route('empatd', $this->pasaran);
            }else{
                session()->flash('error','Maaf Kredit anda tidak cukup');
            }
        }else {
                session()->flash('error','Maaf Market Sudah Tutup');
        }



    }

   public function numchange(){
        for($i = 1; $i <= $this->line; $i++){
            if(isset($this->num[$i]) && strlen($this->num[$i]) == 3){
                $this->empatd[$i] = '';
            }elseif(isset($this->num[$i]) && strlen($this->num[$i]) == 2){
                $this->empatd[$i] = '';
                $this->tigad[$i] = '';
            }elseif(isset($this->num[$i]) && strlen($this->num[$i]) == 1){
                $this->empatd[$i] = '';
                $this->tigad[$i] = '';
            }else {

            }
        }
   }


}

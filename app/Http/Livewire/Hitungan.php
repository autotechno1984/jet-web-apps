<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\Profile;
use App\Models\Result;
use App\Models\tabelhasil;
use Livewire\Component;

class Hitungan extends Component
{
    public $daftarperiode;
    public $statusempatd;
    public function mount()
    {
        $this->statusempatd = 'STATUS';
    }

    public function render()
    {
        $periode = Result::where('status',3)->get();
        return view('livewire.hitungan',compact('periode'));
    }

    public function empatd()
    {
        $validated = $this->validate([
           'daftarperiode' => 'required'
        ]);

        $hasil = tabelhasil::where('result_id',$this->daftarperiode)->get();
        $consol9 = $hasil->where('kode','sh15')->pluck('hasil')->first();
        $consol8 = $hasil->where('kode','sh14')->pluck('hasil')->first();
        $consol7 = $hasil->where('kode','sh13')->pluck('hasil')->first();
        $consol6 = $hasil->where('kode','sh12')->pluck('hasil')->first();
        $consol5 = $hasil->where('kode','sh11')->pluck('hasil')->first();
        $consol4 = $hasil->where('kode','sh10')->pluck('hasil')->first();
        $consol3 = $hasil->where('kode','sh9')->pluck('hasil')->first();
        $consol2 = $hasil->where('kode','sh8')->pluck('hasil')->first();
        $consol1 = $hasil->where('kode','sh7')->pluck('hasil')->first();
        $starter3 = $hasil->where('kode','sh6')->pluck('hasil')->first();
        $starter2 = $hasil->where('kode','sh5')->pluck('hasil')->first();
        $starter1 = $hasil->where('kode','sh4')->pluck('hasil')->first();
        $utama3 = $hasil->where('kode','sh3')->pluck('hasil')->first();
        $utama2 = $hasil->where('kode','sh2')->pluck('hasil')->first();
        $utama1 = $hasil->where('kode','sh1')->pluck('hasil')->first();

        $chkconsol9 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol9 )->count();
        if($chkconsol9 != 0 ){
            $hadiah = games::where('kode', 'sh15')->pluck('hadiah')->first();

            $updateconsol9 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol9)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }

        $chkkonsol8 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol8 )->count();
        if($chkkonsol8 != 0 ){
            $hadiah = games::where('kode', 'sh14')->pluck('hadiah')->first();

            $updateconsol8 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol8)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkconsol7 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol7 )->count();
        if($chkconsol7 != 0 ){
            $hadiah = games::where('kode', 'sh13')->pluck('hadiah')->first();
            $updateconsol7 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol7)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);


        }
        $chkconsol6 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol6 )->count();
        if($chkconsol6 != 0 ){
            $hadiah = games::where('kode', 'sh12')->pluck('hadiah')->first();

            $updateconsol6 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol6)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkconsol5 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol5 )->count();
        if($chkconsol5 != 0 ){
            $hadiah = games::where('kode', 'sh11')->pluck('hadiah')->first();

            $updateconsol5 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol5)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkconsol4 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol4 )->count();
        if($chkconsol4 != 0 ){
            $hadiah = games::where('kode', 'sh10')->pluck('hadiah')->first();

            $updateconsol4 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol4)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkconsol3 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol3 )->count();
        if($chkconsol3 != 0 ){
            $hadiah = games::where('kode', 'sh9')->pluck('hadiah')->first();

            $updateconsol3 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol3)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkconsol2 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol2 )->count();
        if($chkconsol2 != 0 ){
            $hadiah = games::where('kode', 'sh8')->pluck('hadiah')->first();

            $updateconsol2 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol2)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkconsol1 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $consol1 )->count();
        if($chkconsol1 != 0 ){
            $hadiah = games::where('kode', 'sh7')->pluck('hadiah')->first();

            $updateconsol1 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $consol1)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkstarter3 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $starter3 )->count();
        if($chkstarter3 != 0 ){
            $hadiah = games::where('kode', 'sh6')->pluck('hadiah')->first();

            $updatestarter3 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $starter3)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkstarter2 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $starter2 )->count();
        if($chkstarter2 != 0 ){
            $hadiah = games::where('kode', 'sh5')->pluck('hadiah')->first();

            $updatestarter2 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $starter2)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkstarter1 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $starter1 )->count();
        if($chkstarter1 != 0 ){
            $hadiah = games::where('kode', 'sh4')->pluck('hadiah')->first();

            $updatestarter1 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $starter1)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkutama3 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $utama3 )->count();
        if($chkutama3 != 0 ){
            $hadiah = games::where('kode', 'sh3')->pluck('hadiah')->first();

            $updateutama3 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $utama3)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkutama2 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $utama2 )->count();
        if($chkutama2 != 0 ){
            $hadiah = games::where('kode', 'sh2')->pluck('hadiah')->first();

            $updateutama2 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $utama2)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $chkutama1 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','4D')->where('data', $utama1 )->count();
        if($chkutama1 != 0 ){
            $hadiah = games::where('kode', 'sh1')->pluck('hadiah')->first();

            $updateutama1 = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '4D')->where('data', $utama1)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);

        }
        $tigad = substr($utama1, -3);
        $checktigad = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '3D')->where('data', $tigad)->count();
        if($checktigad != 0){
            $hadiah = games::where('kode', '3D')->pluck('hadiah')->first();
            $updatetigad = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','3D')->where('data', $tigad)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);
        }
        $duad = substr($utama1, -2);
        $checkduad = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '2D')->where('data', $duad)->count();
        if($checkduad != 0){
            $hadiah = games::where('kode', '2D')->pluck('hadiah')->first();
            $updateduad = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','2D')->where('data', $duad)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);
        }
       //Dua d bb

        $duadbb = strrev($duad);
        $checkduadbb = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode', '2D')->where('data', $duadbb)->count();
        if($checkduadbb != 0){
            $hadiah = games::where('kode', '2DBB')->pluck('hadiah')->first();
            $updateduad = InvoiceDetail::where('result_id', $this->daftarperiode)->where('kode','2D')->where('data', $duadbb)
                ->update([
                    'is_win' => 1,
                    'hadiah' => $hadiah,
                    'status' => 1,
                ]);
        }
        $invoicedetailwin = InvoiceDetail::where('result_id', $this->daftarperiode)->where('is_win',1)->get();

        $this->statusempatd = 'DATA Upadate';

        foreach($invoicedetailwin as $data)
        {
            $winlosebalance = Invoices::where('id', $data->invoice_id)->pluck('winlose')->first();
            $updateinvoice = Invoices::where('id', $data->invoice_id)->update([
               'winlose' => $winlosebalance + ($data->amount * $data->hadiah),
                'status' => 1
            ]);
        }


        $invoicelose = Invoices::where('status', 0)->where('result_id', $this->daftarperiode)->get();

        foreach ($invoicelose as $data){
            $updateinvoicelose = Invoices::where('id', $data->id)->update([
                'winlose' => ($data->total * -1)
            ]);
        }
        $invoicedetailstatus = InvoiceDetail::where('result_id', $this->daftarperiode)->whereIn('kode',['4D','3D','2D'])->where('status',2)->update([
           'status' => 0
        ]);
    }
    public function closemarket()
    {
        $invoicewin = Invoices::where('result_id', $this->daftarperiode)->where('status',1)->select('user_id',\DB::raw('sum(winlose) as win'))->groupBy('user_id')->get();

        foreach($invoicewin as $win){
            $userkredit = Profile::where('user_id', $win->user_id)->pluck('kredit')->first();
            $updatekredit = Profile::where('user_id', $win->user_id)->update([
               'kredit' => $userkredit + $win->win
            ]);
        }
        $updateresult = Result::where('id', $this->daftarperiode)->update([
            'status' => 0
        ]);
        return redirect()->back();
    }
}

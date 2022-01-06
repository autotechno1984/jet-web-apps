<?php

namespace App\Http\Livewire;

use App\Models\Invoices;
use App\Models\transaksidepowd;
use Livewire\Component;
use Livewire\WithPagination;

class Tagihanmemberdetail extends Component
{
    use WithPagination;
    public $userid;
    public $givenkredit;
    public $invoicewinlose;
    protected $paginationTheme = 'bootstrap';
    public function mount($id){
//        $this->givenkredit = transaksidepowd::where('user_id', $id)->orderBy('id','Desc')->paginate(10);
        $this->userid = $id;
    }
    public function render()
    {
        $givenkredit = transaksidepowd::orderBy('id','Desc')->paginate(15);
        $invoice = Invoices::orderBy('id','Desc')->paginate(15);
        return view('livewire.tagihanmemberdetail', ['givekredit' => $givenkredit,'invoices' => $invoice]);
    }
}

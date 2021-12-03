<?php

namespace App\Http\Livewire;

use App\Models\transaksidepowd;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class transaksidepositwd extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp()
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showExportOption('download', ['excel', 'csv'])
            ->showSearchInput();
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
       return transaksidepowd::query()->with('user')->orderBy('id','Desc');

    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */
    public function relationSearch(): array
    {
        return [
            'user' => [
                'username',
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('kategori')
            ->addColumn('amount', function(transaksidepowd  $model){
                return number_format($model->amount);
            })
            ->addColumn('bank')
            ->addColumn('akun_bank')
            ->addColumn('nama_bank')
            ->addColumn('nama', function(transaksidepowd  $model) {
               return ($model->user->get(0)->name);
            })
            ->addColumn('username', function(transaksidepowd  $model) {
                return ($model->user->get(0)->username);
            })

            ->addColumn('user_bank')
            ->addColumn('user_nomor_bank')
            ->addColumn('nama_akun_bank')
            ->addColumn('catatan')
            ->addColumn('data_request_formatted', function(transaksidepowd $model) {
                return Carbon::parse($model->data_request)->format('d/m/Y H:i:s');
            })
            ->addColumn('date_approved', function(transaksidepowd $model) {
                return Carbon::parse($model->date_approved)->format('d/m/Y H:i:s');
            });

    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */
    public function columns(): array
    {

        return [
            Column::add()
                ->title(__('TRK.ID'))
                ->field('id')
                ->searchable(),

            Column::add()
                ->title(__('KATEGORI'))
                ->field('kategori')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center', 'font-weight:bold;'),

            Column::add()
                ->title(__('AMOUNT'))
                ->field('amount')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),

            Column::add()
                ->title(__('BANK'))
                ->field('bank')
                ->searchable(),
            Column::add()
                ->title(__('Nomor Bank'))
                ->field('akun_bank'),

            Column::add()
                ->title('Nama rekening')
                ->field('nama_bank')
                ->searchable(),

            Column::add()
                ->title('Nama')
                ->field('nama')
                ->searchable(),

            Column::add()
                ->title('username')
                ->field('username')
                ->searchable(),

            Column::add()
                ->title('Bank Member')
                ->field('user_bank'),

            Column::add()
                ->title('Nomor Rekening')
                ->field('user_nomor_bank'),

            Column::add()
                ->title('Nama Rekening')
                ->field('nama_akun_bank'),

            Column::add()
                ->title(__('CATATAN'))
                ->field('catatan'),

            Column::add()
                ->title(__('DATA REQUEST'))
                ->field('data_request_formatted'),

            Column::add()
                ->title('Date Approved')
                ->field('date_approved'),


        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable this section only when you have defined routes for these actions.
    |
    */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption(__('Edit'))
               ->class('bg-indigo-500 text-white')
               ->route('transaksidepowd.edit', ['transaksidepowd' => 'id']),

           Button::add('destroy')
               ->caption(__('Delete'))
               ->class('bg-red-500 text-white')
               ->route('transaksidepowd.destroy', ['transaksidepowd' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods
    |
    */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = transaksidepowd::query()->find($data['id'])->update([
                $data['field'] => $data['value']
           ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status, string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field' => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field' => __('Error updating custom field.'),
            ]
        ];

        return ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);
    }
    */

    public function template(): ?string
    {
        return null;
    }

}

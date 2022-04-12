<div style="margin:20px">
  <div class="row">
    <div class="col-1">
        <label for="periode" class="col-form-label">Periode</label>
    </div>
    <div class="col-2">
        <select name="" id="" class="form-select" wire:model.defer="idresult" >
            <option value=""></option>
            @foreach($periode as $data)
                <option value="{{ $data->id }}">{{ $data->id }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <a href="#" class="btn btn-primary" wire:click="search">Lihat Data</a>
    </div>

  </div>
{{--    empat D--}}
  <div class="row mt-1">
      <div class="col-4">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>kode</th>
                    <th>nomor</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invdetail->where('kode','4D')->sortByDesc('total') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ $data->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <div class="col-4">
          <table class="table table-striped table-bordered text-center">
              <thead>
              <tr>
                  <th>kode</th>
                  <th>nomor</th>
                  <th>Total</th>
              </tr>
              </thead>
              <tbody>
              @foreach($invdetail->where('kode','3D')->sortByDesc('total') as $data)
                  <tr>
                      <td>{{ $data->kode }}</td>
                      <td>{{ $data->data }}</td>
                      <td>{{ $data->total }}</td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
      <div class="col-4">
          <table class="table table-striped table-bordered text-center">
              <thead>
              <tr>
                  <th>kode</th>
                  <th>nomor</th>
                  <th>Total</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              @foreach($invdetail->where('kode','2D')->sortByDesc('total') as $data)
                  <tr>
                      <td>{{ $data->kode }}</td>
                      <td>{{ $data->data }}</td>
                      <td>{{ $data->total }}</td>
                  </tr>
                  @endforeach
              </tr>
              </tbody>
          </table>
      </div>
  </div>

</div>

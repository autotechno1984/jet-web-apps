<div>
    <h3 class="text-success text-center shadow">COLOK NAGA</h3>
    <table class="table">
        <tbody>
            <tr>
                <td>#</td>
                <td>Nomor</td>
                <td>Amount</td>
                <td>Hadiah</td>
                <td>Diskon</td>
            </tr>
            @for($i = 1; $i <= 10; $i++)
                <tr>
                    <td><label for="" class="col-form-label">{{$i}}</label></td>
                    <td><input type="text" name="" id="" class="form-control"></td>
                    <td><input type="text" name="" id="" class="form-control"></td>
                    <td><label for="" class="col-form-label">Hadiah</label></td>
                    <td><label for="" class="col-form-label">Diskon</label></td></tr>
            @endfor
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"><button class="btn btn-primary form-control">Simpan</button></td>
            </tr>
        </tbody>
    </table>
</div>

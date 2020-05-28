<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="namaMaterial">Provinsi</label>
        <select id="namaMaterial" name="namaMaterial" class="form-control">
            <option>Pilih...</option>
            @foreach ( $plucked as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="satuanHarga">Kabupaten/Kota</label>
        <input type="text" id="satuanHarga"/>
    </div>
</div>
<script src="{{asset('paper/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('select[name="namaMaterial"]').on('change', function () {
            var id = jQuery(this).val();
            var a = $(this).parent();
            if (id) {
                jQuery.ajax({
                    url: '/testGet/' + id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        // $(this).next('input').focus().val(newPrice);
                        a.find('#satuanHarga').val(data.satuanHarga);
                    }
                });
            } else {
                $('select[name="regencies"]').empty();
                $('select[name="districts"]').empty();
            }
        });
    });
</script>

function addForm(){
  var addrow = 
  '<div class="card-body baru-data">\
  <div class="row">\
      <div class="col-lg">\
          <select class="form-control">\
              <option value="">- Nama Produk -</option>\
              <?php foreach ($barang as $b) : ?>\
                  <option value="<?= $b["kode_brg"] ?>"><?= $b["nama_brg"] ?></option>\
              <?php endforeach; ?>\
          </select>\
      </div>\
      <div class="col-lg">\
          <input type="number" name="jumlah_produk" placeholder="Jumlah Produk" class="form-control">\
      </div>\
      <div class="col-lg">\
          <select class="form-control">\
              <option value="">- Pilih Satuan -</option>\
              <?php foreach ($satuan as $stn) : ?>\
                  <option value="<?= $stn["satid"] ?>"><?= $stn["satnama"] ?></option>\
              <?php endforeach; ?>\
          </select>\
      </div>\
      <div class="col-lg">\
          <textarea name="deskripsi_produk" placeholder="Harga" class="form-control" rows="1" readonly></textarea>\
      </div>\
      <div class="col-lg button-group">\
          <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>\
          <button type="button" class="btn btn-danger btn-hapus"><i class="fa fa-times"></i></button>\
      </div>\
  </div>\
</div>'
$("#df").append(addrow);
}

$("#df").on("click", ".btn-tambah", function(){
  addForm()
  $(this).css("display","none")     
  var valtes = $(this).parent().find(".btn-hapus").css("display","");
})

$("#df").on("click", ".btn-hapus", function(){
$(this).parent().parent('').remove();
var bykrow = $(".baru-data").length;
if(bykrow==1){
  $(".btn-hapus").css("display","none")
  $(".btn-tambah").css("display","");
}else{
  $('.baru-data').last().find('.btn-tambah').css("display","");
}
});

$('.btn-simpan').on('click', function () {
  $('#df').find('input[type="text"], input[type="number"], select, textarea').each(function() {
     if( $(this).val() == "" ) {
        event.preventDefault()
        $(this).css('border-color', 'red');
        
        $(this).on('focus', function() {
           $(this).css('border-color', '#ccc');
        });
     }
  })
})
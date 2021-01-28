<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('dokumen.store',$pertemuan->id)}}" method="post" enctype="multipart/form-data">
    @csrf   
    <div class="modal-body">
        <div class="input-group mb-3">
            <div class="custom-file" style="border-style: solid; border-width: 1px; border-color:#ccc; padding-top:7px; padding-bottom:7px;">
                <input type="file" class="custom-file-input" id="fileX" name="file" onchange="myFile()" required>
                <label class="custom-file-label" for="file"><span id="nameFileX">pilih file....</span></label>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Nama File</label>
            <input class="form-control" name="nama" rows="3" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>

<script>
    function myFile() {
        var xfile = document.getElementById("fileX").files[0].name;
        document.getElementById("nameFileX").innerHTML = xfile;
    }
</script>
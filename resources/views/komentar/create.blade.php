<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Diskusi / Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('komentar.store',$pertemuan->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="mb-3 input-group">
            <div class="custom-file" style="border-style: solid; border-width: 1px; border-color:#ccc; padding:10px;">
                <input type="file" class="custom-file-input" id="fileX" name="file" onchange="myFile()">
                <label class="custom-file-label" for="file"><span id="nameFileX">pilih file berupa gambar....</span></label>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Komentar</label>
            <textarea class="form-control" name="komentar" rows="3" required></textarea>
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

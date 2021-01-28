<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('balasan.store',$komentar->id)}}" method="post" enctype="multipart/form-data">
    @csrf   
    <div class="modal-body">
        @if ( $komentar->file != null)
        <img src="{{asset('storage/'.$komentar->file)}}" alt="{{$komentar->file}}" class="img-responsive">
        @endif
        <p>{!! $komentar->komentar !!}</p>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Tinggalkan Balasan dari Pertanyaan / Diskusi</label>
            <textarea class="form-control" name="balasan" rows="3" required></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>


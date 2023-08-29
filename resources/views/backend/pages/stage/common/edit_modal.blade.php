<div class="modal fade" id="edit-stage-{{ $stage->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Stage</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('stage.update', $stage->id) }}">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="stage">Stage Name</label>
                            <input type="text" class="form-control" id="stage" name="stage_name" value="{{$stage->stage_name}}"
                                placeholder="Enter Stage Name">
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update Stage</button>
                </div>
            </form>
        </div>

    </div>

</div>

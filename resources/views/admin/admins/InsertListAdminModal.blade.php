<div class="modal fade insertList" id="insertListAdmin" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Chọn danh sách admin</h2>
                <form action="{{ url('admin-import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12">
                        <div class="input-group">
                        <label id="" for="FILE" class="input-file">
                            <p class="h3"style="padding:20px;"><img class="pt-4" src="{{ asset('css/adminView/open-folder.png') }}" alt="" style="with:80px;height:80px;"> Open file from your device.</p>
                            <input type="file" name="FILE" id="FILE" required="true" style="display:none;">
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                    <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>

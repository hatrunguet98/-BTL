<div class="modal fade insertList" id="enrollListStudent" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Chọn danh sách sinh viên</h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <input type="file" class="button-a-background">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                    <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

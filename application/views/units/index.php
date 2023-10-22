<div class="products">
    <div class="breadcrumbs-fixed panel-action">
        <div class="row">
            <div class="products-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Danh sách đơn vị tính</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" onclick="cms_vcrunit()"><i class="fa fa-plus"></i> Thêm đơn vị tính
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space orders-space"></div>

    <div class="products-content">
        <div class="product-sear panel-sear">
            <div action="" class="">
                <div class="form-group col-md-5 padd-0">
                    <input onkeypress="enter_search_unit(event)" type="text" class="form-control" placeholder="Nhập tên đơn vị" id="unit-search">
                </div>
                <div class="form-group col-md-7 ">
                    <button type="button" class="btn btn-primary btn-large btn-ssup" onclick="cms_paging_unit(1)"><i class="fa fa-search"></i> Tìm kiếm
                    </button>
                </div>
            </div>
        </div>
        <div class="unit-main-body">
        </div>
    </div>
</div>

<div id="modalunit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Thông tin đơn vị</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="unit_id" type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="name">Tên đơn vị tính</label>
                    <input id="unit_name" class="form-control" type="text" name="name">
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-scondary btn-sm"><i class="fa fa-undo"></i> Đóng</button>
                <button onclick="cms_add_unit()" class="btn btn-primary btn-sm"> <i class="fa fa-check"></i> Lưu</button>
            </div>
        </div>
    </div>
</div>
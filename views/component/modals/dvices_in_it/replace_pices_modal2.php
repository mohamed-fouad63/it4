<div class="modal fade" id="Replace_Pices_Modal2" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">استبدال قطع غيار داخل الضمان</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">اسم المكتب</span>
                    <input type="text" class="form-control me-3 office_name" id="office_name2" placeholder=">اسم المكتب"
                        readonly>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">نوع الجهاز</span>
                    <input type="text" class="form-control dvice_name" id="dvice_name2" placeholder="نوع الجهاز"
                        readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">سريال</span>
                    <input type="text" class="form-control me-3 dvice_sn" id="dvice_sn2" placeholder="سريال" readonly>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">التاريخ</span>
                    <input type="date" class="form-control" id="date_replace_Pices2" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="replace_Pices d-flex flex-wrap" style="gap: 3px;">
                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <label>Motherboard</label>
                            <i class="bi bi-arrow-clockwise" onclick="reset_radio('Motherboard')"></i>
                        </div>
                        <div class="card-body">
                            <input type="radio" class="btn-check" name="Motherboard" value="Motherboard"
                                id="Motherboard1_2" autocomplete="off">
                            <label class="btn btn-outline-success" for="Motherboard1_2">Motherboard</label>
                        </div>
                    </div>
                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <label>PROCESSOR</label>
                            <i class="bi bi-arrow-clockwise" onclick="reset_radio('Processor')"></i>
                        </div>
                        <div class="card-body">
                            <input type="radio" class="btn-check" name="Processor" value="Processor" id="Processor1_2"
                                autocomplete="off">
                            <label class="btn btn-outline-success" for="Processor1_2">Processor</label>
                        </div>
                    </div>

                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <label>Power Supply</label>
                            <i class="bi bi-arrow-clockwise" onclick="reset_radio('Powersupply')"></i>
                        </div>
                        <div class="card-body">
                            <input type="radio" class="btn-check" name="Powersupply" value="Power Supply" id="Power1_2"
                                autocomplete="off">
                            <label class="btn btn-outline-success" for="Power1_2">Powersupply</label>
                        </div>
                    </div>

                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <label>Hard Disk</label>
                            <i class="bi bi-arrow-clockwise" onclick="reset_radio('Hraddisk')"></i>
                        </div>
                        <div class="card-body">
                            <input type="radio" class="btn-check" name="Hraddisk" value="Hrad Disk" id="Hard1_2"
                                autocomplete="off">
                            <label class="btn btn-outline-success" for="Hard1_2">HradDisk</label>
                        </div>
                    </div>

                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <label>Ram</label>
                            <i class="bi bi-arrow-clockwise" onclick="reset_radio('Ram')"></i>
                        </div>
                        <div class="card-body">
                            <input type="radio" class="btn-check" name="Ram" value="Ram" id="Ram1_2" autocomplete="off">
                            <label class="btn btn-outline-success" for="Ram1_2">Ram</label>
                        </div>
                    </div>
                </div>
                <!-- <div class="d-flex flex-column">
                    <form action="#" id="form_att">
                        <input class="file-input" type="file" name="file" hidden>
                        <i class="bi bi-upload"> مرفقات </i>
                    </form>
                </div> -->
                <!-- <div class="">
                    <div class="progress-area">

                    </div>
                    <div class="uploaded-area d-flex flex-wrap" style="gap: 3px;">
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success dvice_num" id="replace_Pices_btn">استبدال</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Replace_Pices_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">استبدال قطع غيار</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">اسم المكتب</span>
                    <input type="text" class="form-control me-3 office_name" id="office_name1" placeholder=">اسم المكتب" readonly>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">نوع الجهاز</span>
                    <input type="text" class="form-control dvice_name" id="dvice_name1" placeholder="نوع الجهاز" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">سريال</span>
                    <input type="text" class="form-control me-3 dvice_sn" id="dvice_sn1" placeholder="سريال" readonly>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">التاريخ</span>
                    <input type="date" class="form-control" id="date_replace_Pices1" value="<?php echo date('Y-m-d') ?>">
                </div>
                <!-- <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">الجزء التالف</span>
                    <select class="form-select me-3" id="id_replace_pices_type" aria-label="Default select example">
                    </select>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">الجزء المستبدل</span>
                    <select class="form-select" id="replace_pices_type" aria-label="Default select example">
                    </select>
                </div> -->
                <div class="replace_Pices d-flex flex-wrap" style="gap: 3px;">
                <div class="card flex-grow-1">
                    <div class="card-header">
                        <label>Motherboard</label>
                        <i class="bi bi-arrow-clockwise"  onclick="reset_radio('Motherboard')"></i>
                    </div>
                    <div class="card-body">
                            <input type="radio" class="btn-check" name="Motherboard" data-pices_id="Motherboard" value="GIGABYTE H110" id="Motherboard1" autocomplete="off">
                            <label class="btn btn-outline-success" for="Motherboard1">GIGABYTE H110</label>

                            <input type="radio" class="btn-check" name="Motherboard" data-pices_id="Motherboard" value="GIGABYTE H81" id="Motherboard2" autocomplete="off">
                            <label class="btn btn-outline-success" for="Motherboard2">GIGABYTE H81</label>

                            <input type="radio" class="btn-check" name="Motherboard" data-pices_id="Motherboard" value="GIGABYTE H61" id="Motherboard3" autocomplete="off">
                            <label class="btn btn-outline-success" for="Motherboard3">GIGABYTE H61</label>

                            <input type="radio" class="btn-check" name="Motherboard" data-pices_id="Motherboard" value="GIGABYTE G41" id="Motherboard4" autocomplete="off">
                            <label class="btn btn-outline-success" for="Motherboard4">GIGABYTE G41</label>

                            <input type="radio" class="btn-check" name="Motherboard" data-pices_id="Motherboard" value="ASROCK H61" id="Motherboard5" autocomplete="off">
                            <label class="btn btn-outline-success" for="Motherboard5">ASROCK H61</label>
                    </div>
                </div>
                <div class="card flex-grow-1">
                    <div class="card-header">
                        <label>PROCESSOR</label>
                        <i class="bi bi-arrow-clockwise" onclick="reset_radio('Processor')"></i>
                    </div>
                    <div class="card-body">
                            <input type="radio" class="btn-check" name="Processor" data-pices_id="Processor" value="CELERON G1610" id="PROCESSOR1" autocomplete="off">
                            <label class="btn btn-outline-success" for="PROCESSOR1">CELERON G1610</label>

                            <input type="radio" class="btn-check" name="Processor" data-pices_id="Processor" value="CELERON G1820" id="PROCESSOR2" autocomplete="off">
                            <label class="btn btn-outline-success" for="PROCESSOR2">CELERON G1820</label>


                            <input type="radio" class="btn-check" name="Processor" data-pices_id="Processor" value="CELERON G3900" id="PROCESSOR3" autocomplete="off">
                            <label class="btn btn-outline-success" for="PROCESSOR3">CELERON G3900</label>

                    </div>
                </div>

                <div class="card flex-grow-1">
                    <div class="card-header">
                        <label>Power Supply</label>
                        <i class="bi bi-arrow-clockwise" onclick="reset_radio('Powersupply')"></i>
                    </div>
                    <div class="card-body">
                            <input type="radio" class="btn-check" name="Powersupply" data-pices_id="Power Supply" value="ATX 24 Pin" id="Powersupply" autocomplete="off">
                            <label class="btn btn-outline-success" for="Powersupply">ATX 24 Pin</label>
                    </div>
                </div>

                <div class="card flex-grow-1">
                    <div class="card-header">
                        <label>Hard Disk</label>
                        <i class="bi bi-arrow-clockwise" onclick="reset_radio('Hraddisk')"></i>
                    </div>
                    <div class="card-body">
                            <input type="radio" class="btn-check" name="Hraddisk" data-pices_id="Hrad Disk" value="Western Digital 1T" id="Hard1" autocomplete="off">
                            <label class="btn btn-outline-success" for="Hard1">Western Digital 1T</label>

                            <input type="radio" class="btn-check" name="Hraddisk" data-pices_id="Hrad Disk" value="Crucial  SSD 240GB" id="Hard2" autocomplete="off">
                            <label class="btn btn-outline-success" for="Hard2">Crucial  SSD 240GB</label>
                    </div>
                </div>

                <div class="card flex-grow-1">
                    <div class="card-header">
                        <label>Ram</label>
                        <i class="bi bi-arrow-clockwise" onclick="reset_radio('Ram')"></i>
                    </div>
                    <div class="card-body">
                            <input type="radio" class="btn-check" name="Ram" data-pices_id="Ram" value="4G" id="Ram1" autocomplete="off">
                            <label class="btn btn-outline-success" for="Ram1">4G</label>

                            <input type="radio" class="btn-check" name="Ram" data-pices_id="Ram" value="2G" id="Ram2" autocomplete="off">
                            <label class="btn btn-outline-success" for="Ram2">2G</label>

                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success dvice_num" id="replace_Pices_btn">استبدال</button>
            </div>

        </div>
    </div>
</div>
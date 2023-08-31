var count_office_type = "";
$.post(
    "/it4/countOfficeNameByType", {
    x: ""
},
    function (data) {
        if (data.length == 0) {
            count_office_type += `
               <div class=''>
    <div class="card flat-card widget-primary-card">
        <div class="">
            <div class="card-body text-center" style="background-color: #17A689;">
                
            </div>
            <div class="ps-2">
                <h4>لا يوجد وحدات بريديه مسجله . قم باضافه مجموعه بريديه ثم اضافه وحده بريديه
                <a class="link-danger ps-2" href="./views/office_group.php">اضغط هنا</a>
                </h4>
            </div>
        </div>
    </div>
</div>
`;
        } else {
            $.each(data, function (key, val) {
                count_office_type += `
        <div class='col-md-12 col-xl-2 text-center'>
    <div class="card flat-card widget-primary-card">
        <div class="row-table">
            <div class="card-body" style="background-color: #17A689;">
                <h4>${val['count(office_type)']}</h4>
            </div>
            <div class="col-sm-9">
                <a href="/it4/getOfficeByType?office_type=${val['office_type']}" target="_blank" class="text-decoration-none" style="color:unset"><h4>${val['office_type']}</h4></a>
            </div>
        </div>
    </div>
</div>`
            })
        };
        $("#count_office_type").append(count_office_type);
    },
    "json"
);
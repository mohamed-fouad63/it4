var Replace_Pices_Modal = document.getElementById("Replace_Pices_Modal");
Replace_Pices_Modal.addEventListener("shown.bs.modal", function (event) {
  const form = document.querySelector("#form_att"),
    fileInput = document.querySelector(".file-input"),
    progressArea = document.querySelector(".progress-area"),
    uploadedArea = document.querySelector(".uploaded-area");

  // form click event
  form.addEventListener("click", () => {
    fileInput.click();
  });

  fileInput.onchange = ({ target }) => {
    let image_valid = "";
    let file = target.files[0]; //getting file [0] this means if user has selected multiple files then get first one only
    let filesize = file.size || file.fileSize;
    let filetype = file.type;
    console.log(file.type);
    var file_ext = file.name.split(".").pop().toLowerCase();
    var valid_ext = ["png", "jpg", "jpeg", "gif"];
    if (valid_ext.includes(file_ext)) {
      image_valid = "";
    } else {
      image_valid += "غير مسموح لهذا الامتداد\n";
    }

    if (filesize <= 1024 * 1024) {
      image_valid = "";
    } else {
      image_valid += "المرفق اكبر من 1 ميجا\n";
    }

    if (filetype == "image/jpeg") {
      image_valid = "";
    } else {
      image_valid += "المرفق ليس كصوره . او صوره تالفه\n";
    }
    if (image_valid == "") {
      let fileName = file.name; //getting file name
      if (fileName.length >= 20) {
        //if file name length is greater than 12 then split it and add ...
        let splitName = fileName.split(".");
        fileName = splitName[0].substring(0, 20) + "... ." + splitName[1];
      }
      uploadFile(fileName, file.name);
    } else {
      alert(image_valid);
    }
  };

  // file upload function
  function uploadFile(name, fullname) {
    let xhr = new XMLHttpRequest(); //creating new xhr object (AJAX)

    xhr.upload.addEventListener(
      "progress",
      ({ loaded, total, lengthComputable }) => {
        //file uploading progress event
        let fileLoadedpercentage = Math.floor((loaded / total) * 100); //getting percentage of loaded file size
        let fileTotal = Math.floor(total / 1024); //gettting total file size in KB from bytes
        let fileLoaded = Math.floor(loaded / 1024); //gettting total file size in KB from bytes
        let fileSize;
        // if file size is less than 1024 then add only KB else convert this KB into MB
        fileTotal < 1024
          ? (fileSize = fileTotal + " KB")
          : (fileSize = fileTotal + " MB");
        // : (fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB");
        // if file size is less than 1024 then add only KB else convert this KB into MB
        fileLoaded < 1024
          ? (fileLoadedSize = fileLoaded + " KB")
          : (fileLoadedSize = fileLoaded + " MB");
        // : (fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB");
        let progressHTML = `
                            <div class="card flex-row" aria-hidden="true" style="width: 49%;">
                                <div class="card-header d-flex flex-column">
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <img src="..." class="placeholder col-4" alt="" style="max-width: 55px;">
                                    <div class="progress w-50">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width: ${fileLoadedpercentage}%" aria-valuenow="${fileLoadedpercentage}" aria-valuemin="0" aria-valuemax="100">
                                            ${fileLoadedpercentage}%
                                        </div>
                                    </div>
                                    <span class="size">${fileLoadedSize}</span>
                                </div>
                        </div>
                        `;
        // uploadedArea.innerHTML = ""; //uncomment this line if you don't want to show upload history
        uploadedArea.classList.add("onprogress");
        progressArea.innerHTML = progressHTML;
      }
    );
    xhr.upload.addEventListener(
      "loadend",
      ({ loaded, total, lengthComputable }) => {
        let fileLoadedpercentage = Math.floor((loaded / total) * 100); //getting percentage of loaded file size
        let fileTotal = Math.floor(total / 1024); //gettting total file size in KB from bytes
        let fileLoaded = Math.floor(loaded / 1024); //gettting total file size in KB from bytes
        let fileSize;
        // if file size is less than 1024 then add only KB else convert this KB into MB
        fileTotal < 1024
          ? (fileSize = fileTotal + " KB")
          : (fileSize = fileTotal + " MB");
        // : (fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB");
        // if file size is less than 1024 then add only KB else convert this KB into MB
        fileLoaded < 1024
          ? (fileLoadedSize = fileLoaded + " KB")
          : (fileLoadedSize = fileLoaded + " MB");
        progressArea.innerHTML = "";
        let uploadedHTML = `
                                <div class="card flex-row" style="width: 49%;">
                                    <div class="card-header d-flex flex-column">
                                        <a class="bi bi-chevron-double-down" href="../views/draftes/<?php echo $db; ?>/replace_pices_dvice/${fullname}" download></a>
                                        <i class="bi bi-x-lg" id="../views/draftes/<?php echo $db; ?>/replace_pices_dvice/${fullname}"></i>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <img src="../views/draftes/<?php echo $db; ?>/replace_pices_dvice/${fullname}" alt="${fullname}" style="max-width: 55px;">
                                        <span class="name">${name}</span>
                                        <span class="size">${fileSize}</span>
                                    </div>
                                </div>
                          `;
        uploadedArea.classList.remove("onprogress");
        // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
        uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML); //remove this line if you don't want to show upload history
      }
    );
    let data = new FormData(form); //FormData is an object to easily send form data
    xhr.open("POST", "../views/draftes/upload.php"); //sending post request to the specified URL
    xhr.send(data); //sending form data
  }
});

<?php




?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه كل المكاتب</title>
    <link rel="icon" href="../../../it2/assets/images/it1.svg" type="image/x-icon" />
    {{baseLinkCss}}
    {{PageCss}}

    <style>
        #main {
            position: relative;
            top: 35px;
        }

        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dt-buttons,
        table thead #filterboxrow {
            display: none
        }

        .form-control {
            border: 1px solid var(--bs-teal);
        }

        table tr {
            text-align: center;
        }

        .filte_div {
            width: 30rem;
        }

        th.sorting.sorting_asc:after {
            content: "\F124";
            font-family: 'bootstrap-icons';
            position: relative;
            display: block;
            opacity: 1;
            right: 80%;
            line-height: 9px;
            font-size: .9em;
        }
    </style>
</head>

<body>
    <div class="navbar-collapsed pcoded-navbar">
        <?php include '../it4/views\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include '../it4/views\layout\header\m-hader.html'; ?>
        <ul class="navbar-nav ">
            <li>
                <div class="d-flex filte_div" role="search"></div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li>
                <div class="btn-group bt_div"></div>
            </li>
            <ul class="navbar-nav ms-auto">
                <li>
                    <div class="p-2 info_div"></div>
                </li>
            </ul>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include '../it4/views\layout\header\user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div id="main">
                <button id='btn'>click</button>
                <table id="example" class="table table-hover" style="width:100%">
                    <thead id="tablehead">
                        <tr id="filterboxrow">
                            <th> #</th>
                            <th> المكتب</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>IP</th>
                            <th>موقفه</th>
                        </tr>
                        <tr>
                            <th> #</th>
                            <th> المكتب</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>IP</th>
                            <th>موقفه</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php include '../it4/views/component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include '../it4/views/component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
    </div>
    {{baseLinkJs}}
    {{PageJs}}
    <script>
        // $('#btn').click(function() {
        //     $.ajax({
        //         url: '/it4/json',
        //         method: 'post',
        //         data: {
        //             name: 'John Doe',
        //             email: 'johndoe@example.com'
        //         },
        //         success: function(response) {
        //             console.log(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Update failed: ', error);
        //         }
        //     });
        // })
    </script>
    <script>
        // $('#btn').click(function() {
        //     var xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             console.log(this.responseText);
        //         }
        //     };
        //     xhttp.open("GET", "/it4/json", true);
        //     xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        //     xhttp.send();
        // })
    </script>
    <script>
        // $('#btn').click(function() {
        //     const headers = new Headers({
        //         'X-Requested-With': 'XMLHttpRequest'
        //     });

        //     fetch('/it4/json', {
        //             method: 'GET',
        //             headers: headers,
        //         })
        //         .then(response => console.log(response))
        //         .catch(error => console.error(error));
        // })
    </script>
</body>

</html>
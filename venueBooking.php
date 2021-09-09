<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availbility of Venues</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container m-1">
        <div class="card" style="width: 30rem;">
            <div class="card-header bg-success text-center ">
                <b class="text-light">Venue Booking </b>
            </div>
            <div class="card-body">

                <form method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="venues">Venues ID</label>
                        <input class="form-control" type="text" name="veneus" id="veneus">
                    </div>
                    <div class="justify-content-center">
                        <div class="input-daterange">
                            <div class="form-group">
                                <label for="start">Starting Date :</label>

                                <div class="input-group">
                                    <input type="text" placeholder="YYYY/MM/DD" id="start" class="form-control ">
                                    <div class="input-group-postpend ">
                                        <div class="input-group-text border bg-white"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">

                                <label for="end">Ending Date :</label>
                                <div class="input-group">
                                    <input placeholder="YYYY/MM/DD" type="text" id="end" class="form-control ">
                                    <div class="input-group-postpend">
                                        <div class="input-group-text border bg-white"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="button" name="submit" class="btn btn-success"> Check Availability</button>
                </form>
                

                <script>
                    $(document).ready(function () {

                        $('.input-daterange').datepicker({
                            format: 'yyyy/mm/dd',
                            autoclose: true,
                            calendarWeeks: true,
                            clearBtn: true,
                            disableTouchKeyboard: true
                        });

                    });
                </script>
            </div>
        </div>
    </div>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
</body>

</html>
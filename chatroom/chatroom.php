<?php
session_start();



?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>sajjadgram</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../css/my.css">
    <link href="css/stylechatroom.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>

    <script language="javascript">
        $(document).ready(function() {
            var username = "<?php echo $_SESSION['username']; ?>";
            window.setInterval(updateChatRoom, 8000);

            function updateChatRoom() {
                $.ajax({
                    type: "POST",
                    url: "check.php",
                    data: {
                        user: username
                    },
                    success: function(response) {
                        $(".chatBox").html(response);
                        $(".chatBox").scrollTop($(".chatBox").prop("scrollHeight"));
                    },
                    error: function(xhr, status) {
                        $(".chatBox").html(response);
                        $(".chatBox").scrollTop($(".chatBox").prop("scrollHeight"));
                    }
                });
            }

            $("#messageBox").keydown(function(e) {
                if (e.which == '13') {
                    data = $("#messageBox").val();
                    $.ajax({
                        type: "POST",
                        url: "reg.php",
                        data: {
                            message: data,
                            user: username
                        },
                        success: function(response) {
                            $(".chatBox").html(response);
                            $(".chatBox").scrollTop($(".chatBox").prop("scrollHeight"));
                        },
                        error: function(xhr, status) {
                            $(".chatBox").html(response);
                            $(".chatBox").scrollTop($(".chatBox").prop("scrollHeight"));
                        }
                    });
                    $("#messageBox").val('');
                }
            });

            updateChatRoom();
            $(".chatBox").scrollTop($(".chatBox").prop("scrollHeight"));
        });
    </script>

</head>

<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="margin: auto;">
                <div class="card  bg-info-transparent border-info ">
                    <div class="card-header bg-info">
                        <p id="p-h"><b> سلام<?php echo $_SESSION['username']; ?>به مسنجر سجاد گرام خوش اومدی</b></p>
                        
                    </div>

                    <div class="card-body">
                        <div class="chatBox">
                        </div>
                        <form>
                            <div class="form-group">
                            <input class="form-control " type="text" placeholder="پیام خود را بنویسید" id="messageBox" >
                            </div>
                          
                        </form>
                        

                    </div>
                   
                </div>
                <div class="btn-e-l mt-3">
                            <a href="../index.php"><button type="button" class="btn btn-info">خروج از چت </button></a></a>
                        </div>


            </div>
        </div>
    </div>

</body>

</html>
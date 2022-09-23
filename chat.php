<?php
session_start();
?>

<?php //echo $_SESSION["timestamp"]; 
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(execute_query, 500);
    });
</script>
<script>
    let txt = "";

    local_user = "";

    function chatFunction(value, index, array) {
        txt += value + "<br>";
    }

    $.get('username.php', function(username) {
        local_user = username;
    });

    local_timestamp = "";
    $.get('timestamp.php', function(timestamp) {
        local_timestamp = timestamp;
    });

    function execute_query() {
        //console.log("MATA");

        $.ajax({

            url: 'update.php',
            method: "POST",
            data: {
                local_time: local_timestamp
            },
            dataType: "json",
            success: function(response) {
                document.getElementById("chat-div").innerHTML = txt;
                console.log(response);
                //alert('Successfully called');
                txt = "";
                response.forEach(chatFunction);
            }
        });

        setTimeout(execute_query, 1000);
    }
</script>
<div class="jumbotron" style="box-sizing:border-box;border:2px solid #969696;text-align:center">
    <div id="chat-div" class="border-0" style="text-align:left">
    </div>
    <?php
    echo $_SESSION["timestamp"];
    ?>
    <form method="post" action="">
        <div class="form-group" style="text-align:left">
            <label for="message">
                <h3>
                    <?php
                    if (!empty($_POST["user"])) {
                        $_SESSION['user'] = $_POST["user"];
                    }
                    echo $_SESSION["user"] . ':'
                    ?>
                </h3>
            </label>
            <input type="message" class="form-control" id="message" placeholder="Type a message" name="message" style="margin:auto" required autofocus>
        </div>
        <br>
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="message_btn">Submit Message</button>
    </form>
</div>
<?php
$conn = pg_connect("host=20.205.115.226 dbname=apache user=apache password=apache port=5432");


if (!empty($_POST["message"])) {
    $sql = "insert into Messages (Message, Username) values ('" .
        $_POST["message"] . "', '" . $_SESSION["user"] . "');";
    $result = pg_query($conn, $sql);
}
?>
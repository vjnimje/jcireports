<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Radio button: full validation example with javascript</title>
        <script>
            function send() {
                var genders = document.getElementsByName("gender");
                if (genders[0].checked == true) {

                } else {
                    // no checked
                    var msg = '<span style="color:red;">You must select your gender!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
                }
                return true;
            }

            function reset_msg() {
                document.getElementById('msg').innerHTML = '';
            }
        </script>
    </head>
    <body>
        <form action="<?php echo base_url();?>test/testdata" method="POST">
            <label>Gender:</label>
            <br />
            <input type="radio" name="gender" value="m" onclick="reset_msg();" />Male
            <br />
            <input type="radio" name="gender" value="f" onclick="reset_msg();" />Female
            <br />
            <div id="msg"></div>
            <input type="submit" value="send>>" onclick="return send();" />
        </form>
    </body>
</html>
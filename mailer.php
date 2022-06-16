<?php
/*
                    O       o O       o O       o
                    | O   o | | O   o | | O   o |
                    | | O | | | | O | | | | O | |
                    | o   O | | o   O | | o   O |
                    o       O o       O o       O
                                { Dark Net Alliance }
              -----------------------------------------
              Copyright (C) 2022  Cvar1984

              This program is free software: you can redistribute it and/or modify
              it under the terms of the GNU General Public License as published by
              the Free Software Foundation, either version 3 of the License, or
              (at your option) any later version.

              This program is distributed in the hope that it will be useful,
              but WITHOUT ANY WARRANTY; without even the implied warranty of
              MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
              GNU General Public License for more details.

              You should have received a copy of the GNU General Public License
              along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
set_time_limit(0);
ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
?>
    <?php
    if (!function_exists('mail')) {
        echo "<font color='red'>[!] mail() function is disabled [!]</font>";
        die;
    }
    if (isset($_POST['action'])) {
        // $message = stripslashes($_POST['letter']);
        $message = $_POST['letter'];
        // $subject = stripslashes($_POST['subject']);
        $subject = $_POST['subject'];
        $list = $_POST['list'];
        $list = str_replace("\n\n", "\n", $list);
        $list = explode("\n", $list);

        foreach ($list as $to) {
            $to = trim($to);
            $randfrom = rand();
            $header = "From: " . $_POST['sendname'] . " <" . $_POST['sendmail'] . ">\r\n";
            $header .= "Message-Id: <130746" . $randfrom . $randfrom . $randfrom . ".com>\r\n";
            $header .= "X-Mailer: php-sender2.1\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: text/html; charset=UTF-8\r\n";
            $header .= "Content-Transfer-Encoding: quoted-printable\r\n\r\n";
            $mail = mail($to, $subject, $message, $header);
            if ($mail) {
                //
            } else {
                //
            }
        }
    }
    ?>
<html>

<head>
    <title>Cvar1984 Priv Mailer</title>
    <link rel="icon" href="http://icons.iconarchive.com/icons/uiconstock/socialmedia/32/Email-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
    <style>
        table {
            border: 1px solid black;
            border-radius: 6px;
            background-color: white;
            box-shadow: 7px 7px 8px #818181;
            -webkit-box-shadow: 7px 7px 8px #818181;
            -moz-box-shadow: 7px 7px 8px #818181;
        }

        textarea,
        input {
            border: 1px solid black;
            border-radius: 6px;
            -webkit-box-shadow: inset 2px 2px 2px 0px #dddddd;
            -moz-box-shadow: inset 2px 2px 2px 0px #dddddd;
            box-shadow: inset 2px 2px 2px 0px #dddddd;
        }

        .b {
            border: 1px solid black;
            border-radius: 6px;
            width: 100%;
        }

        * {
            font-family: 'Patua One', cursive;
            font-weight: 100;
            background-color: white;
        }
    </style>
</head>

<body>
    <form method="POST">
        <table align="center">
            <tr>
                <th colspan="2" class="b">Cvar1984 Priv Mailer</th>
            </tr>
            <tr>
                <td><input type="email" name="sendmail" size="26" placeholder="Sender Mail"></td>
                <td><input type="text" name="sendname" size="25" placeholder="Sender Name"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="subject" size="54" placeholder="Subject"></td>
            </tr>
            <tr>
                <td><textarea name="letter" cols="29" rows="10" placeholder="Letter"></textarea></td>
                <td><textarea name="list" cols="29" rows="10" placeholder="Mail List"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="action" value="Send" class="b"></td>
            </tr>
        </table>
    </form>
    <div id="result"></div>
</body>
</html>
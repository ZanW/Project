<?php


$function = $_GET['function'];
$log = array();
error_log("log array", 3, "C:/Users/jaya1/xampp/htdocs/pog/error_log.txt");

switch ($function) {

    case ('getstatus'):
        if (file_exists('message.text')) {
            $line = file('message.text');
        }
        $log['status'] = count($lines);
        break;

    case ('update'):
        $status = $_POST['status'];
        if (file_exists('message.text')) {
            $line = file('message.text');
        }
        $count = count($line);
        if ($status == $count) {
            $log["status"] = $status;
            $log['text'] = false;
        } else {
            $text = array();
            $log ["status"] = $status + count($line);
            foreach ($line as $line_num => $line) {
                if ($line_num >= $status) {
                    $text = $line = str_replace("\n", "", $line);
                }
            }
            $log["text"] = $text;
        }
        break;

    case('send'):
        $Email = htmlentities(strip_tags($_GET['emailID']));
        $message = htmlentities(strip_tags($_GET['message']));
        $data['message'] = $message;
        if (($message) != "\n") {
//            if (preg_match($reg_exUrl, $message, $url)) {
//                $message = preg_replace($reg_exUrl, '<a href="' . $url[0] . '" target="_blank">' . $url[0] . '</a>', $message);
//            }
            fwrite(fopen('chat.txt', 'a'), "<span>" . $Email . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
        }
        header('Content-type: application/json');
        $log['status'] = 'success';
        echo json_encode($log);
        break;
}

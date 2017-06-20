<?php

include_once "messagePdo.php";


function getRequest() {
    $result = array();

    // Server Information
    $result['ip'] = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
    
    // GET = API Directives
    $result['control'] = filter_input(INPUT_GET, 'control');
    $result['edit'] = filter_input(INPUT_GET, 'edit');
    $result['show'] = filter_input(INPUT_GET, 'show');
    
    // POST = Form Requests
    $result['op'] = filter_input(INPUT_POST, 'op');
    $result['id'] = filter_input(INPUT_POST, 'id');
    $result['message'] = filter_input(INPUT_POST, 'message');
    $result['title'] = filter_input(INPUT_POST, 'title');
    $result['time'] = filter_input(INPUT_POST, 'time');

    return $result;
}

function doPostOp($req) {
    $op = $req['op'];
    $ip = $req['ip'];
    $id = $req['id'];
    $time = $req['time'];
    $title = $req['title'];
    $message = $req['message'];
    switch ($op) {
        case 'create': {
                print createRow($ip, $time, $title, $message);
            }
            return true;
        case 'update': {
                print updateRow($id, $title, $message);
            }
            return true;
        case 'read': {
                $row = readRow($id);
                if ($row == null) {
                    print "Error: $id not found";
                } else {
                    print("delim=.$.\n");
                    print("{$row['id']}.$.{$row['time']}.$.{$row['title']}.$.{$row['message']}");
                }
            }
            return true;
        case 'delete': {
                print deleteRow($id);
            }
            return true;
    }
    return false;
}

function doControl($op) {
    if ($op == 'delete') {
        echo "delete request ignored";
        return;
    }
    if ($op == 'last') {
        $start = 1;
        $end = countLines();
        if ($end > 100) {
            $start = $end - 100;
        }
        showHistory($start, $end);
        return;
    }
    if ($op == 'stat') {
        $end = countLines();
        echo "TurnstileStat($end)";
        return;
    }
}

?>

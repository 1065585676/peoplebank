<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $data = '
    [
        {
            "id": "B01",
            "name": "B01",
            "range": "数据中心",
            "premise": "Op1;Op2",
            "conclusion": "Op3",
            "constraint": "Op3.time > Op2.time",
            "describe": "如果先做了Op1，又做了Op2，之后会做Op3。",
            "remark": "无备注"
        },
        {
            "id": "B02",
            "name": "B02",
            "range": "研发二部",
            "premise": "Op4",
            "conclusion": "Op5 ^ Op6",
            "constraint": "",
            "describe": "无描述",
            "remark": "无备注"
        }
    ]
    ';

    $data1 = '
    [
        {
            "id": "B01",
            "name": "B01",
            "range": "数据中心",
            "premise": "Op1;Op2",
            "conclusion": "Op3",
            "constraint": "Op3.time > Op2.time",
            "describe": "如果先做了Op1，又做了Op2，之后会做Op3。",
            "remark": "无备注"
        }
    ]
    ';

    if (isset($_GET["after"]) && $_GET["after"] == true) {
        echo json_encode(json_decode($data));
    } else {
        echo json_encode(json_decode($data1));
    }
}

?>
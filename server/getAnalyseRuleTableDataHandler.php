<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $data = '
    [
        {
            "timestamp": "2017年02月01日 15:13:29",
            "operator": "秦丽",
            "id": "A08021",
            "partGroup": "运维一部",
            "content": "无审批记录",
            "rule": "A02",
            "level": "高",
            "remark": "无"
        },
        {
            "timestamp": "2017年02月09日 15:24:30",
            "operator": "马凯",
            "id": "A08055",
            "partGroup": "运维二部",
            "content": "无审批记录",
            "rule": "A02",
            "level": "高",
            "remark": "无"
        },
        {
            "timestamp": "2017年02月13日 00:00:00",
            "operator": "张澜",
            "id": "P14029",
            "partGroup": "开发一部",
            "content": "无门禁记录",
            "rule": "A01",
            "level": "中",
            "remark": "无"
        },
        {
            "timestamp": "2017年02月13日 00:00:00",
            "operator": "马凯",
            "id": "A08055",
            "partGroup": "运维二部",
            "content": "无门禁记录",
            "rule": "A01",
            "level": "中",
            "remark": "无"
        },
        {
            "timestamp": "2017年02月22日 10:43:21",
            "operator": "李丽多",
            "id": "D13046",
            "partGroup": "数据中心",
            "content": "操作不符合规律",
            "rule": "B01",
            "level": "低",
            "remark": "Op1; Op2; !Op3"
        },
        {
            "timestamp": "2017年02月26日 11:22:12",
            "operator": "张云龙",
            "id": "P13002",
            "partGroup": "开发二部",
            "content": "操作不符合规律",
            "rule": "B02",
            "level": "低",
            "remark": "Op4 ^ !Op5"
        }
    ]
    ';

    $data1 = '
    [
        {
            "timestamp": "2017年02月01日 15:13:29",
            "operator": "秦丽",
            "id": "A08021",
            "partGroup": "运维一部",
            "content": "无审批记录",
            "rule": "A02",
            "level": "高",
            "remark": "无"
        },
        {
            "timestamp": "2017年02月09日 15:24:30",
            "operator": "马凯",
            "id": "A08055",
            "partGroup": "运维二部",
            "content": "无审批记录",
            "rule": "A02",
            "level": "高",
            "remark": "无"
        },
        {
            "timestamp": "2017年02月13日 00:00:00",
            "operator": "张澜",
            "id": "P14029",
            "partGroup": "开发一部",
            "content": "无门禁记录",
            "rule": "A01",
            "level": "中",
            "remark": "无"
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
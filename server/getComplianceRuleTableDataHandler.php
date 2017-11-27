<?php

$data = '
[
    {
        "id": "A01",
        "name": "登陆人员门禁检查",
        "premise": "Login",
        "conclusion": "Card",
        "constraint": "Card.equID = 123456\nCard.isValid = TRUE\nLogin.time - Card.time <= 1 hour\nCard.userID <- AccUserSet(Login.accID)",
        "describe": "登录操作 1 小时之前要有机房的刷卡记录，并且刷卡用户是授权用户。",
        "remark": "无备注"
    },
    {
        "id": "A02",
        "name": "变更操作审批检查",
        "premise": "Update",
        "conclusion": "Approve",
        "constraint": "Update.userID = Approve.userID\nUpdate.time <- Approve.timerange",
        "describe": "变更操作要被审批过，并且在审批时限范围内。",
        "remark": "无备注"
    }
]
';

$data1 = '
[
    {
        "id": "A01",
        "name": "登陆人员门禁检查",
        "premise": "Login",
        "conclusion": "Card",
        "constraint": "Card.equID = 123456\nCard.isValid = TRUE\nLogin.time - Card.time <= 1 hour\nCard.userID <- AccUserSet(Login.accID)",
        "describe": "登录操作 1 小时之前要有机房的刷卡记录，并且刷卡用户是授权用户。",
        "remark": "无备注"
    }
]
';

echo json_encode(json_decode($data1));

?>
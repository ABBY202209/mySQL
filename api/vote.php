<?php
include_once "base.php";

//找到主題
$opt=$Que->find($_POST['opt']);
$subject=$Que->find($opt['parent']);

// 兩個都要++
$opt['count']++;
$subject['count']++;

//存回去
$Que->save($opt);
$Que->save($subject);

// 投票完要去看投票結果
to("../index.php?do=result&id={$subject['id']}");
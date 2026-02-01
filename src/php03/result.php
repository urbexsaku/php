<?php

require_once('config/status_codes.php');

$answer_code = isset($_POST['answer_code']) ? htmlspecialchars($_POST['answer_code'], ENT_QUOTES) : null; 
    //indexの正解コードが空ではなければ、answer_codeに入れる
$option = isset($_POST['option']) ? htmlspecialchars($_POST['option'], ENT_QUOTES) : null;
    //indexで選択したコードが空でなければ、optionに入れる

if (empty($option)){
  header('Location: index.php'); //indexで何も選択されなかったときに、index.phpへリダイレクトする
  exit;
}

foreach ($status_codes as $status_code){
  if ($status_code['code'] === $answer_code) {   //正解コード＝選択コードの場合、codeとdescriptionを取得
    $code = $status_code['code'];
    $description = $status_code['description'];
    }
}

$result = $option === $code; //選択コードと正解コードが一致したものをresultとする
?>

<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Code Quiz</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/result.css">
</head>
<body>

<header class="header">
  <div class="header__inner">
    <a class="header__logo" href="/php03">
      Status Code Quiz
    </a>
  </div>
</header>

<main>
  <div class="result__content">
    <div class="result">
      <?php if ($result): ?>
      <h2 class="result__text--correct">正解</h2>
      <?php else: ?>
      <h2 class="result__text--incorrect">不正解</h2>
      <?php endif; ?>
    </div>
    <div class="answer-table">
      <table class="answer-table__inner">
        <tr class="answer-table__row">
          <th class="answer-table__header">ステータスコード</th>
          <td class="answer-table__text"><?php echo $code ?></td>
        </tr>    
        <tr class="answer-table__row">
          <th class="answer-table__header">説明</th>
          <td class="answer-table__text"><?php echo $description ?></td>
        </tr>    
      </table>
  </div>
<?php
require_once('config/status_codes.php');
$random_numbers = array_rand ( $status_codes, 4); //status_codes配列から4つをランダムで取得

foreach ( $random_numbers as $index){
  $options[] = $status_codes[$index]; //ランダムで取得した4つのデータをoptions配列へ入れる
}
$question = $options[mt_rand(0, 3)]; //4つの配列からランダムで1つを正解とし、questionへ入れる
?>

<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Code Quiz</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index.css">
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
  <div class="quiz__content">
    <div class="question">
      <p class="question__text">Q. 以下の内容に当てはまるステータスコードを選んでください</p>
      <p class="question__text"><?php echo $question['description'] ?></p> //正解のdescriptionを表示
    </div>

  <form class="quiz-form" action="result.php" method="post">
    <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>"> <!-- 正解のコードを設定（非表示） -->
    <div class="quiz-form__item">
      <?php foreach ($options as $option): ?>
      <div class=quiz-form__group>
        <input class="quiz-form__radio" id="<?php echo $option['code'] ?>" type="radio" name="option" value="<?php echo $option['code'] ?>">
        <label class="quiz-form__label" for="<?php echo $option['code'] ?>">
          <?php echo $option['code'] ?>
        </label>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="quiz-form__button">
      <button class="quiz-form__button-submit" type="submit">
        回答
      </button>
    </div>
  </form>
  </div>
</main>



</body>
</html>
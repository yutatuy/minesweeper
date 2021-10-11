<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>作って遊ぼう！君だけのマインスイーパー！</title>
  <meta name="description" content="マインスイーパーは地雷を踏まないようにマスを開いていくゲームです。登録不要で誰でも無料で遊べます。マスの数、地雷の数を自由に設定できる機能もあるので、自分だけのマインスイーパーを作って友達と一緒に遊んでみよう。">
  <meta name="keywords" content="マインスイーパー">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!--style css-->
  <link rel="stylesheet" href="css/style.css" media="all">

  <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">

</head>

<body>
  <div class="wrapper">

    <!-- header -->
    <header class="header">
      <div class="inner">
        <img class="bakuhatsu-img left" src="./images/bakuhatsu.png" alt="">
        <h1 class="imgIcon-left"><span>作って遊ぼう！</span><br>君だけのマインスイーパー!</h1>
        <img class="bakuhatsu-img right" src="./images/bakuhatsu.png" alt="">
      </div>
    </header><!-- /header-->

    <!-- main_index -->
    <main id="main_index">
      <div class="inner">
        <div class="mainVisual">
          <img src="./images/mainV.png" alt="">
        </div>
        <p class="indexBtn selectBtn">
          <a href="./gameboard.php">普通に遊ぶ</a>
        </p>
        <p class="indexBtn selectBtn">
          <a href="./original.php">作って遊ぶ</a>
        </p>
        <div class="note">
          <h2>普通に遊ぶ</h2>
          <p>8×8マス,地雷10個でゲームをプレイします。</p>
          <h2>作って遊ぶ</h2>
          <p>マスの数,地雷の個数を自分で設定してプレイすることができます。</p>
        </div>
      </div>
    </main><!-- /main -->

    <!-- footer -->
    <footer class="footer">
      <div class="inner">
        <p class="copy">&copy; 2021 MineSweeper by Yuta Ichinose</p>
      </div>
    </footer><!-- /footer-->

  </div>
  <!--wrapper end-->

</body>
</html>

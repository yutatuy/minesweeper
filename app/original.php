<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>作って遊ぼう！君だけのマインスイーパー！</title>
  <meta name="description" content="マインスイーパーは地雷を踏まないようにマスを開いていくゲームです。登録不要で誰でも無料で遊べます。マスの数、地雷の数を自由に設定できる機能もあるので、自分だけのマインスイーパーを作って友達と一緒に遊んでみよう。">
  <meta name="keywords" content="マインスイーパー">
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="作って遊ぼう！君だけのマインスイーパー！" />
  <meta property="og:image" content="./images/ogp_large.png" />
  <meta name="twitter:card" content="summary_large_image" />
 <!-- favicon -->
 <link rel="icon" type="image/vnd.microsoft.icon" href="./images/favicon.ico" />
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

    <!-- main_original -->
    <main id="main_original">
      <div class="inner">
        <form name="f1" class="" action="./gameboard.php" method="post">
          <h2>マスの数</h2>
          <p>行数を指定してください</p>
          <input type="number" name="row_number">
          <p>列数を指定してください</p>
          <input class="number1" type="number" name="col_number">
          <h2>地雷の数</h2>
          <input class="number2" type="number" name="bomb_number">
          <input class="otherBtn selectBtn" type="submit" onclick="return test()" value="スタート">
        </form>
        <div class="selectBtn subBtn subBtn--long"><a href="./index.php">戻る</a></div>
        <div class="note">
          <h2>注意点</h2>
          <p>※行と列の数は1以上50以下で指定してください</p>
          <p>※地雷の数はマスの合計(行数×列数)より小さくする必要があります。</p>
          <p>※画面の横幅に対して列の数大きくしすぎると表示が崩れる場合があります</p>
        </div>
      </div>
    </main><!-- /main -->

    <!-- footer -->
    <footer class="footer">
      <div class="inner">
        <p class="copy">&copy; 2021 MineSweeper by Yuta Ichinose</p>
      </div>
    </footer><!-- /footer-->

  </div><!--wrapper end-->

  <!--jquery-->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
  <!-- script js-->
  <script src="js/script.js"></script>

</body>
</html>

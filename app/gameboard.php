<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>作って遊ぼう！君だけのマインスイーパー！</title>
  <meta name="description" content="マインスイーパーは地雷を踏まないようにマスを開いていくゲームです。登録不要で誰でも無料で遊べます。マスの数、地雷の数を自由に設定できる機能もあるので、自分だけのマインスイーパーを作って友達と一緒に遊んでみよう。">
  <meta name="keywords" content="マインスイーパー">
  <meta name="keywords" content="マインスイーパー">
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="作って遊ぼう！君だけのマインスイーパー！" />
  <meta property="og:image" content="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] ?>/images/ogp_large.png" />
  <meta name="twitter:card" content="summary_large_image" />

  <!-- favicon -->
  <link rel="icon" type="image/vnd.microsoft.icon" href="./images/favicon.ico" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!--style css-->
  <link rel="stylesheet" href="css/style.css" media="all">

  <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">

  <script>
  var original = 0;
  //POSTが空じゃないならオリジナルに1を代入
  <?php if(isset($_POST['row_number'])) : ?>
  original = <?php echo($_POST['row_number']); ?>;
  var rowNumber = <?php echo($_POST['row_number']); ?>;
  var colNumber = <?php echo($_POST['col_number']); ?>;
  var bombNumber= <?php echo($_POST['bomb_number']); ?>;
  original = 1;
  <?php endif; ?>
  </script>

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

    <!-- main_gameboard -->
    <main id="main_gameboard">
      <div class="inner">
        <div class="mainHeader">
          <p id="timer">00:00</p>
          <div id="selectBtnArea">
            <div id="flagBtn" class="selectBtn">Flag</div>
            <div class="selectBtn subBtn otherBtn" onclick="window.location.reload();">リトライ</div>
            <?php if(isset($_POST['row_number'])) : ?>
              <div class="selectBtn subBtn"><a href="./original.php">戻る</a></div>
            <?php else :?>
              <div class="selectBtn subBtn"><a href="./index.php">戻る</a></div>
            <?php endif; ?>
          </div>

        </div>
        <div id="boardArea">
          <div id="board">
            <div id="boardcover" class="cover"></div>
            <div class="clear">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 581.2 158.6">
                <title>アセット 2</title>
                <g id="レイヤー_2" data-name="レイヤー 2">
                  <g class="svgAction" data-name="レイヤー 1">
                    <path d="M104.8,153.4c-5.4,2.4-17.4,5.2-32.6,5.2-49,0-72.2-34.2-72.2-77C0,26.2,36,0,75.8,0c15.6,0,26.4,3.2,30.8,5.6l-6.4,28.6a52.91,52.91,0,0,0-22.4-4.6C55.6,29.6,37,44.8,37,79.6c0,32.2,16,49,41,49,8,0,17-1.6,22.4-3.6Z"/><path d="M211.4,156.6H125V2h35.2V126.8h51.2Z"/><path d="M318.4,156.6H230.6V2h84.8V31.4H265.8v31h47V91.2h-47v36h52.6Z"/><path d="M454.2,156.6H417.8l-9-36H373.2l-8.4,36H329.2L370,2h44.6ZM404.6,94l-6.8-31c-2-9.2-4.6-23-6.6-32.4h-.4c-2,9.4-4.6,23.6-6.4,32.4l-7,31Z"/><path d="M550.2,84.4c10.6,4.2,16,14.2,19.6,29,4,16.6,8.4,37.2,11.4,43.2H544.8c-2-4.4-6-18.2-9.4-36.4-3.4-18.8-8.8-23.8-20.6-23.8H508v60.2H473V4.2A265.53,265.53,0,0,1,514.8,1c20.6,0,61,2.2,61,44.6a40.67,40.67,0,0,1-25.6,38Zm-33-14c14.8,0,23.4-9.2,23.4-21.8,0-17.6-13-21-21.2-21-5.6,0-9.4.4-11.4,1V70.4Z"/>
                  </g>
                </g>
              </svg>
              <div class="share">
                <div id="twitter">
                  <!-- <a href="//twitter.com/intent/tweet?text=potato.com">
                  <i class="fab fa-twitter"></i>
                </a> -->
              </div>
              <p id="shareTxt"></p>
            </div>
          </div>
          <div class="game">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 984.59 143.09">
              <title>アセット 1</title>
              <g id="レイヤー_2" data-name="レイヤー 2">
                <g class="svgAction" data-name="レイヤー 1">
                  <path d="M107.46,135.71C99.18,138.77,83,142.37,68,142.37c-22,0-37.8-5.76-49-16.56C6.48,113.76,0,94.5,0,72.72,0,24.66,32.58.72,71.64.72c14.58,0,26.1,2.7,32.22,5.58L97.92,32.58c-6.12-2.7-13.68-4.68-25.38-4.68C50.22,27.9,33.3,41,33.3,72.72c0,29.52,15.3,43.73,34.38,43.73,4.5,0,8.1-.35,9.9-1.26V86H61V61h46.44Z"/><path d="M232,141.11H199.26l-8.1-32.39h-32l-7.56,32.39h-32L156.24,2h40.14ZM187.38,84.78l-6.12-27.9c-1.8-8.28-4.14-20.7-5.94-29.16H175c-1.8,8.46-4.14,21.24-5.76,29.16l-6.3,27.9Z"/><path d="M384.47,141.11H354.59l-2-49.67c-.72-14.76-1.44-33.3-1.26-51.66h-.54c-3.6,16.74-8.46,35.64-12.23,49L324.9,138.59H301L288.54,89.1c-3.42-13.32-7.38-32.22-10.26-49.32h-.54c-.54,17.28-1.44,36.9-2.16,51.84l-2.34,49.49H244.8L254.34,2H293L304.2,47c4,16.56,7.92,33.48,10.62,49.86h.72c2.88-16,6.84-33.84,11-50L338.4,2h38.15Z"/><path d="M485.27,141.11h-79V2h76.31V28.44H437.94v27.9h42.29V82.26H437.94v32.4h47.33Z"/><path d="M652.13,69.66c0,48.42-23.58,73.43-58.68,73.43-38.33,0-57.05-33.11-57.05-71.27C536.4,32.58,558,0,595.43,0,635.93,0,652.13,35.82,652.13,69.66Zm-82.44,1.62c-.17,26.64,8.83,45.72,24.84,45.72s24.3-19.08,24.3-46.26c0-24.3-8.1-44.64-24.3-44.64C577.61,26.1,569.69,47.34,569.69,71.28Z"/><path d="M774.53,2l-40,139.13H698l-38.69-139h34.91l13.14,58c3.6,15.66,7,31.68,9.72,48.42h.54c2.52-16.56,5.94-32.76,9.54-48.42L740.33,2Z"/><path d="M867.05,141.11H788V2h76.32V28.44H819.71v27.9H862V82.26h-42.3v32.4h47.34Z"/><path d="M956.69,76.14c9.54,3.78,14.4,12.78,17.64,26.1,3.6,14.94,7.56,33.47,10.26,38.87H951.83c-1.8-4-5.4-16.38-8.46-32.76-3.06-16.91-7.92-21.41-18.54-21.41h-6.12v54.17h-31.5V4a239,239,0,0,1,37.62-2.88c18.54,0,54.9,2,54.9,40.14a36.6,36.6,0,0,1-23,34.2ZM927,63.54c13.32,0,21.06-8.28,21.06-19.62,0-15.84-11.7-18.9-19.08-18.9-5,0-8.46.36-10.26.9V63.54Z"/>
                </g>
              </g>
            </svg>
          </div>
        </div>
        <p id="commentary"></p>
      </div>
      <!-- 使い方 -->
      <div class="note">
        <h2>ルール</h2>
        <p>マス目を開いていき、地雷以外すべてを開くとクリア！<br>地雷を開くとゲームオーバーです。</p>
        <h2>マスをタップ</h2>
        <p>マスをタップするとそのマスを開くことができます。</p>
        <h2>数字の意味</h2>
        <p>隣接するマス目に地雷が何個あるか表してます。</p>
        <h2>地雷がある場所には旗を立てよう！</h2>
        <p>下図のように爆弾の位置が特定できる場合、 旗を立ててマス目を開けないようにしましょう</p>
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
<!--jquery-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
<!-- script js-->
<script src="js/script.js"></script>

</body>
</html>

//マスと地雷の数を初期化
var N = 8;
var M = 8;
var number_of_bumb = 10;
//マスと地雷の数を取得
if (original == 1) {
  var N = rowNumber;
  var M = colNumber;
  var number_of_bumb = bombNumber;
}

//変数宣言
var mine_map = []; //地雷数を格納：地雷(-1),8近傍の地雷数を格納()
var display_board = []; //表示を管理：閉(0),開(1),旗(2)
var mode = "N"; //Nがノーマル、Fがフラッグ
var passedTime = 0;
var intervalId = null;
var timer = document.getElementById("timer");
var troutSize = 100 / M;
var i, j, k, count, over;

// N×Mのボードを表示する
for (i = 0; i < N * M; i++) {
  var button = document.createElement("button");
  button.setAttribute("id", "troutId" + i);
  document.getElementById("board").appendChild(button);
}
// mine_map初期化
for (i = 0; i < N; i++) {
  mine_map[i] = [];
  for (j = 0; j < M; j++) {
    mine_map[i][j] = 0;
  }
}
//display_board初期化
for (i = 0; i < N; i++) {
  display_board[i] = [];
  for (j = 0; j < M; j++) {
    display_board[i][j] = 0;
    display(i, j);
  }
}

//地雷を設置
count = 0;
while (count < number_of_bumb) {
  var min = 0;
  var max_n = N - 1;
  var max_m = M - 1;
  var a = Math.floor(Math.random() * (max_n + 1 - min)) + min;
  var b = Math.floor(Math.random() * (max_m + 1 - min)) + min;
  if (mine_map[a][b] != -1) {
    mine_map[a][b] = -1;
    count++;
  }
}

//地雷の数をカウントしてmine_map[]に挿入
for (i = 0; i < N; i++) {
  for (j = 0; j < M; j++) {
    if (mine_map[i][j] != -1) {
      for (row = -1; row < 2; row++) {
        for (column = -1; column < 2; column++) {
          if (
            i + row < 0 ||
            i + row > N - 1 ||
            j + column < 0 ||
            j + column > M - 1
          ) {
            continue;
          } else if (mine_map[i + row][j + column] == -1) {
            mine_map[i][j]++;
          }
        }
      }
    }
  }
}
//commentaryにマスと地雷の数を表示
document.getElementById("commentary").innerHTML =
  "縦" + N + "×横" + M + "マス,地雷" + number_of_bumb + "個";

//マスを正方形にする
$(".trout").css("width", "calc(" + troutSize + "%)");
var troutH = document.getElementsByClassName("trout")[0].clientWidth;
$(".trout").css("height", troutH + "px");

//ゲーム中の処理
troutClick();

//マスが押されたときの処理
function troutClick() {
  var trouts = document.getElementsByClassName("trout");
  var clickTroutId,
    troutIdArr,
    timerFlag = 0;
  for (let k = 0; k < trouts.length; k++) {
    trouts[k].addEventListener(
      "click",
      () => {
        //初めてマスを押したときにtimerスタート
        if (timerFlag == 0) {
          start();
          timerFlag++;
        }
        //clickされたtroutIdを取得
        troutIdArr = deconversion(k);
        clickTroutId = document.getElementById(
          "troutId" + conversion(troutIdArr[0], troutIdArr[1])
        );
        i = troutIdArr[0];
        j = troutIdArr[1];
        //Fのマスをクリックしたときはフラッグを外す
        if (display_board[i][j] == 2) {
          display_board[i][j] = 0;
          display(i, j);
        } else {
          //Nモードのとき
          if (mode == "N") {
            if (mine_map[i][j] == -1) {
              //地雷だったら
              stop(); //timerストップ
              over = 1;
              document.getElementsByClassName("game")[0].classList.add("show");
              document.getElementById("boardcover").classList.add("show");
              // 全てのマスを開いて答え合わせ
              var i1, j1;
              for (i1 = 0; i1 < N; i1++) {
                for (j1 = 0; j1 < M; j1++) {
                  if (mine_map[i1][j1] == -1) {
                    document
                      .getElementById("troutId" + conversion(i1, j1))
                      .classList.add("bomb");
                  } else {
                    display_board[i1][j1] = 1;
                    if (mine_map[i1][j1] != 0) {
                      document.getElementById(
                        "troutId" + conversion(i1, j1)
                      ).innerHTML = mine_map[i1][j1];
                    }
                    display(i1, j1);
                  }
                }
              }
              document
                .getElementById("troutId" + conversion(i, j))
                .classList.add("explosion");
              display(i, j);
            } else if (mine_map[i][j] > 0) {
              //数字が入っていたら
              display_board[i][j] = 1; //開く
              display(i, j); //8近傍をmime_mapを画面上に表示
              document.getElementById("troutId" + conversion(i, j)).innerHTML =
                mine_map[i][j];
            } else {
              //0だったら8近傍を開く
              display_board[i][j] = 1; //開く
              display(i, j); //表示
              open(i, j);
            }
          } else {
            //Fモード
            //開いていなければdisplay_boardに2を代入
            if (display_board[i][j] == 0) {
              display_board[i][j] = 2;
              display(i, j);
            }
          }
        }
        //地雷以外を全て開いたらクリア
        count = 0;
        for (i = 0; i < N; i++) {
          for (j = 0; j < M; j++) {
            if (display_board[i][j] == 1) {
              count++;
            }
          }
        }
        if (count == N * M - number_of_bumb && over != 1) {
          document.getElementById("boardcover").classList.add("show");
          document.getElementsByClassName("clear")[0].classList.add("show");
          //クリア時間を取得
          var time = document.getElementById("timer").innerText;
          //Twitterリンクの作成
          var clearTxt =
            "縦" +
            N +
            "×横" +
            M +
            "マス,地雷" +
            number_of_bumb +
            "個のステージを" +
            time +
            "でクリアしました！";
          var twHref =
            "https://twitter.com/share?text=" +
            clearTxt +
            "&url=" +
            "http://web1.nosesite.mydns.jp";
          var twLink =
            '<a href="' +
            twHref +
            '" target="_blank"><i class="fab fa-twitter"></i></a>';
          document.getElementById("twitter").innerHTML = twLink;
          document.getElementById("shareTxt").innerHTML =
            clearTxt + "<br>Twitterでシェアしてみよう！";
          //timerを止める
          stop();
        }
      },
      false
    );
  }
}
//flagBtnが押されたときの処理
function flag_judge() {
  var flagBtn = document.getElementById("flagBtn");
  if (mode == "N") {
    //Fモードに変換
    mode = "F";
    flagBtn.classList.add("active");
  } else {
    mode = "N";
    flagBtn.classList.remove("active");
  }
}

//troutとボードを対応させる関数 00 → 0,10 → N,
function conversion(x, y) {
  return M * x + y;
}

//troutとボードを対応させる関数 0 → 00,N → 10,
function deconversion(x) {
  var a = parseInt(x / M);
  var b = x - M * a;
  var array = [a, b];
  return array;
}

//display_boardの値からClassを付与する関数
function display(x, y) {
  var target = document.getElementById("troutId" + conversion(x, y));
  target.classList.remove("close", "open", "flag");
  target.classList.add("trout");
  if (display_board[x][y] == 0) {
    target.classList.add("close");
  } else if (display_board[x][y] == 1) {
    target.classList.add("open");
  } else if (display_board[x][y] == 2) {
    target.classList.add("flag");
  }
}

//再帰的にマスを開く関数
function open(x, y) {
  //８近傍を調べる
  var row = -1;
  var column = -1;
  for (row = -1; row < 2; row++) {
    for (column = -1; column < 2; column++) {
      // またははみ出している
      if (
        x + row < 0 ||
        x + row > N - 1 ||
        y + column < 0 ||
        y + column > M - 1
      ) {
        continue;
      } else if (mine_map[x + row][y + column] == -1) {
        //地雷
        continue;
      } else if (display_board[x + row][y + column] == 0) {
        //閉じている
        display_board[x + row][y + column] = 1; //開く
        display(x + row, y + column); //表示
        //0なら再帰
        if (mine_map[x + row][y + column] == 0) {
          open(x + row, y + column);
        } else {
          document.getElementById(
            "troutId" + conversion(x + row, y + column)
          ).innerHTML = mine_map[x + row][y + column];
        }
      }
    }
  }
  return;
}

// タイマーで使う関数
function start() {
  if (intervalId != null) {
    return;
  }
  intervalId = setInterval(function () {
    passedTime++;
    render();
  }, 1000);
}

function stop() {
  if (intervalId != null) {
    clearInterval(intervalId);
    intervalId = null;
  }
}

// setInterval(function () { }, 1000);

function render() {
  var minutes = Math.floor(passedTime / 60);
  var seconds = passedTime % 60;
  timer.textContent = zeroFill(minutes) + ":" + zeroFill(seconds);
}

function zeroFill(num) {
  return ("0" + num).slice(-2);
}

/* フォームのバリデーションチェック */
function test() {
  var row = f1.row_number.value;
  var col = f1.col_number.value;
  var bomb = f1.bomb_number.value;

  //入力値をチェック
  if (row > 0 && row < 51) {
    if (col > 0 && col < 51) {
      if (bomb > 0) {
        if (row * col > bomb) {
          return true;
        } else {
          alert("地雷の数はマスの数より少なく設定してください");
          return false;
        }
      } else {
        alert("地雷の数は1以上にしてください");
        return false;
      }
    } else {
      alert("適切な列数を入力してください");
      return false;
    }
  } else {
    alert("適切な行数を入力してください");
    return false;
  }
}

/* ボタンとの対応 */
document.getElementById("flagBtn").addEventListener("click", flag_judge);

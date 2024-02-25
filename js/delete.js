// function confirmDelete() {
//   const flag = confirm('削除してもよろしいですか？');

//   if(flag === true) {
//     window.location.href = './delete.php';
//   } else {
//     window.location.href = './contact.php';
//   }
// }

// function confirmDelete() {
//   const flag = confirm('削除してもよろしいですか？');

//   if(flag === true) {
//     // 削除する対象のIDを取得
//     const id = <?php echo h($_GET['id']) ?>;
//     // 削除処理を実行するURLを生成
//     const url = './delete.php?id=' + id;
//     // 削除処理を実行するURLにリダイレクト
//     window.location.href = url;
//   } else {
//     window.location.href = './contact.php';
//   }
// }

// function confirmDelete(id) {
//   const flag = confirm('削除してもよろしいですか？');

//   if (flag === true) {
//     // 削除処理を実行するURLを生成
//     const url = './edit/delete.php?id=' + id;
    
//     // XMLHttpRequestで削除処理を実行する
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', url, true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.send();
    
//     // 削除完了後、リダイレクトする
//     xhr.onreadystatechange = function() {
//       if (xhr.readyState === 4 && xhr.status === 200) {
//         window.location.href = './contact.php';
//       }
//     };
//   } else {
//     window.location.href = './contact.php';
//   }
// }
// function confirmDelete(id) {
//   const flag = confirm('削除してもよろしいですか？');

//   if (flag === true) {
//     // 削除処理を実行するURLを生成
//     const url = './edit/delete.php?id=' + id;

//   } else {
//     return false;
//   }
// }
// function confirmDelete(id) {
//   const flag = confirm('削除してもよろしいですか？');

//   if (flag === true) {
//     const url = './edit/delete.php?id=' + id;
//     window.location.href = url;
//   } else {
//     e.preventDefault();
//   }

//   return false;
// }



// // フォームのサブミットの場合
// var submit_flg = false;

// // ページ遷移時に確認ダイアログの設定
// window.addEventListener('beforeunload', function(e) {
//   if( !submit_flg ) {
//     e.preventDefault();
//     e.returnValue = '他のページに移動しますか？';
//   }
// });

// var form = document.getElementById('form');
// form.addEventListener('submit', function(e) {
//   submit_flg = true;
// });

// function confirmDelete() {
//   const result = confirm("本当に削除しますか？");
//   if (!result) {
//     alert("削除がキャンセルされました"); // メッセージを表示する
//     // または、console.log("削除がキャンセルされました"); など
//     return; // 処理を中断する
//   }
//   // 削除処理を実行する
// }


// function confirmDelete() {
//   const flag = confirm("本当に削除しますか？");
//   if (flag === true) {
//     window.location.href = "./delete.php";
//   } else {
//     return;
//   }
//   // 削除処理を実行する
// }

// document.addEventListener('DOMContentLoaded', function(){
//   this.documentElement.getElementById('delete').addEventListener('submit', function(e) {
//     if(!window.confirm("本当に削除しますか？")) {
//       e.preventDefault();
//     }
//   }, false)
// }, false)
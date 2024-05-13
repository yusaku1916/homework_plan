document.getElementById('teacher').addEventListener('submit', function(event) {
  var input1 = document.getElementById('work_content').value;
  var input2 = document.getElementById('work_coment').value;
  
  if (input1 === '' || input1.length > 200 || input2 === '' || input2.length > 200) { // 入力が空または200文字を超える場合
    event.preventDefault(); // フォームの送信を防ぐ
    alert('両方のフィールドには、200文字以下の文字列を入力してください'); // ユーザーにメッセージを表示
  }
});
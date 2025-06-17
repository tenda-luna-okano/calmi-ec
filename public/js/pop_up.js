$(document).ready(function(){
  let currentProductId=null;
  $('.delete_subscription').on('click',function(){
    $('.modal').css('display','block'),
    $('.delete.popup').css('display','block'),
    $('.delete.popup').css({
        top:'50%',left:'50%',transform: 'translate(-50%, -50%)'
    });
  });

  $('.change_subscription').on('click',function(){
    currentProductId=$(this).data('productId');
    const hiddenSubscriptionIDInput = $('#hiddenSubscriptionID');
    $('.modal').css('display','block'),
    $('.change.popup').css('display','block'),
    $('.change.popup').css({
        top:'50%',left:'50%',transform: 'translate(-50%, -50%)'
    });
    hiddenSubscriptionIDInput.val(currentProductId);
  });

  /*
  //クリック後に定期便の内容をテーブルに反映
  $('.yes').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none')

    if(currentProductId!=null) {
      if (currentProductId=='1') { 
        console.log(currentProductId);
      } else if (currentProductId=='2') { 
        console.log(currentProductId);
      } else {
        console.log(currentProductId);
      }
    }
    route('some.other.route',currentProductId);

  });
  */

  $('.no').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none')
  });

  $('.cancel').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none')
  });
});


/*document.addEventListener('DOMContentLoaded', function() {
        const changeSubscriptionButtons = document.querySelectorAll('.change_subscription');
        const confirmationPopup = document.getElementById('confirmationPopup');
        const yesButton = confirmationPopup.querySelector('.yes');

        let currentProductId = null; // 現在選択されている商品のIDを保持する変数

        // 各「変更する」ボタンにクリックイベントリスナーを追加
        changeSubscriptionButtons.forEach(button => {
            button.addEventListener('click', function() {
                currentProductId = this.dataset.productId; // クリックされたボタンから商品IDを取得
                confirmationPopup.style.display = 'block'; // ポップアップを表示
                // 必要に応じて、ポップアップを中央に配置するなどのスタイル調整を行う
            });
        });

        // 「はい」ボタンのクリックイベント
        yesButton.addEventListener('click', function() {
            if (currentProductId !== null) {
                // ここで currentProductId に基づいて処理を分岐
                if (currentProductId === '0') { // 例えば、IDが0の商品の場合
                    console.log('商品ID 0 の定期便を変更します');
                    // ここに商品ID 0 の変更処理を記述
                } else if (currentProductId === '1') { // 例えば、IDが1の商品の場合
                    console.log('商品ID 1 の定期便を変更します');
                    // ここに商品ID 1 の変更処理を記述
                } else {
                    console.log(`その他の商品 (ID: ${currentProductId}) の定期便を変更します`);
                    // その他の商品の変更処理
                }
            }
            confirmationPopup.style.display = 'none'; // ポップアップを非表示
            currentProductId = null; // 商品IDをリセット
        });
    });
    */
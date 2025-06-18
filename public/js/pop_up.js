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

  $('.no').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none')
  });

  $('.cancel').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none')
  });
});
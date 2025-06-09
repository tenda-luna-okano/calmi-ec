$(document).ready(function(){
  $('.delete_subscription').on('click',function(){
    $('.modal').css('display','block'),
    $('.delete.popup').css('display','block'),
    $('.delete.popup').css({
        top:'50%',left:'50%',transform: 'translate(-50%, -50%)'
    });
  });

  $('.change_subscription').on('click',function(){
    $('.modal').css('display','block'),
    $('.change.popup').css('display','block'),
    $('.change.popup').css({
        top:'50%',left:'50%',transform: 'translate(-50%, -50%)'
    });
  });

  $('.yes').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none'),
    console.log('yes')
  });

  $('.no').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none'),
    console.log('no')
  });

  $('.cancel').on('click',function(){
    $('.modal').css('display','none'),
    $('.popup').css('display','none'),
    console.log('cancel')
  });
});

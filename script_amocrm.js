$(document).ready(function() {
    $('select').material_select();

});

/**************************************************** */
// xwtool
window.onload=function(){
    var tool = new xwtools();  
    tool.liraxWebPhoneInit({
      widgetId: "d783f96e1533f92d1c714840a412763b",
      targetClass: "lirax-make-call",
      scriptUrl: "https://lirax.ua/webcall"
    });
    tool.liraxWebFormInit({
      widgetId: "d783f96e1533f92d1c714840a412763b",
      targetClass: "lirax-custom-form",
      scriptUrl: "https://callme2.voip.com.ua/form",
      prefix: '+380',
      infoMessage: 'Message from web site: ',  //for chat dialog
      successMessage: 'Data sent successfully!',
      errorMessage: 'Data sent error!',
      nameError: 'must be not empty and more then 3 letters',
      phoneError: 'must be not empty and more then 8 digits',
      onSubmit: function() {
        console.log('submit');
      },
      onSuccess: function() {
        console.log('success');
      },
      onError: function() {
        console.log('error');
      }
    });
    tool.liraxWebCallInit({
      widgetId: "d783f96e1533f92d1c714840a412763b",
      targetClass: "lirax-custom-callback-form",
      scriptUrl: "https://callme2.voip.com.ua/callback",
      prefix: '+380',
      successMessage: 'Data sent successfully!',
      errorMessage: 'Data sent error!',
      phoneError: 'must be not empty and more then 8 digits',
      onSubmit: function() {
        console.log('submit');
      },
      onSuccess: function() {
        console.log('success');
      },
      onError: function() {
        console.log('error');
      }
    });
  }
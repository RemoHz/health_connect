
jQuery(function($){
  
  // submit form with Ajax
  // displays message on success or error
  
  $('#options_form').on('submit',function(e) {
    function submitMessage(msg){
      var msgClass
      var text='Settings saved.'
      
      switch(msg){
        case 'success':
          msgClass='updated'
          break
        case 'error':
          msgClass='error'
          break
      }
      
      var div=$('<div>')
      div.attr('id','submit_msg')
      div.addClass(msgClass)
      div.append('<p><strong>'+text+'</strong></p>')
      $('.wrap h2').first().after(div)
      
      $("#submit").attr('disabled',false)
    }

    $.ajax({
      url:$(this).attr('action'),
      data:$(this).serialize(),
      type:'POST',
      
      success:function(data){
        submitMessage('success')
        console.log('Success');
      },
      
      error:function(data,msg){
        submitMessage('error')
        console.log('Submit Error: '+msg);
      }
    });
    
    $("#submit_msg").remove()
    $("#submit").attr('disabled',true)

    e.preventDefault(); 
    
  });
  
  
  // returns object representing a list item for the theme list
  // uses 'ace_editor_theme' variable as global
  // obtained from the main .php page using the inline <script>
  
  function getOption(item){
    var label=item.caption
    var value=item.theme
    var selected=''
    if(value==ace_editor_theme)
      selected='selected="selected"'
    
    var option={
      label:label,
      value:value,
      selected:selected,
    }
    
    return option
  }
  
  function sortByName(a,b){
    var aName = a.label.toLowerCase();
    var bName = b.label.toLowerCase(); 
    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
  }
  
//---------------------------------------------------------------------
  
  var ace_themelist = ace.require( 'ace/ext/themelist' ).themes;
  var theme_field=$("#editor_theme")
  
  if(theme_field){
    theme_field.empty()
    var options=[]
    
    // fill the list of themes from the 'ext-themelist.js' script in the 'ace-min' folder
    // plus add custom theme
    
    Array.forEach(ace_themelist,function(item){
      options.push(getOption(item))
    })
    options.push(getOption({
      caption:'Sublime',
      theme:'ace/theme/sublime'
    }))
    
    // sort themes by name and fill the <select> element with options
    
    options.sort(sortByName)
    Array.forEach(options,function(item){
      theme_field.append('<option value="'+item.value+'" '+item.selected+'>'+item.label+"</option>")
    })

  }
})


jQuery(document).ready(function ($) {

  // unlock default editor tabs
  
  $('.wp-switch-editor.switch-html').attr('disabled',false)
  $('.wp-switch-editor.switch-ace').attr('disabled',false)
  
  // call the constructor
  
	var qwe=$('#content').AceEditor({
    /*
     * Adds HTML tab and assigns onClick events for the tabs
     * When the HTML tab is clicked the Editor is loaded with 'loadAce()' function
     * When the Visual tab is clicked the content synchronizes with TinyMCE editor and Ace Editor is destroyed
     * Additionally appropriate tabs become disabled and enabled after switching between them
     */
		onInit: function () {
			var self = this;
      
      var button=$('<button id="content-ace" type="button" class="wp-switch-editor switch-ace">HTML</button>')
      button.appendTo('.wp-editor-tabs')
      
			button.click(function () {
        if(!self.loaded) self.loadAce();
        return false
      });
			
			$('#content-html, #content-tmce').on('click', function (e) {
				var clicked = $(e.currentTarget).attr('id').split('-')[1];
        
        if(self.loaded){
  				switch (clicked) {
  					case 'tmce':
              self.$container.find(".mce-container").show();
              $('.wp-switch-editor.switch-html').attr('disabled',false)
              $('.wp-switch-editor.switch-ace').attr('disabled',false)
              break;
            case 'html':
              self.$elem.show();
              $("#ed_toolbar").show();
              break;
          }
          
          self.synchronize.apply(self);
  				self.destroy(e);
        }else{
          switch (clicked) {
            case 'tmce':
              $('.wp-switch-editor.switch-ace').attr('disabled',false)
              break;
            case 'html':
              $('.wp-switch-editor.switch-ace').attr('disabled',true)
              break;
          }
        }
			});
		},
    
    /*
     * After the Editor is loaded all other elements become hidden
     * Next the Word Wrap option adds to the toolbar
     * And the Text tab is disabled
     */
		onLoaded: function () {
      var self=this
      
      this.$elem.hide();
      this.$container.find(".mce-container").hide();
      $('#post-status-info').hide();
      $('#wp-content-wrap').removeClass('html-active tmce-active').addClass('ace-active');
      
      var aceOptions=$('<div class="ace-options-toolbar">')
      var wordWrap=$('<input type="checkbox" id="ace-word-wrap" checked="checked" />')
      var label=$('<label> Word Wrap</label>')
      label.prepend(wordWrap)
      
      aceOptions.append(label)
      aceOptions.css({
        'float':'left',
        'margin-left': '0.5em',
        'padding-top': '0.3em',
      })
      
      wordWrap.change(function(e){
        // console.log('Word Wrap: '+this.checked)
        self.reloadAce({'wrapMode':this.checked})
      })
      
      $("#wp-content-editor-tools #wp-content-media-buttons").after(aceOptions)
      
      $('.wp-switch-editor.switch-html').attr('disabled',true)
      this.editor.focus()
    },
    
    /*
     * After the Editor is destroyed it becomes hidden and TinyMCE editor shows
     * jQuery UI Resizable object is destroyed and default status bar with the resize handler appears
     */
    onDestroy: function (e) {
      var clicked = $(e.currentTarget).attr('id').split('-')[1];
      var check;
      setUserSetting('editor', clicked);
      
      $('.ace-options-toolbar').remove()
      this.$container.resizable("destroy")
			$('#post-status-info').show();
      $('#wp-content-wrap').addClass(clicked + '-active').removeClass('ace-active');
      
      switch (clicked) {
        case 'tmce':
          this.$container.css({
            "width":"auto", 
            "height":"auto", 
            "min-height": "auto", 
            "min-width": "auto", 
          })
          break;
        case 'html':
					break;
			}
		}
    
	});

});

(function ($) {
  /*
   * The constructor which assigns initial values to variables
   * Adds object passed in the 'config' parameter to its prototype
   * The config is obtained from the 'AceEditor' jQuery plugin below as initial variabled
   * And from the call in the beginning of the script, which adds functions to the object
   * Then calls 'onInit()' function
   */
	var AceEditor = function (config) {
		$.extend(this, config);
		
		this.$elem = this.element;
		this.element = this.$elem.attr('id');
		
		this.$container = this.container ? $(this.container) : this.$elem.parent();	
		this.contWd = this.$container.width();
		this.loaded = false;
		this.tinymce = !!window.tinymce;
		
		if (this.onInit) this.onInit.call(this);		
	};

	AceEditor.prototype = {
    /*
     * Inserts Editor in the document,
     * Assigns container to the Editor,
     * Sets its options, content and style
     * Then calls 'onLoaded()' function
     */
		loadAce: function () {
      if (this.loaded) return false;
			var self = this;
      
      this.height=this.$container.height(),
			this.insertEditor();	
      
			this.editor = ace.edit(this.aceId);
			this.$editor = $('#' + this.aceId);
      
			this.setEditorProps();
      this.setEditorContent();  
			this.setEditorStyle();	
      
      this.editor.resize(true);
      
			this.loaded = true;
      if (this.onLoaded) 
        this.onLoaded.call(this);
		},
    
    /*
     * Destroys and loads the Editor again 
     * Needed when the Word Wrap option is changed
     * Without Editor rebuilding the horizontal scrollbar handler doesn't appear if the Word Wrap if off
     * Performs the same actions as 'loadAce()' without showing/hiding containers
     */
    reloadAce: function (options) {
      var self = this;
      var value = this.editor.getValue();
      
      this.editor.destroy();
      this.editor = ace.edit(this.aceId);
      this.setEditorProps(options);
      
      this.editor.getSession().setValue(value);   
      this.setEditorStyle();  
      
      this.editor.resize(true);
    },
    
    /*
     * Insert editor container after the Text view textarea element ('#content')
     */		
		insertEditor: function () {
			$('<div id="' + this.aceId + '"></div>').insertAfter(this.$elem);
		},
		
    /*
     * Sets custom shortcuts for full screen, new line, switch to Visual tab commands
     * Sets HTML mode, theme, wrap mode, Editor options
     */
		setEditorProps: function (options) {
      // ace.require("ace/ext/language_tools");
      
      var aceFontSize='14px'
      var aceTheme='ace/theme/sublime'
      try{
        if(ace_font_size && ace_editor_theme){
          aceFontSize=ace_font_size
          aceTheme=ace_editor_theme
        }
      }catch(e){}
      
      this.editor.$blockScrolling = Infinity
      
    //-------------------------------------------------------      
  
      var dom = require("ace/lib/dom");
      this.editor.commands.addCommands([{
        name: "toggleFullscreen",
        bindKey: {win: "F11", mac: "F11"},
        exec: function(editor) {
          var fullScreen = dom.toggleCssClass(document.body, "fullScreen")
          dom.setCssClass(editor.container, "fullScreen", fullScreen)
          
          var leftMenu,topMenu,left,top,width,height
          
          if(fullScreen){
            leftMenu=$("#adminmenuwrap")
            topMenu=$("#wpadminbar")
            
            left=leftMenu.width()
            top=topMenu.height()
            width=$(window).width()-left
            height=$(window).height()-top
            
            if(leftMenu.css('display')=='none'){
              left=0
              width="100%"
            }
          }else{
            left=0
            top=0
            width="auto"
            height="auto"
          }
          
          var container=$(editor.container)
          container.css({
            "width":width,
            "height":height,
            "left":left,
            "top":top
          })
          
          editor.setAutoScrollEditorIntoView(!fullScreen)
          editor.resize()
        },
        readOnly: true
      }]);

      this.editor.commands.addCommands([{
        name: "newLine",
        bindKey: {win: "Ctrl+Enter", mac: "Command+Enter"},
        exec: function(editor) {
          editor.navigateLineEnd()
          editor.getSession().getDocument().insertNewLine(editor.getCursorPosition())
        },
        readOnly: true
      }]);
      
      this.editor.commands.addCommands([{
        name: "Visual Tab",
        bindKey: {win: "Ctrl+R", mac: "Command+R"},
        exec: function(editor) {
          var tab=$('#content-tmce')
          tab && tab.click()
        },
        readOnly: true
      }]);
      
    //-------------------------------------------------------      
      
      this.editor.getSession().setMode('ace/mode/html');
			this.editor.setTheme(aceTheme);
      
      var wrapMode=true
      if(options){
        wrapMode=options.wrapMode
      }
      
      this.editor.getSession().setUseWrapMode(wrapMode);
      
      this.editor.getSession().setTabSize(2);
      this.editor.setShowPrintMargin( false );
      
      this.editor.setOptions({
        // enableBasicAutocompletion: true,
        // enableSnippets: true,
        // enableLiveAutocompletion: true,
        // fontSize:20,
        
        fontSize:aceFontSize,
        enableEmmet: true,
        behavioursEnabled:false,
        displayIndentGuides:true,
      });
		},
    
    /*
     * Get content from the TinyMCE editor, format it and put to the Ace editor
     */
    setEditorContent: function () {
      tinyMCE.get(this.element).save()
      
      var value = $("#content").text();
      var frame=$("#content_ifr")[0]
      if(frame) value=frame.contentDocument.body.innerHTML
        
      var opt={
        'indent_inner_html': false,
        'indent_size': 2,
        "wrap_line_length":0,
        "end_with_newline":true,
      }
      
      value=html_beautify(value,opt)
      value=this.customFormatHTML(value)
   
      this.editor.getSession().setValue(value);     
    },
		
    /*
     * Sets Editor size,
     * Margins (space between first/last line and Editor container plus left and right space),
     * Assigns Resizable container using jQuery UI 'resizable()' function
     * The Editor can be resized vertically using the bottom (southern) handler
     */
		setEditorStyle: function () {
      var self=this
      this.$container.css({
        "position": 'relative',
        "min-height": "100px",
        "height":this.height,
      })
      
      this.editor.renderer.setScrollMargin(5, 5, 0, 0) 
      
      this.$container.resizable({
        handles:'s',
        resize: function( event, ui ) {
          self.editor.resize();
        }
      })
		},
		
    /*
     * Gets edited value from the Editor
     * and puts it to the Text view textarea ('#content')
     * and to the TinyMCE text container
     * TinyMCE must be previously loaded so that changes take effect
     */
		synchronize: function () {
			var val = this.editor.getValue();
      $("#content").text(val)
      
      var mceElement=tinyMCE.get(this.element)
			if (this.tinymce && mceElement){
        mceElement.setContent(val);
      }
		},
		
    /*
     * Removes the Editor container
     * Calls 'onDestroy()' function
     */
    destroy: function () {
      if (!this.loaded) return false;
      this.$editor.remove();
      this.editor.destroy();
      this.loaded = false;
      if (this.onDestroy) 
        this.onDestroy.apply(this, arguments);
    },
    
    /*
     * Additional formatting for the 'html_beautify()' function
     * Adds blank lines before the 'newLineTags' elements
     */
		customFormatHTML: function (value) {
      var newLineTags=['p','pre','div','h3']
      var val=value
      
      for(var i in newLineTags){
        var tag=newLineTags[i]
        var rx=new RegExp("(<"+tag+")","g")
        val=val.replace(rx,'\n$1')
      }
      return val
		}
		
	};
	
  /*
   * jQuery plugin for the Editor
   * Taken from the 'Ace Editor for WP' plugin
   * Initializes basic variables and adds them to the AceEditor object
   */
	$.fn.AceEditor = function (option, value) {
		var option = option || null;
		var data = $(this).data('AceEditor');
		
		if (data && typeof option == 'string' && data[option]) {                    // if data exists (has been instantiated) and calling a public method
			data[option](value || null);
		} else if (!data) {                                                         // if no data, then instantiate the plugin
			var config = $.extend({
				element: $(this),
				aceId: 'ace-editor',
				container: false
			}, option);		
			$(this).data('AceEditor', new AceEditor(config));
      
      return $(this)
		} else {
			$.error( 'Method "' +  option + '" does not exist on AceEditor!');
		}
	};
	
})(jQuery);



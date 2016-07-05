define("ace/theme/sublime",["require","exports","module","ace/lib/dom"], function(require, exports, module) {

exports.isDark = false;
exports.cssClass = "ace-sublime";
exports.cssText = ".ace-sublime .ace_gutter {\
background: #dddddd;\
color: #666666\
}\
.ace-sublime .ace_print-margin {\
width: 1px;\
background: #555651\
}\
.ace-sublime {\
background-color: #eeeeee;\
color: #333333\
}\
.ace-sublime .ace-text{\
color: #111111\
}\
.ace-sublime .ace_cursor {\
color: #333\
}\
.ace-sublime .ace_marker-layer .ace_selection {\
background: #BAD6FD;\
border-radius: 4px\
}\
.ace-sublime.ace_multiselect .ace_selection.ace_start {\
border-radius: 4px\
}\
/*---*/.ace-sublime .ace_marker-layer .ace_step {\
background: #444444\
}\
.ace-sublime .ace_marker-layer .ace_bracket {\
margin: -1px 0 0 -1px;\
border: 1px solid #49483E;\
background: #FFF799\
}\
.ace-sublime .ace_marker-layer .ace_active-line {\
background: #e5e5e5\
}\
.ace-sublime .ace_gutter-active-line {\
background-color: #e5e5e5\
}\
.ace-sublime .ace_marker-layer .ace_selected-word {\
border: 1px solid #555555;\
border-radius:4px\
}\
.ace-sublime .ace_invisible {\
color: #999999\
}\
.ace-sublime .ace_entity.ace_name.ace_tag,\
.ace-sublime .ace_keyword,\
.ace-sublime .ace_storage {\
color: #0000FF\
}\
.ace-sublime .ace_meta.ace_tag {\
color: #0033CC;\
font-weight: 700\
}\
/*---*/.ace-sublime .ace_punctuation,\
.ace-sublime .ace_punctuation.ace_tag {\
color: #000\
}\
.ace-sublime .ace_constant {\
color: #333333;\
font-weight: 700\
}\
.ace-sublime .ace_constant.ace_character,\
.ace-sublime .ace_constant.ace_language,\
.ace-sublime .ace_constant.ace_numeric,\
.ace-sublime .ace_constant.ace_other {\
color: #0066FF;\
font-weight: 700\
}\
.ace-sublime .ace_constant.ace_numeric{\
font-weight: 100\
}\
/*---*/.ace-sublime .ace_invalid {\
color: #F8F8F0;\
background-color: #F92672\
}\
.ace-sublime .ace_invalid.ace_deprecated {\
color: #F8F8F0;\
background-color: #AE81FF\
}\
.ace-sublime .ace_support.ace_constant,\
.ace-sublime .ace_support.ace_function {\
color: #333333;\
font-weight: 700\
}\
.ace-sublime .ace_fold {\
background-color: #464646;\
border-color: #F8F8F2\
}\
.ace-sublime .ace_storage.ace_type,\
.ace-sublime .ace_support.ace_class,\
.ace-sublime .ace_support.ace_type {\
color: #3333fc;\
font-weight: 700\
}\
.ace-sublime .ace_entity.ace_name.ace_function,\
.ace-sublime .ace_entity.ace_other,\
.ace-sublime .ace_variable {\
color: #3366cc;\
font-style: italic\
}\
.ace-sublime .ace_entity.ace_other.ace_attribute-name{\
color: #0033D1;\
}\
.ace-sublime .ace_string.ace_attribute-value{\
color: #0A7507;\
}\
.ace-sublime .ace_variable.ace_parameter {\
font-style: italic;\
color: #2469E0\
}\
.ace-sublime .ace_string {\
color: #a55f03\
}\
.ace-sublime .ace_comment {\
color: #777777;\
font-style: italic\
}\
.ace-sublime .ace_fold-widget {\
background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAANElEQVR42mWKsQ0AMAzC8ixLlrzQjzmBiEjp0A6WwBCSPgKAXoLkqSot7nN3yMwR7pZ32NzpKkVoDBUxKAAAAABJRU5ErkJggg==);\
}\
.ace-sublime .ace_indent-guide {\
background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAEklEQVQImWPQ0FD0ZXBzd/wPAAjVAoxeSgNeAAAAAElFTkSuQmCC) right repeat-y\
}";

var dom = require("../lib/dom");
dom.importCssString(exports.cssText, exports.cssClass);
});

=== HTML Post Editor ===
Contributors: mortalis
Tags: admin, post-editor, ace-editor, html, raw, source, syntax-highlight, shortcuts, emmet, full-screen, resizable
Requires at least: 4.1
Tested up to: 4.1
Stable tag: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds HTML tab to the post editor which shows the raw source of the page and is highlighted with the Ace Editor


== Description ==

The plugin adds **HTML editor** to the default post editor. The editor is accessible through a new **HTML tab**. When opening the tab the editor loads the raw HTML source of the post, formats it and applies **Ace Editor** to the input area. So the edit area has main features from this web editor: *syntax highlight, line numbers, highlight of matching tags and brackets, keyboard shortcuts*.

The plugin is based on the [ACE Editor for WP](https://wordpress.org/plugins/ace-editor-for-wp/) plugin. It's updated for *Wordpress 4.1* and *Ace editor 1.1.8*.


= Features =

- Syntax highlighting
- Line numbers
- Line highlighting
- Highlight of matching tags and brackets
- Syntax checking
- Multicursor
- Ace Editor keyboard shortcuts
- Search box
- Resizable area
- Emmet HTML snippets
- Full screen mode
- Toggle word wrap option
- Custom shortcuts
- Options page


= Usage =
  
1. Before switching to the **HTML tab** first make sure you are on the **Visual tab** because the script loads the data from the *TinyMCE* editor which is loaded only when the **Visual tab** activates. 
2. When you are on the **Text tab** the *HTML tab* is disabled and has a *light red background* so you won't be able to switch to it until you activate the **Visual tab**. 
3. When the **HTML tab** is activated the *Text tab* becomes disabled so you may only switch to the **Visual tab**. This is done to prevent the *conflicts* of content which is loaded when appropriate tab is activated.
4. If you edit some content in the **HTML mode** and want to *save* it and *update the post* first switch to the **Visual tab** so the edited HTML code loads to the **TinyMCE editor**. It's *required* because the content synchronization is performed only after *switching off the HTML tab*.


= Working with features =
  
1. **Multicursor** lets you edit multiple regions at the same time. You can use **default shortcuts** to add remove regions or select multiple blocks with mouse holding **Ctrl key**.
2. **Default keyboard shortcuts** for the *Ace editor* can be found on the [Ace GitHub Wiki](https://github.com/ajaxorg/ace/wiki/Default-Keyboard-Shortcuts) page or on the [Ace Editor Shortcuts](http://pcadvice.co.nf/blog/ace-editor-shortcuts/) page I created for the Wordpress version of this editor. Here I selected some shortcuts and *organized* them by *categories*.
3. **The Search box** gives additional functions:
  - Search All instances
  - Use of Regular expressions
  - Whole word search
  - Replace content
  - Replace All  
It shows with **Ctrl+F** and **Ctrl+H** combinations.
4. The editor area can be **resized** using the *bottom (southern) handle* but it doesn't remember its size after switching.
5. **Emmet snippets** are used to improve code typing. The *documentation*: 
  - [Basic Usage](http://docs.emmet.io/abbreviations/)
  - [Full list](http://docs.emmet.io/cheat-sheet) of HTML and CSS snippets
6. **Full screen mode** is not a default Ace Editor feature. I've taken the idea from a **demo** page in the [Ace build package](https://github.com/ajaxorg/ace-builds/tree/master/demo). The page is named **scrollable-page.html**.  
It adds a new custom shortcut to the editor which toggles the **full/normal** mode. So I set this function to the **F11** key.  
The function extends the editor container to the Wordpess admin boundaries but doesn't hide **top and left menus**. It also works if the *window size* is changed or the left menu is *collapsed*. But to fill the available space in these cases the **F11** key must be pressed *two times* when the editor is in the *full screen mode*.  
If you need to change this F11 key to other write me a request and I'll add an option to the options page.
7. **The Word Wrap** checkbox appears when the **HTML tab** is switched to. By default the editor has word wrapping *enabled*. You can toggle this option with the checkbox. But it only remembers its state in the *current editor session*.
8. I've also added some **custom shortcuts**:
  - **Ctrl+Enter** adds a new line below the current one regardless of what is the current position the cursor on the current line
  - **Ctrl+R** switches to the *Visual tab*


= The Options Page =
  
1. **Font size** of the editor may be set in any CSS units *(px, pt, em)*.
2. **Editor themes** dropdown shows default **Ace Editor** theme list plus my custom theme **Sublime** which is the default theme for the plugin.
3. **The options form** is submitted using **Ajax** so the **page doesn't reload**, just wait until the save button is *enabled* and the *success message* appears at the top. Then reload the edit post page to see the editor changes.


= Other Notes =

1. **Emmet plugin** works on the *specially built package* for the **Ace Editor**. Its source is [here](https://github.com/cloud9ide/emmet-core). And I reduced its size by removing the *Underscore.js* part and *CSS snippets*. So the **final package** is [here](https://github.com/mortalis13/emmet-for-ace-css).
2. When the **HTML tab** is loaded the *source code* is first represented as one long line. So I used the [JS Beautifier](https://github.com/beautify-web/js-beautify/tree/master/js) tool and exactly its **beautify-html.js** subscript to format that line so it has some readable structure. Additionally I applied my own function to have some blank lines before `<hx>`, `<p>` and `<pre>` tags.
3. I've put only the *minified version* of the **Ace Editor** scripts to the plugin package. To get the full **uncompressed** files go to its [GitHub repository](https://github.com/ajaxorg/ace-builds).


= Resource Links =

1. [Ace Editor Main Site](http://ace.c9.io) and [GitHub repository](https://github.com/ajaxorg/ace).
2. [Ace Builds GitHub repository](https://github.com/ajaxorg/ace-builds) with sources.
3. [Ace Editor Demo Pages](https://github.com/ajaxorg/ace-builds/tree/master/demo).
4. [Ace Editor Keyboard Shortcuts](https://github.com/ajaxorg/ace/wiki/Default-Keyboard-Shortcuts) and [my edition](http://pcadvice.co.nf/blog/ace-editor-shortcuts).
5. Emmet plugin: [Main Site](http://emmet.io), [Documentation](http://docs.emmet.io), [List of Abbreviations](http://docs.emmet.io/cheat-sheet).
6. [Special Emmet package](https://github.com/mortalis13/emmet-for-ace-css) for the Ace Editor.
7. [JS Beautifier](https://github.com/beautify-web/js-beautify/tree/master/js).

This plugin's GitHub repository: https://github.com/mortalis13/html-post-editor.


= Detected Problems =

- When switching to the full-screen mode (F11) and the "Enable full-height editor and distraction-free functionality" Screen option is enabled the post tabbar stays on the front.
- If cursor doesn't match its established position (e.g., should be in the line end after the last character but displays with offset to the left) try installing Consolas fonts to the Fonts folder (this problem detected in Windows XP where no Consolas fonts installed by default). Install all 4 types of Consolas (Regular, Bold, Italic, Bold Italic). I've taken them from Windows 7 Fonts folder.


== Installation ==

1. Upload `html-post-editor` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Open edit post page (add new or edit existing post).
4. Switch to the HTML tab and check the editor loads the HTML source of the post.


== Screenshots ==

1. HTML view of the post, line highlight and matching tag highlight
2. Multicursor and highlighting of found occurrences of the selected word
3. Search box with RegEx mode (searches for the word with different endings)
4. Emmet abbreviation before
5. Emmet abbreviation after
6. Full screen mode
7. Options page
8. Saving options

# kohana-editor
Automatically exported from code.google.com/p/kohana-editor

This module allows you to add text editors on the page. Current version contains drivers for Tiny_MCE and FCKeditor. Editor configuration editor can be combined in a profile using Kohana config files.

Usage examples:

        // 1.Simply create Tiny_MCE object with default settings
        $ed = new Editor('TinyMCE');
        echo $ed->render();
        // 2.Create FCKeditor and set some properties
        $ed = new Editor('FCKeditor', 'default');
        $ed->setWidth(900);
        $ed->setFieldName('newtext');
        $ed->render(TRUE, TRUE);

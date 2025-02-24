
/*
function executeCommand(command, value) {
    document.execCommand(command, false, value);
}


document.getElementById('bold').addEventListener('click', function() {
    executeCommand('bold');
});

document.getElementById('italic').addEventListener('click', function() {
    executeCommand('italic');
});


document.getElementById('underline').addEventListener('click', function() {
    executeCommand('underline');
});



document.getElementById('strikethrough').addEventListener('click', function() {
    executeCommand('strikeThrough');
});



document.getElementById('superscript').addEventListener('click', function() {
    executeCommand('superscript');
});



document.getElementById('subscript').addEventListener('click', function() {
    executeCommand('subscript');
});



document.getElementById('code').addEventListener('click', function() {
    executeCommand(
        'innerHtml', 
        '<code>'+document.getSelection().toString()+'</code>');
});


document.getElementById('font').addEventListener('change', function() {
    executeCommand('fontName', this.value);
});



document.getElementById('fontSize').addEventListener('change', function() {
    executeCommand('fontSize', this.value);
});



document.getElementById('textColor').addEventListener('click', function() {
    executeCommand('textColorPicker').click();
});



document.getElementById('textColorPicker').addEventListener('change', function() {
    executeCommand('fontcolor', this.value);
});



document.getElementById('bgCoolor').addEventListener('click', function() {
    executeCommand('bgColorPicker').click();
});



document.getElementById('bgColorPicker').addEventListener('change', function() {
    executeCommand('hilliteColor', this.value);
});



document.getElementById('alignLeft').addEventListener('click', function() {
    executeCommand('left');
});



document.getElementById('alignRight').addEventListener('click', function() {
    executeCommand('right');
});



document.getElementById('alignJustify').addEventListener('click', function() {
    executeCommand('justify');
});



document.getElementById('indent').addEventListener('click', function() {
    executeCommand('indent');
});


document.getElementById('outdent').addEventListener('click', function() {
    executeCommand('outdent');
});



document.getElementById('orderedList').addEventListener('click', function() {
    executeCommand('insertOrderedList');
});



document.getElementById('unoderedList').addEventListener('click', function() {
    executeCommand('insertUnoderedList');
});



// document.getElementById('indent').addEventListener('click', function() {
//     executeCommand('indent');
// });



// document.getElementById('indent').addEventListener('click', function() {
//     executeCommand('indent');
// });





document.getElementById('textArea').addEventListener('focus', function() {
    executeCommand('styleWithCSS', false, true);
})
*/

// document.designMode = "on";

$(document).ready(function () {

    function executeCommand(command, value) {
        document.execCommand(command, false, value);
    }

    $("body").on("click", "#bold", function(e) {
        e.preventDefault();
        executeCommand('bold');

    });

    
    $("body").on("click", "#italic", function(e) {
        e.preventDefault();
        executeCommand('italic');

    });

    
    $("body").on("click", "#underline", function(e) {
        e.preventDefault();
        executeCommand('underline');

    });

    
    $("body").on("click", "#strikethrough", function(e) {
        e.preventDefault();
        executeCommand('strikethrough');

    });

    
    $("body").on("click", "#superscript", function(e) {
        e.preventDefault();
        executeCommand('superscript');

    });


    
    $("body").on("click", "#subscript", function(e) {
        e.preventDefault();
        executeCommand('subscript');

    });


    
    // $("body").on("click", "#code", function(e) {
    //     e.preventDefault();
    //     executeCommand(
    //         'innerHtml', 
    //         '<code>'+document.getSelection().toString()+'</code>');

    //     // executeCommand('innerHtml', '<code>'+document.getSelection()+'</code>');

    // });


    
    $("body").on("change", "#font", function(e) {
        e.preventDefault();
        executeCommand('fontName', this.value);

    });


    
    $("body").on("change", "#fontSize", function(e) {
        e.preventDefault();
        executeCommand('fontSize', this.value);

    });


    
    $("body").on("click", "#textColor", function(e) {
        e.preventDefault();
        executeCommand('textColorPicker').click();

    });

    
    $("body").on("change", "#textColorPicker", function(e) {
        e.preventDefault();
        executeCommand('fontColor', this.value);

    });

    
    $("body").on("click", "#bgColor", function(e) {
        e.preventDefault();
        executeCommand('bgColorPicker').click();

    });

    
    $("body").on("click", "#bgColorPicker", function(e) {
        e.preventDefault();
        executeCommand('backColor'), this.value;

    });

    
    $("body").on("click", "#alignLeft", function(e) {
        e.preventDefault();
        executeCommand('justifyLeft');

    });

    
    $("body").on("click", "#alignCenter", function(e) {
        e.preventDefault();
        executeCommand('justifyCenter');

    });

    
    $("body").on("click", "#alignRight", function(e) {
        e.preventDefault();
        executeCommand('justifyRight');

    });


    $("body").on("click", "#alignJustify", function(e) {
        e.preventDefault();
        executeCommand('justifyFull');

    });

    
    
    $("body").on("click", "#indent", function(e) {
        e.preventDefault();
        executeCommand('indent');

    });

    
    
    $("body").on("click", "#outdent", function(e) {
        e.preventDefault();
        executeCommand('outdent');

    });

    
    
    $("body").on("click", "#orderedList", function(e) {
        e.preventDefault();
        executeCommand('insertOrderedList');

    });

    
    
    $("body").on("click", "#unorderedList", function(e) {
        e.preventDefault();
        executeCommand('insertUnorderedList');

    });


    
    $("body").on("focus", "#textArea", function(e) {
        e.preventDefault();
        executeCommand('styleWithCSS', false, true);

    });

    // document.getElementById('textArea').addEventListener('focus', function() {
    //     executeCommand('styleWithCSS', false, true);
    // })
    
});
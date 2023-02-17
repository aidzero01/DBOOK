<head>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

   <script language="Javascript">

    /*  ÀÌ¹ÌÁö ¹Ì¸®º¸±â  */
    $.fn.setPreview = function (opt) {
      "use strict"
      var defaultOpt = {
        inputFile: $(this),
        img: null,
        w: 200,
        h: 'auto'
      };
      $.extend(defaultOpt, opt);

      var previewImage = function () {
        if (!defaultOpt.inputFile || !defaultOpt.img)
          return;

        var inputFile = defaultOpt.inputFile.get(0);
        var img = defaultOpt.img.get(0);

        // FileReader
        if (window.FileReader) {
          // image ÆÄÀÏ¸¸
          if (!inputFile.files[0].type.match(/image\//))
            return;

          // preview
          try {
            var reader = new FileReader();
            reader.onload = function (e) {
              img.src = e.target.result;
              img.style.width = defaultOpt.w + 'px';
              if (defaultOpt.h != 'auto')
                img.style.height = defaultOpt.h + 'px';
              else
                img.style.height = 'auto';
              img.style.display = '';
            }
            reader.readAsDataURL(inputFile.files[0]);
          } catch (e) {
            // exception...
          }
          // img.filters (MSIE)
        } else if (img.filters) {
          inputFile.select();
          inputFile.blur();
          var imgSrc = document.selection.createRange().text;

          img.style.width = defaultOpt.w + 'px';
          if (defaultOpt.h != 'auto')
            img.style.height = defaultOpt.h + 'px';
          else
            img.style.height = 'auto';
          //    img.style.height = defaultOpt.h+'px';
          img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enable='true',sizingMethod='scale',src=\"" + imgSrc + "\")";
          img.style.display = '';
          // no support
        } else {
          // Safari5, ...
        }
      };

      // onchange
      $(this).change(function () {
        previewImage();
      });
    };
                $(document).ready(function(){
                    var opt = {
                        img: $('#m_preview'),
                        w: 200,
                        h: 200
                    };
                    $('#m_photo').setPreview(opt);
                });  
    /* ex ***********************************************************************************************
     $(document).ready(function(){
     var opt = {
     img: $('#img_preview'),
     w: 200,
     h: 200
     };
     var opt2 = {
     img: $('#img_preview2'),
     w: 200,
     h: 200
     };
     
     $('#input_file').setPreview(opt);
     $('#input_file2').setPreview(opt2);
     });
     /*****************************************************************************************************/
  </script>
</head>
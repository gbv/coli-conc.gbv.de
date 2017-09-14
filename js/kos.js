$(function() {
  $('#collapse-all').on('click', function() { $('.collapse').collapse('hide'); });
  $('#expand-all').on('click', function() { $('.collapse').collapse('show'); });
  $('.collapse').collapse("hide");

  $(':checkbox').prop('checked', true);

  var kos2type = {};
  for (type in type2kos) {
      type2kos[type].forEach(function(kos) {
          if (!kos2type[kos]) kos2type[kos] = [];
          kos2type[kos].push(type);
      });
  }
  $(':checkbox').change(function() {      
    var checked = this.checked;
    var type = this.value;
    type2kos[type].forEach(function(uri) {
      var id = uri.substring(uri.lastIndexOf('/')+1)
      if (checked) {
        $("#kos-"+id).show();
      } else {
        // don't hide if other type is checked
        var types = kos2type[uri];
        for(var i=0; i<types.length; i++) {
            if (types[i] != type) {
                if ($("input[type=checkbox][value='"+types[i]+"']:checked").length) {
                    return;
                }
            }
        }
        $("#kos-"+id).hide();
      }
    });
  });
});


function setCheckbox(item, param) {
    if (document.getElementById(item.id).checked) {
        value = "1";
    } else {
        value = "0";
    }
    $.getJSON('../api/includes/ws_action.php?api=/config/module/beef/'+param+'/'+value, function(data) {});
}

function setOption(item, param) {
	value = $("#"+item).val();
    $.getJSON('../api/includes/ws_action.php?api=/config/module/beef/'+param+'/'+value, function(data) {});
}

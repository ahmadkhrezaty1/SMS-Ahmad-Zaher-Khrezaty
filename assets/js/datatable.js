

    function aa ($id = "", $url){
      $('#' + $id).DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        "ajax": $url,
      });
    }
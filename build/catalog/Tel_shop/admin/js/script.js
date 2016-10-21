$(document).ready(function() {
    // Funkcja zmiany koloru po usunięciu elementa
    $('.delete').click(function() {
        var rel = $(this).attr("rel");
        $.confirm({
            'title': 'Potwierdzenie usunięcia',
            'message': 'Po usunięciu powrót będzie niemożliwy! Potwierdzić?',
            'buttons': {
                'Tak': {
                    'class': 'blue',
                    'action': function() {
                        location.href = rel;
                    }
                },
                'Nie': {
                    'class': 'gray',
                    'action': function() {}
                }
            }
        });
    });

    // Wyświetlenie komunikatu o sprawdzeniu zamówienia, admin panel
    $('#select-links').click(function() {
        $("#list-links,#list-links-sort").slideToggle(200);
    });

    // Wyświetlenie informacji o towarze, admin panel
    $('.h3click').click(function() {
        $(this).next().slideToggle(400);
    });

    // Dodanie nowego towaru, admin panel
    var count_input = 1;
    $("#add-input").click(function() {
        count_input++;
        $('<div id="addimage' + count_input + '" class="addimage"><input type="hidden" name="MAX_FILE_SIZE" value="2000000"/><input type="file" name="galleryimg[]" /><a class="delete-input" rel="' + count_input + '" >Usunąć</a></div>').fadeIn(300).appendTo('#objects');
    });

    // Usunięcie zdjęcia, admin panel
    $('.delete-input').live('click', function() {
        var rel = $(this).attr("rel");
        $("#addimage" + rel).fadeOut(300, function() {
            $("#addimage" + rel).remove();
        });
    });

    // Usunięcie zdjęcia z galerii, admin panel
    $('.del-img').click(function() {
        var img_id = $(this).attr("img_id");
        var title_img = $("#del" + img_id + " > img").attr("title");
        $.ajax({
            type: "POST",
            url: "./actions/delete-gallery.php",
            data: "id=" + img_id + "&title=" + title_img,
            dataType: "html",
            cache: false,
            success: function(data) {
                if (data == "delete") {
                    $("#del" + img_id).fadeOut(300);
                }
            }
        });
    });

    // Usunięcie kategorii, admin panel
    $('.delete-cat').click(function() {
        var selectid = $("#cat_type option:selected").val();
        if (!selectid) {
            $("#cat_type").css("borderColor", "#F5A4A4");
        } else {
            $.ajax({
                type: "POST",
                url: "./actions/delete-category.php",
                data: "id=" + selectid,
                dataType: "html",
                cache: false,
                success: function(data) {
                    if (data == "delete") {
                        $("#cat_type option:selected").remove();
                    }
                }
            });
        }
    });

    // Wyświetlenie informacji o użytkowniku, admin panel
    $('.block-clients').click(function() {
        $(this).find('ul').slideToggle(300);
    });

    // Wybór wszystkich uprawnień, admin panel
    $('#select-all').click(function() {
        $(".privilege input:checkbox").attr('checked', true);
    });

    // Skasowanie wszystkich uprawnień, admin panel
    $('#remove-all').click(function() {
        $(".privilege input:checkbox").attr('checked', false);
    });


});

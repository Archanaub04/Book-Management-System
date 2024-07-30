$(document).ready(function () {
    var table = $("#books-table").DataTable({
        order: [],
    });

    // Filter the table based on category
    $("#categoryFilter").on("change", function () {
        var selectedCategory = $(this).val();
        if (selectedCategory) {
            table
                .column(2)
                .search("^" + selectedCategory + "$", true, false)
                .draw();
        } else {
            table.column(2).search("").draw();
        }
    });

    $("#category-table").DataTable({
        order: [],
    });


});

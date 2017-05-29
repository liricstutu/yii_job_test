/**
 * Created by liric on 20.05.2017.
 */
$(function () {
    $('#datetimepicker1').datetimepicker({
        locale: 'ET'
    });
    $(document).on("click", ".glyphicon-trash", function () {
        $(this).parents(".list-group-item").remove();
        return false;
    });
    $(document).on("click", ".glyphicon-edit", function () {
        var $parent = $(this).parents(".list-group-item");
        $("#task-input").val($parent.find(".item-task").text());
        $("#datetime-picker").val($parent.find(".item-date").text());
        return false;
    });
    $(".task-form").on("submit", function () {
        var $new_task = $(".list-group-item").last().clone();
        $new_task.find(".item-task").text($("#task-input").val());
        $new_task.find(".item-date").text($("#datetime-picker").val());
        $new_task.appendTo(".list-group")
        return false;
    });
});
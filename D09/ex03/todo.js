$(document).ready(function() {
    var currentDiv = $("#end");
    var counter = 0;

    function addTask() {
        content = prompt("Entrez votre nouvelle tache");
        if (content != null)
        {
            $.post("insert.php", {'id': counter, 'task': content});
            restoreTasks();
        }
    }

    function removeTask() {
        confirmation = confirm("Etes-vous sur de supprimer cette tache ?")
        if (confirmation === true) {
            taskid = $(this).attr('id');
            $.post("delete.php", {'id': taskid});
            restoreTasks()
        }
    }


    function restoreTasks() {
        $(".task").remove();
        $.get("select.php?test=ok", function (data) {
            tasks = JSON.parse(data);
            for(var id in tasks){
                $("<div id='"+id+"' class = 'task'>"+tasks[id]+"</div>").click(removeTask).appendTo('#ft_list');
                if (Number(id) > counter) {
                    counter = Number(id);
                }
            };
            counter += 1;
            console.log(counter);
        });
    }
        restoreTasks();
        $("#new").click(addTask);
});
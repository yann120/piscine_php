$(document).ready(function() {
    var currentDiv = $("#end");
    var counter = 0;

    function addTask() {
        content = prompt("Entrez votre nouvelle tache");
        if (content != null)
        {
            newTask = $("<div id='"+counter+"' class = 'task'>"+content+"</div>").appendTo('#ft_list');
            document.cookie = counter+"="+content;
            $.post("insert.php", {'id': counter, 'task': content});
            counter += 1;
            document.cookie = "counter="+counter;
        }
    }

    function removeTask() {
        confirmation = confirm("Etes-vous sur de supprimer cette tache ?")
        if (confirmation === true) {
            taskid = $(this).attr('id');
            $(this).remove();
            $.post("delete.php", {'id': taskid});
        }
    }


    function restoreTasks() {
        allCookies = document.cookie.split(";");
        allCookies.forEach(function(element){
            values = element.split('=');
            if (values[0] === " counter" || values[0] === "counter")
            {
                counter = Number(values[1]);
            }
            else if (typeof values[1] !== "undefined")
            {
                newTask = $("<div id='"+Number(values[0])+"' class = 'task'>"+values[1]+"</div>").appendTo('#ft_list');
            }
        });
    }
        restoreTasks();
        $("#new").click(addTask);
        $(".task").click(removeTask)
});

// a changer sur ex 02 et ex03: les task venant detre ajoutées ne peuvent pas etre supprimés
// a faire : afficher toute les taches du csv
// ajax pour ajouter et supprimer données
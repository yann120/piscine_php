$(document).ready(function() {
    var currentDiv = $("#end");
    var counter = 0;

    function addTask() {
        content = prompt("Entrez votre nouvelle tache");
        if (content != null)
        {
            newTask = $("<div id='"+counter+"' class = 'task'>"+content+"</div>").click(removeTask).appendTo('#ft_list');
            document.cookie = counter+"="+content;
            counter += 1;
            document.cookie = "counter="+counter;
        }
    }

    function removeTask() {
        confirmation = confirm("Etes-vous sur de supprimer cette tache ?")
        if (confirmation === true) {
            taskid = $(this).attr('id');
            $(this).remove();
            console.log(taskid);
            document.cookie = taskid + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
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
                newTask = $("<div id='"+Number(values[0])+"' class = 'task'>"+values[1]+"</div>").click(removeTask).appendTo('#ft_list');
            }
        });
    }
        restoreTasks();
        $("#new").click(addTask);
});
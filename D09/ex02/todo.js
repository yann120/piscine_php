var currentDiv = document.getElementById("end");
var counter = 0;
// var tasks = {};


function addTask() {
    content = prompt("Entrez votre nouvelle tache");
    if (content != null)
    {
        newTask = document.createElement("div");
        newTask.setAttribute("id", counter);
        newTask.setAttribute("onclick", "removeTask(this)")
        newContent = document.createTextNode(content);
        newTask.appendChild(newContent);
        document.getElementById("ft_list").insertBefore(newTask, currentDiv);
        document.cookie = counter+"="+content;
        counter += 1;
        document.cookie = "counter="+counter;
    }
}

function removeTask(task) {
    confirmation = confirm("Etes-vous sur de supprimer cette tache ?")
    if (confirmation === true) {
        task.remove();
        taskid = task.id;
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
            newTask = document.createElement("div");
            newTask.setAttribute("id", values[0]);
            newTask.setAttribute("onclick", "removeTask(this)")
            newContent = document.createTextNode(values[1]);
            newTask.appendChild(newContent);
            document.getElementById("ft_list").insertBefore(newTask, currentDiv);
        }
    });
}
document.addEventListener('DOMContentLoaded', function() {
    restoreTasks();
 }, false);

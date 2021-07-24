console.log("AircraftJS");

var url = window.location.origin;

window.onload = function getQueue() {
    var request = new XMLHttpRequest();

    request.open('GET', url + '/api/aircrafts/queue', false);
    request.send(null);
    var queue = JSON.parse(request.responseText);
    for( var i = 0; i < queue.length; i++) {
        queue[i].type = queue[i]['type']['description'];
        queue[i].size = queue[i]['size']['description'];
        formatDate = new Date(queue[i]['created_at'])
        queue[i].created_at = formatDate.toISOString().substring(0, 19).replace('T', ' ');
    }
    
    console.log(queue[0]);
    createTable(queue);
}

function deleteAircraft(id) {
    if(confirm('¿Esta seguro de que quiere eliminar el registro?')){
        fetch(url + '/api/aircrafts/' + id, {
            
            method: 'DELETE',

        }).then( res => {

            console.log(res);
            alert('Se ha eliminado el registro')
            window.location.reload()

        }).catch(error => console.log(error));
    }
}


function createTable(list) {
    var body = document.getElementById('table-cotainer');
    var table = document.createElement("table");
    var tableBody = document.createElement("tbody");
    let tHead = document.createElement('thead');

    /* Table header */
    let rowHead = document.createElement('tr');

    let h1 = document.createElement('td');
    let t1 = document.createTextNode("Tipo");
        h1.appendChild(t1);

    let h2 = document.createElement('td');
    let t2= document.createTextNode("Modelo");
        h2.appendChild(t2);

    let h3 = document.createElement('td');
    let t3= document.createTextNode("Tamaño");
        h3.appendChild(t3);

    let h4 = document.createElement('td');
    let t4= document.createTextNode("Fecha de registro")
        h4.appendChild(t4);
        

    rowHead.appendChild(h1);
    rowHead.appendChild(h2);
    rowHead.appendChild(h3);
    rowHead.appendChild(h4);
    tableBody.appendChild(rowHead);

    /* draw table*/
    for(var i = 0; i < list.length; i++) {
        var row = document.createElement("tr");
        var type = document.createElement("td");
        var typeText = document.createTextNode(list[i].type)
        var model = document.createElement("td");
        var modelText = document.createTextNode(list[i].model)
        var size = document.createElement("td");
        var sizeText = document.createTextNode(list[i].size)
        var date = document.createElement("td");
        var dateText = document.createTextNode(list[i].created_at);
        var editBtn = document.createElement('a');
        var editTxt = document.createTextNode('Editar');
        var deletBtn = document.createElement('input');
        
        /* Set Aircraft type */
        type.appendChild(typeText);
        row.appendChild(type);
        
        /* Set Aircraft model*/
        model.appendChild(modelText);
        row.appendChild(model);
        
        /* Set Aircraft size*/
        size.appendChild(sizeText);
        row.appendChild(size);
        
        /* Set Aircraft date*/
        date.appendChild(dateText);
        row.appendChild(date);
        
        /* Set Action buttons*/
        editBtn.setAttribute("class", "edit-btn");
        editBtn.appendChild(editTxt);
        editBtn.setAttribute("href",  url +"/aircraft/edit/"+ list[i].id )
        row.appendChild(editBtn);
        deletBtn.setAttribute("type","button")
        deletBtn.setAttribute("class", "delete-btn");
        deletBtn.setAttribute("value", "X");
        deletBtn.setAttribute("onclick", "deleteAircraft(" + list[i].id + ")" )
        row.appendChild(deletBtn);


        tableBody.appendChild(row);
    }

    table.appendChild(tableBody);
    body.appendChild(table);
}
var url = window.location;
var aircraftID = url.pathname.split('/')[3];
if (aircraftID > 0 ) {
    loadAircraft(aircraftID);
}

function loadAircraft(id) {
    var request = new XMLHttpRequest();

    request.open('GET', url.origin + '/api/aircrafts/' + aircraftID, false);
    request.send(null);
    var aircraftData = JSON.parse(request.responseText);
    /* Set default aircraft values*/
    document.getElementById('model').setAttribute('value', aircraftData.model)
    document.getElementById('type').getElementsByTagName('option')[(aircraftData.type_id)].selected = 'selected'
    document.getElementById('size').getElementsByTagName('option')[(aircraftData.size_id)].selected = 'selected'
}

function sendData() {
    var modelName = document.getElementById('model').value;
    var type = document.getElementById('type').value;
    var size = document.getElementById('size').value;


    if (modelName != '' && type != 0 && size != 0 ) {
        if(aircraftID > 0) {
            fetch(url.origin + '/api/aircrafts/' + aircraftID, {

                method: 'PUT',
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({'model': modelName, 'type_id': type, 'size_id': size})

            }).then( res => {

                console.log(res);
                alert('Se actualizo el registro')
                window.location.replace(url.origin)

            }).catch(error => console.log(error));
        } else {
                fetch(url.origin + '/api/aircrafts', {
    
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({'model': modelName, 'type_id': type, 'size_id': size})
    
                }).then( res => {
    
                    console.log(res);
                    alert('Se a creado un nuevo registro')
                    window.location.replace(url.origin)
    
                }).catch(error => console.log(error));
        }
    } else {
        alert('Por favor verifique que ninguno de los campos este vacio.')
    }
}
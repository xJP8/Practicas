let db;
let version;
initDatabase();
showForm();

/**
 * Función que se encarga de comprobar si la pantalla es menor a 600px.
 * @returns {string} - Devuelve un string con el prefijo correspondiente.
 */
function checkVersion(){

    if (window.innerWidth < 600) {
        return "d_"; // Movil
    }else{
        return "f_"; // Escritorio
    }
}

/**
 * Funcion que se encarga de comprobar que cumplan con los requisitos.
 * @returns {boolean} - Devuelve un booleano que indica si los campos cumplen con los requisitos.
 */
function checkCamps(){

    let nombreElement = document.getElementById(version+'nombre');
    let telefonoElement = document.getElementById(version+'telefono');
    let emailElement = document.getElementById(version+'email');

    let nombre = nombreElement.value;
    let telefono = telefonoElement.value;
    let email = emailElement.value;

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let phoneRegex = /^[0-9]{9}$/;
    let error = false;

    if (nombre == "") {
        nombreElement.style.border = "1px solid red";
        error = true;
    } else {
        nombreElement.style.border = "";
    }

    if (!phoneRegex.test(telefono)) {
        telefonoElement.style.border = "1px solid red";
        error = true;
    } else {
        telefonoElement.style.border = "";
    }

    if (email !== "" && !emailRegex.test(email)) {
        emailElement.style.border = "1px solid red";
        error = true;
    } else {
        emailElement.style.border = "";
    }

    return !error;
}

/**
 * Funcion que se encarga de mostrar los datos del contacto.
 * @returns {void} - No devuelve nada.
 */
function showContact(id) {

    let nombre = document.getElementById(version+'nombre');
    let prefijo = document.getElementById(version+'prefijo');
    let telefono = document.getElementById(version+'telefono');
    let email = document.getElementById(version+'email');
    let empresa = document.getElementById(version+'empresa');

    let transaction = db.transaction(["contacts"], "readonly");
    let objectStore = transaction.objectStore("contacts");
    let request = objectStore.get(id);

    let tituloElements = document.getElementsByClassName("titulo");
    let btnEliminar = document.getElementsByClassName("btnEliminar");
    let btnGuardar = document.getElementsByClassName("btnGuardar");

    for (let i = 0; i < btnEliminar.length; i++) {
        btnEliminar[i].style.display = "";
    }

    for (let i = 0; i < btnGuardar.length; i++) {
        btnGuardar[i].onclick = function() {
            updateContact();
        };
    }

    for (let i = 0; i < tituloElements.length; i++) {
        tituloElements[i].innerText = "Contacto";
    }

    request.onsuccess = function(event) {
        let contact = event.target.result;
        if (contact) {
            nombre.value = contact.nombre;
            prefijo.value = contact.prefijo;
            telefono.value = contact.telefono;
            email.value = contact.email;
            empresa.value = contact.empresa;
        } else {
            console.log("Contacto no encontrado");
        }
    };

    request.onerror = function(event) {
        console.error("Error al buscar el contacto: " + event.target.errorCode);
    };

    if (version == "d_") {
        let dialogo = document.getElementById("dialogo");
        dialogo.showModal();
        console.log("Mostrando Dialogo - Movil");
    } else {
        console.log("Mostrando Dialogo - Escritorio");
    }
}

/**
 * Funcion que se encarga de mostrar el formulario para añadir un contacto.
 */
function showForm() {

    let nombre = document.getElementById(version+'nombre');
    let telefono = document.getElementById(version+'telefono');
    let email = document.getElementById(version+'email');
    let empresa = document.getElementById(version+'empresa');

    nombre.value = "";
    telefono.value = "";
    email.value = "";
    empresa.value = "";


    let tituloElements = document.getElementsByClassName("titulo");
    let btnEliminar = document.getElementsByClassName("btnEliminar");
    let btnGuardar = document.getElementsByClassName("btnGuardar");

    for (let i = 0; i < btnEliminar.length; i++) {
        btnEliminar[i].style.display = "none";
    }

    for (let i = 0; i < btnGuardar.length; i++) {
        btnGuardar[i].onclick = function() {
            addContact();
        };
    }

    for (let i = 0; i < tituloElements.length; i++) {
        tituloElements[i].innerText = "Nuevo Contacto";
    }
    if (version == "d_") {
        let dialogo = document.getElementById("dialogo");
        dialogo.showModal();
        console.log("Mostrando Dialogo - Movil");
    } else {
        console.log("Mostrando Dialogo - Escritorio");

    }
}

/**
 * Funcion que se encarga de inicializar la base de datos.
 */
function initDatabase() {
    let request = indexedDB.open("contactsDB", 1);

    request.onupgradeneeded = function(event) {
        db = event.target.result;
        let objectStore = db.createObjectStore("contacts", { keyPath: "id", autoIncrement: true });
        objectStore.createIndex("nombre", "nombre", { unique: false });
        objectStore.createIndex("empresa", "empresa", { unique: false });
    };

    request.onsuccess = function(event) {
        db = event.target.result;
        search("");
        version = checkVersion();
    };

    request.onerror = function(event) {
        console.error("Database error: " + event.target.errorCode);
    };
}

/**
 * Busca los contactos que coincidan con el texto.
 * @param {string} nombre
 */
function search() {
    let text = document.getElementById('search').value;
    let transaction = db.transaction(["contacts"], "readonly");
    let objectStore = transaction.objectStore("contacts");
    let indexNombre = objectStore.index("nombre");
    let indexEmpresa = objectStore.index("empresa");

    let results = [];

    if (text === "") {
        objectStore.openCursor().onsuccess = function(event) {
            let cursor = event.target.result;
            if (cursor) {
                results.push(cursor.value);
                cursor.continue();
            }
        };
    } else {
        indexNombre.openCursor().onsuccess = function(event) {
            let cursor = event.target.result;
            if (cursor) {
                if (cursor.value.nombre.includes(text)) {
                    results.push(cursor.value);
                }
                cursor.continue();
            }
        };

        indexEmpresa.openCursor().onsuccess = function(event) {
            let cursor = event.target.result;
            if (cursor) {
                if (cursor.value.empresa.includes(text)) {
                    results.push(cursor.value);
                }
                cursor.continue();
            }
        };
    }

    transaction.oncomplete = function() {
        let contactsContainer = document.getElementById('contact_list');
        contactsContainer.innerHTML = '';

        results.forEach(contact => {
            let contactElement = document.createElement('div');
            contactElement.className = 'contacto';
            contactElement.onclick = function() {
                showContact(contact.id);
            };

            let imgElement = document.createElement('img');
            imgElement.src = 'img/Contacto.png';
            imgElement.alt = 'contacto';

            let divElement = document.createElement('div');

            let h3Element = document.createElement('h3');
            h3Element.innerText = contact.nombre;

            let pElement = document.createElement('p');
            pElement.innerText = contact.prefijo + ' ' + contact.telefono;

            divElement.appendChild(h3Element);
            divElement.appendChild(pElement);

            contactElement.appendChild(imgElement);
            contactElement.appendChild(divElement);

            contactsContainer.appendChild(contactElement);
        });

        console.log("Search results:", results);
    };
}

/**
 * Funcion que se encarga de eliminar un contacto.
 */
function deleteContact(){
    let nombre = document.getElementById(version+'nombre');
    let telefono = document.getElementById(version+'telefono');
    let email = document.getElementById(version+'email');
    let empresa = document.getElementById(version+'empresa');

    let transaction = db.transaction(["contacts"], "readwrite");
    let objectStore = transaction.objectStore("contacts");
    let index = objectStore.index("nombre");

    index.openCursor().onsuccess = function(event) {
        let cursor = event.target.result;
        if (cursor) {
            if (cursor.value.nombre === nombre.value && cursor.value.telefono === telefono.value) {
                let deleteRequest = objectStore.delete(cursor.primaryKey);

                deleteRequest.onsuccess = function(event) {
                    console.log("Contacto eliminado con éxito!!");

                    nombre.value = "";
                    telefono.value = "";
                    email.value = "";
                    empresa.value = "";
            
                    search("");
            
                    if (version == "d_") {
                        let dialogo = document.getElementById("dialogo");
                        dialogo.close();
                    } else {
                        showForm();
                    }
                };

                deleteRequest.onerror = function(event) {
                    console.error("Error al eliminar el contacto: " + event.target.errorCode);
                };
            } else {
                cursor.continue();
            }
        }
    };
}

/**
 * Funcion que se encarga de actualizar un contacto.
 */
function updateContact(){
    if (checkCamps()) {
        let nombre = document.getElementById(version+'nombre');
        let prefijo = document.getElementById(version+'prefijo');
        let telefono = document.getElementById(version+'telefono');
        let email = document.getElementById(version+'email');
        let empresa = document.getElementById(version+'empresa');

        let transaction = db.transaction(["contacts"], "readwrite");
        let objectStore = transaction.objectStore("contacts");
        let index = objectStore.index("nombre");

        index.openCursor().onsuccess = function(event) {
            let cursor = event.target.result;
            if (cursor) {
                if (cursor.value.nombre === nombre.value && cursor.value.telefono === telefono.value) {
                    let updateRequest = objectStore.put({ id: cursor.value.id, nombre: nombre.value, prefijo: prefijo.value, telefono: telefono.value, email: email.value, empresa: empresa.value });

                    updateRequest.onsuccess = function(event) {
                        console.log("Contacto actualizado con éxito!!");

                        nombre.value = "";
                        telefono.value = "";
                        email.value = "";
                        empresa.value = "";
                
                        search("");
                
                        if (version == "d_") {
                            let dialogo = document.getElementById("dialogo");
                            dialogo.close();
                        } else {
                            showForm();
                        }
                    };

                    updateRequest.onerror = function(event) {
                        console.error("Error al actualizar el contacto: " + event.target.errorCode);
                    };
                } else {
                    cursor.continue();
                }
            }
        };
    }
}

/**
 * Funcion que se encarga de añadir un contacto.
 */
function addContact(){
    if (checkCamps()) {
        let nombre = document.getElementById(version+'nombre');
        let prefijo = document.getElementById(version+'prefijo');
        let telefono = document.getElementById(version+'telefono');
        let email = document.getElementById(version+'email');
        let empresa = document.getElementById(version+'empresa');

        let transaction = db.transaction(["contacts"], "readwrite");
        let objectStore = transaction.objectStore("contacts");
        let request = objectStore.add({ nombre: nombre.value, prefijo: prefijo.value, telefono: telefono.value, email: email.value, empresa: empresa.value });

        request.onsuccess = function(event) {
            nombre.value = "";
            telefono.value = "";
            email.value = "";
            empresa.value = "";

            if (version == "d_") {
                let dialogo = document.getElementById("dialogo");
                dialogo.close();
            } else {
                showForm();
            }
        };

        request.onerror = function(event) {
            console.error("Error al añadir el contacto: " + event.target.errorCode);
        };
        search("");
    }
}
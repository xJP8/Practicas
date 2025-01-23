const formulario = document.getElementById('formulario');
const dialogo = document.getElementById('dialogo');
const request = indexedDB.open("AgendaDB", 1);
cargarContactos();

let formato = "form_"; // form_ = Ordenador, dialog_ = Telefono

function checkScreenSize() {
    if (window.innerWidth < 600) {
        formato = "dialog_";
        formulario.classList.add('hidden');
        dialogo.classList.remove('hidden');
    } else {
        formato = "form_";
        formulario.classList.remove('hidden');
        dialogo.classList.add('hidden');
    }
}

function cargarContactos() {
    const request = indexedDB.open("AgendaDB");

    request.onsuccess = (event) => {
        const db = event.target.result;
        const transaction = db.transaction("contacto", "readonly");
        const store = transaction.objectStore("contacto");

        const getAllRequest = store.getAll();
        getAllRequest.onsuccess = () => {
            let contactos = getAllRequest.result;

            const contactosContainer = document.getElementById('contactos');

            contactos.forEach(contacto => {
                const contactoDiv = document.createElement('div');
                contactoDiv.classList.add('contacto');
                contactoDiv.addEventListener('click', () => openInfo());

                const img = document.createElement('img');
                img.src = 'img/Contacto.png';
                img.alt = 'contacto';

                const h3 = document.createElement('h3');
                h3.textContent = contacto.nombre;

                contactoDiv.appendChild(img);
                contactoDiv.appendChild(h3);


                contactosContainer.appendChild(contactoDiv);
            });

            

            console.log("Todos los contactos:", getAllRequest.result);
        };
        getAllRequest.onerror = () => {
            console.error("Error al obtener contactos:", getAllRequest.error);
        };
    };

    request.onerror = (event) => {
        console.error("Error al abrir la base de datos:", event.target.error);
    };
}

function addContact() {
    let nombre = document.getElementById(formato + 'nombre').value;
    let prefijo = document.getElementById(formato + 'prefijo').value;
    let telefono = document.getElementById(formato + 'telefono').value;
    let email = document.getElementById(formato + 'email').value;
    let empresa = document.getElementById(formato + 'empresa').value;
    let contacto = { nombre, prefijo, telefono, email, empresa };



    const request = indexedDB.open("AgendaDB");

    request.onsuccess = (event) => {
        const db = event.target.result;
        const transaction = db.transaction("contacto", "readwrite");
        const store = transaction.objectStore("contacto");

        const addRequest = store.add(contacto);
        addRequest.onsuccess = () => {
            console.log("Contacto añadido:", contacto);
        };
        addRequest.onerror = () => {
            console.error("Error al añadir contacto:", addRequest.error);
        };
    };

    request.onerror = (event) => {
        console.error("Error al abrir la base de datos:", event.target.error);
    };

    cargarContactos();
}

function deleteContact() {
    const request = indexedDB.open("AgendaDB");
    let telefono = document.getElementById(formato + 'telefono').value;

    request.onsuccess = (event) => {
        const db = event.target.result;
        const transaction = db.transaction("contacto", "readwrite");
        const store = transaction.objectStore("contacto");

        const deleteRequest = store.delete(telefono);
        deleteRequest.onsuccess = () => {
            console.log(`Contacto con teléfono ${telefono} eliminado`);
        };
        deleteRequest.onerror = () => {
            console.error("Error al eliminar contacto:", deleteRequest.error);
        };
    };

    request.onerror = (event) => {
        console.error("Error al abrir la base de datos:", event.target.error);
    };

    cargarContactos();
}

function openInfo() {
    console.log("openInfo");

    if (formato === "form_") {
        formulario.classList.remove('hidden');
        dialogo.classList.add('hidden');
        
        


        let nombre = document.getElementById(formato + 'nombre').value;
        let prefijo = document.getElementById(formato + 'prefijo').value;
        let telefono = document.getElementById(formato + 'telefono').value;
        let email = document.getElementById(formato + 'email').value;
        let empresa = document.getElementById(formato + 'empresa').value;
        
    }
}












request.onupgradeneeded = (event) => {
    const db = event.target.result;

    // Crear una tabla (almacén de objetos) llamada "contacto"
    if (!db.objectStoreNames.contains("contacto")) {
        const contactoStore = db.createObjectStore("contacto", { keyPath: "telefono" }); // Usamos el teléfono como clave primaria
        // Crear índices para facilitar búsquedas
        contactoStore.createIndex("nombre", "nombre", { unique: false });
        contactoStore.createIndex("email", "email", { unique: true });
        console.log("Tabla 'contacto' creada");
    }
};

request.onerror = (event) => {
    console.error("Error al abrir la base de datos:", event.target.error);
};

request.onsuccess = (event) => {
    console.log("Base de datos abierta correctamente");
};


window.addEventListener('resize', checkScreenSize);
window.addEventListener('load', checkScreenSize);
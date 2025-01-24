const formulario = document.getElementById('formulario');
const dialogo = document.getElementById('dialogo');
const request = indexedDB.open("AgendaDB", 1);
cargarContactos();

let formato = "form_"; // form_ = Ordenador, dialog_ = Telefono

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
                contactoDiv.addEventListener('click', () => openInfo(contacto.telefono));

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

function openInfo(telefono) {
    console.log(telefono);

    if (formato === "form_") {
        formulario.classList.remove('hidden');
        dialogo.classList.add('hidden');
        
        const request = indexedDB.open("AgendaDB");

        request.onsuccess = (event) => {
            const db = event.target.result;
            const transaction = db.transaction("contacto", "readonly");
            const store = transaction.objectStore("contacto");
            const index = store.index("nombre");

            const getRequest = index.get(telefono);
            getRequest.onsuccess = () => {
            const contacto = getRequest.result;
            if (contacto) {
                document.getElementById(formato + 'nombre').value = contacto.nombre;
                document.getElementById(formato + 'prefijo').value = contacto.prefijo;
                document.getElementById(formato + 'telefono').value = contacto.telefono;
                document.getElementById(formato + 'email').value = contacto.email;
                document.getElementById(formato + 'empresa').value = contacto.empresa;
            } else {
                console.log("Contacto no encontrado");
            }
            };
            getRequest.onerror = () => {
            console.error("Error al obtener contacto:", getRequest.error);
            };
        };

        request.onerror = (event) => {
            console.error("Error al abrir la base de datos:", event.target.error);
        };
        


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
        contactoStore.createIndex("telefono", "telefono", { unique: true });
        contactoStore.createIndex("email", "email", { unique: false });
        console.log("Tabla 'contacto' creada");
    }
};

request.onerror = (event) => {
    console.error("Error al abrir la base de datos:", event.target.error);
};

request.onsuccess = (event) => {
    console.log("Base de datos abierta correctamente");
};
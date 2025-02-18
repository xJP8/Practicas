#!/bin/bash

# Configuración de servidores FTP
# Formato: "servidor usuario contraseña ruta_remota"
SERVERS=(
    "localhost user user FTP/"
    # Añade más servidores aquí
)

# Obtener la fecha actual en formato yyyymmdd
FECHA_ACTUAL=$(date +"%Y%m%d")

# Ruta local para guardar los archivos
LOCAL_DIR="./descargas"

# Crear el directorio local si no existe
mkdir -p "$LOCAL_DIR"

# Función para descargar archivos de un servidor FTP
descargar_archivos() {
    local SERVER=$1
    local USER=$2
    local PASS=$3
    local REMOTE_DIR=$4

    echo "Conectando a $SERVER..."

    # Conectar al servidor FTP y descargar los archivos
    ftp -n $SERVER <<END_SCRIPT
    quote USER $USER
    quote PASS $PASS
    cd $REMOTE_DIR
    ls | grep "$FECHA_ACTUAL" > /tmp/ftp_files.txt
    !mkdir -p "$LOCAL_DIR/$SERVER"
    while read -r file; do
        get "$file" "$LOCAL_DIR/$SERVER/$file"
    done < /tmp/ftp_files.txt
    quit
END_SCRIPT

    # Limpiar archivo temporal
    rm -f /tmp/ftp_files.txt

    echo "Descarga desde $SERVER completada. Archivos guardados en $LOCAL_DIR/$SERVER"
}

# Iterar sobre cada servidor y descargar archivos
for SERVER_INFO in "${SERVERS[@]}"; do
    # Dividir la información del servidor
    IFS=' ' read -r SERVER USER PASS REMOTE_DIR <<< "$SERVER_INFO"
    
    # Llamar a la función de descarga
    descargar_archivos "$SERVER" "$USER" "$PASS" "$REMOTE_DIR"
done

echo "Proceso completado. Revisa la carpeta $LOCAL_DIR."
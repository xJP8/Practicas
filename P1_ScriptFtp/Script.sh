#!/bin/bash

# Archivo de log
LOG_FILE="Log.txt"

# Lista de servidores FTP
SERVERS=("localhost")

# Credenciales FTP (usuario y contraseña)
FTP_USER="user"
FTP_PASS="user"

# Generar el nombre del archivo dinámicamente (usando la fecha actual)
FILE_FORMAT=$(date +"%Y_%m_%d")-*

# Función para conectar y descargar el archivo
download_file_from_ftp() {
    local server=$1
    echo "Conectando a $server..." | tee -a "$LOG_FILE"
    
    # Intentar descargar el archivo
    ftp -n "$server" <<END_SCRIPT
    user "$FTP_USER" "$FTP_PASS"
    binary
    get "$FILE_FORMAT"
    quit
END_SCRIPT

    # Verificar si la descarga fue exitosa
    if [ $? -eq 0 ]; then
        echo "Descarga completada desde $server." | tee -a "$LOG_FILE"
    else
        echo "Error al descargar el archivo desde $server." | tee -a "$LOG_FILE"
    fi
}

# Limpiar el archivo de log si existe
> "$LOG_FILE"

# Iterar sobre cada servidor y descargar el archivo
for server in "${SERVERS[@]}"; do
    download_file_from_ftp "$server"
done

echo "Proceso completado. Verifica el archivo de log: $LOG_FILE"
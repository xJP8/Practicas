#!/bin/bash

# Lista de servidores FTP
FTP_SERVERS=("localhost" "192.168.4.70")
FTP_USER="user"
FTP_PASS="user"

# Directorio local donde se guardarán los archivos descargados
LOCAL_DIR="./downloads"
mkdir -p $LOCAL_DIR

# Archivo de log
LOG_FILE="./logs/"$(date +"%Y_%m_%d")"-"$(date +"%H:%M:%S")".log"
mkdir -p ./logs

# Fecha de ejecución (en formato YYYY-MM-DD)
CURRENT_DATE=$(date +"%Y%m%d")

# Función para conectarse al servidor FTP y descargar los archivos
download_files() {
    local SERVER=$1
    echo "[$(date +"%H:%M:%S")] - [INFO] - Conectando a $SERVER..." >> $LOG_FILE
    
    # Variable para contar archivos descargados
    FILES_DOWNLOADED=0
    FILES=""

    ftp -inv $SERVER <<EOF 
user $FTP_USER $FTP_PASS
cd FTP/
lcd $LOCAL_DIR
mget $CURRENT_DATE*
bye
EOF

  # Comprobar si realmente se descargaron archivos
  for file in $LOCAL_DIR/*$CURRENT_DATE*; do
    if [ -f "$file" ] && [ "$(stat -c %Y "$file")" -ge "$(date -d "now - 1 minute" +%s)" ]; then
      ((FILES_DOWNLOADED++))
      FILES+="|-- "$(basename "$file")"\n"
    fi
  done
}

# Crear el archivo de log si no existe
if [ ! -f $LOG_FILE ]; then
    touch $LOG_FILE
fi

# Escribir encabezado en el log
echo "[$(date +"%H:%M:%S")] - [INFO] - === Proceso de descarga FTP - $CURRENT_DATE ===" >> $LOG_FILE

# Iterar sobre cada servidor y descargar los archivos
for SERVER in "${FTP_SERVERS[@]}"; do
    download_files $SERVER
done

if [ $FILES_DOWNLOADED -gt 0 ]; then
  echo "[$(date +"%H:%M:%S")] - [INFO] - Archivos descargados:" >> $LOG_FILE
  echo -e "$FILES" >> $LOG_FILE
else
  echo "[$(date +"%H:%M:%S")] - [ERROR] - No se encontraron archivos para descargar de $SERVER." >> $LOG_FILE
fi

# Finalizar log
echo "[$(date +"%H:%M:%S")] - [INFO] - === Fin del proceso ===" >> $LOG_FILE


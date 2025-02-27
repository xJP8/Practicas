#!/bin/bash

# Lista de servidores FTP
FTP_SERVERS=("127.0.0.1")
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
    FILES=""

    # Capturar la salida de FTP para ver qué archivos fueron descargados
    FTP_OUTPUT=$(ftp -inv $SERVER <<EOF 
user $FTP_USER $FTP_PASS
cd FTP/
lcd $LOCAL_DIR
mget $CURRENT_DATE*
bye
EOF
)

  # Extraer los nombres de los archivos descargados de la salida de FTP
  for file in $LOCAL_DIR/*$CURRENT_DATE*; do
      if [ -f "$file" ]; then
          # Verificamos si el archivo está en la salida de FTP
          if echo "$FTP_OUTPUT" | grep -q "$(basename "$file")"; then
              FILES+="|-- "$(basename "$file")"\n"
          fi
      fi
  done

  # Si encontramos archivos descargados, los registramos
  if [ -n "$FILES" ]; then
      echo "[$(date +"%H:%M:%S")] - [INFO] - Archivos descargados:" >> $LOG_FILE
      echo -e "$FILES" >> $LOG_FILE
  else
      echo "[$(date +"%H:%M:%S")] - [WARN] - No se encontraron archivos para descargar." >> $LOG_FILE
  fi
  echo "[$(date +"%H:%M:%S")] - [INFO] - Conexión cerrada con $SERVER." >> $LOG_FILE
  echo "----------------------------------------------" >> $LOG_FILE
}


# Crear el archivo de log si no existe
if [ ! -f $LOG_FILE ]; then
    touch $LOG_FILE
fi

# Escribir encabezado en el log
echo "[$(date +"%H:%M:%S")] - [INFO] - === Proceso de descarga FTP - $CURRENT_DATE ===" >> $LOG_FILE
echo "----------------------------------------------" >> $LOG_FILE

# Iterar sobre cada servidor y descargar los archivos
for SERVER in "${FTP_SERVERS[@]}"; do
    download_files $SERVER
done

# Finalizar log
echo "[$(date +"%H:%M:%S")] - [INFO] - === Fin del proceso ===" >> $LOG_FILE


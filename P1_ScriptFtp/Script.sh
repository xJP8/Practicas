#!/bin/bash

# Servidores FTP
declare -A SERVIDORES
SERVIDORES=(
  ["localhost"]="user:user"
  # ["ftp.servidor1.com"]="usuario1:password1"
)

# Ruta FTP
CARPETA_REMOTA="FTP/"

# Ruta LOCAL
CARPETA_LOCAL="./descargas"
mkdir -p "$CARPETA_LOCAL"

# Fecha actual en formato YYYY_MM_DD
FECHA=$(date +"%Y_%m_%d")

# Archivo Log
LOG_FILE=$FECHA"-Log.txt"
>> $LOG_FILE

# Recorrer los servidores
for SERVIDOR in "${!SERVIDORES[@]}"; do

  CREDENCIALES=${SERVIDORES[$SERVIDOR]} # usuario:password
  USUARIO=${CREDENCIALES%%:*}
  PASSWORD=${CREDENCIALES#*:}

  echo "[ $(date +"%H:%M:%S") ] - Conectando a: "$SERVIDOR | tee -a "$LOG_FILE"

ftp $SERVIDOR <<EOF 
user $USUARIO $PASSWORD
cd $CARPETA_REMOTA
mget $FECHA*
bye
EOF
  

done 
#!/bin/bash
if [ $# -gt 0 ]; then
    usuari=$1

    sudo chmod -R 775 ../public/img
    sudo chown -R $1:www-data ../public/img
else
    echo "Error: Falten Parametres!!!";
    echo "Exemple: sudo ./accesImatges.sh usuari-sistema"
fi
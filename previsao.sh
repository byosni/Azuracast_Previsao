#!/bin/sh
# Previsao do Tempo
# /root/previsao_tempo/previsao.sh

#url da sua hospedagem onde se encontra o index.php da noticias
URL="https://radiodubalacobaco.com.br/previsao/index.php"

#path de midias da sua estacao de radio
path="/var/lib/docker/volumes/azuracast_station_data/_data/dubalacobaco/media/Previsao"

# Pego a noticia do site
# o sed traz apenas 1 linha da previsao do tempo,caso queira somente a previsao do seu estado, ajutas para alinha desejada,
# sed 1,1 significa trazer somente a linha 1
# sed 2,2 significa trazer somente a linha 2
# se tirar o sed traz todas as urls baseadas em mp3.
PREVISAO=$(curl -s $URL | grep ".mp3" | cut -c 13-77 | sed -n '1,1p')

#vou baixar o audio para a pasta
wget -O $path/tempo.mp3 "$PREVISAO"

#arruma permissão para o arquivo
chown -Rf 1000.1000 $path

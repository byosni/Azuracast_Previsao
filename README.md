<h1>Previsão do Tempo em Áudio Para RádioWeb </h1>

Script para baixar áudio da previosao do tempo do site agenciabrasil.ebc.com.br<br> 
Lembrar de colocar o index.php dentro de um servidor que rode o php.<br>

<h2>Criar uma Pasta: /root/previsao_tempo em seu servidor com AzuraCast.</h2>
<code>mkdir /root/previsao_tempo && cd /root/previsao_tempo</code>

<h2>Baixar o script previsao.sh para /root/noticias</h2>
<code>wget https://raw.githubusercontent.com/byosni/azuracast_previsao/main/previsao.sh</code>
<p>Ajustar a URL do script apontando para o seu domínio onde está hospedado o arquivo PHP.<br>
O script baixa a previsao do tempo em áudio e copia para dentro da pasta de midia da sua estacao no azuracast.
Não esqueça de ajustar o caminho desta pasta também.</p>

<h2>Dar permissão para o script</h2>
<code>chmod +x previsao.sh</code>

<h2>Programar o crontab</h2>
<p>Programei o crontab para baixar a previsão do tempo todos os dias as 08h da manhã.</p>

<code>cronta -e</code> <br> 
<code>#baixa a noticia de hora em hora sempre aos 10 minutos da hora; </code><br>
<code>0 8 * * * /root/previsao_tempo/previsao.sh </code>

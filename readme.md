Fix Joomla 1.5 Media Menager File Upload
========================================

Para executar o patch basta rodar os seguintes comandos no diretório raiz da instalação do Joomla!

$ sudo chmod +x patch.php
$ sudo php patch.php /

Aí ainda rola um grep S em paralelo com o patch pra deixar mais concisa as informações na shell. Só cuidado pra não deixarem rodando em DAEMON por causa do privilege escalation que o root dá pelo php.

$ sudo php patch.php / | grep S
$ ps aux | grep patch

Se tiver rolando essa bagaça em background, você pode rodar killall nele antes de rodar outro processo :)

Bom, só isso mesmo.
Só precisa rodar uma vez em cada instalação do Joomla!


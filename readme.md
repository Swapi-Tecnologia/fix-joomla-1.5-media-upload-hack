# Corrigindo Joomla 1.5 Media Menager Upload de arquivo

Como a comunidade não dá mais suporte ao Joomla! 1.5, mas ainda existem muitos usuários do mesmo e esse exploit é muito perigoso, resolvemos criar um patch para salvar a vida de quem ainda usa a versão antiga, para ter tempo de migrar para novas versões.

O patch foi baseado no diff oficial da correção do bug https://github.com/joomla/joomla-cms/commit/fa5645208eefd70f521cd2e4d53d5378622133d8

Testamos em uma instalação local e funcionou tudo certo. Qualquer problema agradecemos a ajuda!

Viva ao livre!

## Executando

Para executar o patch basta rodar os seguintes comandos no diretório raiz da instalação do Joomla!
``
$ sudo chmod +x patch.php
``
``
$ sudo php patch.php /
``
Aí ainda rola um grep S em paralelo com o patch pra deixar mais concisa as informações na shell. Só cuidado pra não deixarem rodando em DAEMON por causa do privilege escalation que o root dá pelo php.

``
$ sudo php patch.php / | grep S
``
``
$ ps aux | grep patch
``

Se tiver rolando essa bagaça em background, você pode rodar killall nele antes de rodar outro processo :)

Bom, só isso mesmo.
Só precisa rodar uma vez em cada instalação do Joomla!


# Fix Joomla 1.5 Media Menager File Upload

The community no longer supports the Joomla! 1.5, but there are still many users of it and this is very dangerous exploit, decided to create a patch to save the lives of those who still use the old version, so take time to migrate to new versions.

The patch was based on diff official bug fix https://github.com/joomla/joomla-cms/commit/fa5645208eefd70f521cd2e4d53d5378622133d8

Tested on a local and it worked fine. Any problem we appreciate the help!

Live the free!

## Running

To run the patch just run the following commands in the root directory of Joomla!
``
$ sudo chmod + x patch.php
``
``
$ sudo php patch.php /
``
There still rolls a **grep S** in parallel with the patch to let more concise information on shell. Only careful not to leave running on DAEMON because the root privilege escalation that gives the php.

``
$ sudo php patch.php / | grep S
``
``
$ ps aux | grep patch
``

If you have this stuff going on in the background, you can run it before running killall another process :)

Well, that's it.
Only needs to run once every installation of Joomla!

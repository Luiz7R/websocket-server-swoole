## Instalando o Swoole

Instale as dependências necessárias para Swoole:

```
sudo apt-get install -y git php-dev php-pear libpcre3-dev gcc make
```

Clone o repositório Swoole:

```
git clone https://github.com/swoole/swoole-src.git
```

Entre na pasta, e faça o build e a instalação da extensão:

```
phpize
./configure
make && sudo make install
```

Adicione a extensão Swoole ao seu arquivo php.ini:

```
echo "extension=swoole.so" | sudo tee -a /etc/php/8.1/cli/php.ini
```
Substituia 8.1 pela sua versão do PHP.

Inicie o Servidor de WebSocket

```
php index.php
```

### Rode a pagina em terminal separado:

```
php paginaHtml.php
```
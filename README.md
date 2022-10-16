# Credencial para a JACITEC 2022
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?logo=php&logoColor=white&style=for-the-badge)
![GitHub](https://img.shields.io/badge/github-%23121011.svg?logo=github&logoColor=white&style=for-the-badge)

### Template desenvolvido para o IFES Campus Cachoeiro de Itapemirim

Este projeto foi desenvolvido para gerar a credencial de cada inscrito em cursos, palestras ou quaisquer eventos que estarão na JACITEC 2022. 

### Dependências do projeto
```
Composer
```
```
PHP ^7.0
```

### Para executar o projeto, use:
```
composer install
```
Em um terminal execute:
```
php -S 127.0.0.1:8888
```
Abra no navegador a seguinte URL: ```127.0.0.1:8888/qrcode.php``` para gerar os arquivos 

### Para ter acesso aos PDFs, use:
Para exibir todos os QRCodes em formato PDF
```
http://127.0.0.1:8888/pdf-exibir.php
```
Para baixar um arquivo PDF com todos os QRCodes
```
http://127.0.0.1:8888/pdf-baixar.php
```
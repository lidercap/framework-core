Framework Core
==============

Este pacote contém pequenos componente que extendem funcionalidades nativas do PHP,
ou que provém uma base de código coerente para outros componentes do framework.

Em resumo: tudo o que for pequeno de mais para ter o próprio repositório, deverá residir neste projeto.

Exemplos:

* Service traits
* Pattern traits
* Controller helper methods
* Types, collections
* Exceptions
* etc...

Instalação
----------

É recomendado instalar **Framework Core** através do [composer](http://getcomposer.org).

```json
{
    "require": {
        "lidercap/framework-core": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:lidercap/framework-core.git"
        }
    ]
}
```

NOME DA FUNÇÃO
--------------

Descrição da função.

```php
<?php

// Coloque aqui exemplos de uso

```

Desenvolvimento e Testes
------------------------

Dependências:

 * PHP 5.5.x ou superior
 * Composer
 * Git
 * Make

Para rodar a suite de testes, você deve instalar as dependências externas do projeto e então rodar o PHPUnit.

    $ make install
    $ make test    (sem relatório de coverage)
    $ make testdox (com relatório de coverage)

Responsáveis técnicos
---------------------

 * **Leonardo Thibes: <lthibes@lidercap.com.br>**
 * **Gabriel Specian: <gspecian@lidercap.com.br>**

# mailfinder-php
Essa biblioteca destina-se aos usuários do mailfinder.io que desejam incluir as funcionalidade dentro do próprio sistema. Ela traz pronta a funcionalidade de validação de emails utilizando a API disponibilizada em [mailfinder.io](http://mailfinder.io)

### Instalação com Composer
```
composer require mailfinder/mailfinder-v1
```

### Instalação com Manual
- Faça o download do zip desse repositório
- Salve os arquivos no seu projeto
- Inclua o arquivo Mailfinder.php na pasta de destino ('ex: dest/')
```php
require_once (_DIR_.'dest/Mailfinder.php');
```

### Utilização
Para utilizar é necessário possuir uma API key gerada através de [nosso sistema](http://mailfinder.io/app/#/app/list_api)
Caso não possua a chave faça o seguinte processo:
- Entre em [mailfinder.io](http://mailfinder.io/app)
- Caso possua uma conta entre com os dados de login. Se não você pode registrar uma nova (é grátis o/ )
- No menu esquerto clique em APIs
- Cadastre uma nova API
- Abra a nova api e você visualizará a nova chave criada.

Com a chave de api criada e após instalar a biblioteca em seu sistema você deve istanciar uma nova classe passando a chave de API como referência. Ex:
```php
use Mailfinder\Api AS Mailfinder;
$key = 'XXXXXXXXXXXXXXXXXXX'; // Aqui você cola a sua chave de api
$mf = new Mailfinder($key);
```
Com isso sua classe já está pronta para o uso.

Agora para validar um email basta executar o método "validate" passando o email desejado como parâmetro. Ex:
```php
$mf->validate("any@email.com");
```

### Exemplo Completo
```php
$loader = require __DIR__ . '/vendor/autoload.php';
use Mailfinder\Api AS Mailfinder;

$mf = new Mailfinder('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
$response = $mf->validate("fernando@mailfinder.io");
if($response->result=='send'){
  echo 'Email é válido';
}
else{
  echo 'Email inválido';
}
```

### Mais informações
Para mais informações veja nossa [documentação](https://github.com/mailfinder/mailfinder-php/wiki) ou nosso [blog](http://blog.mailfinder.io)


### [mailfinder.io](http://mailfinder.io)

## Descrição
API REST criada na linguagem PHP para manipulação da classe disciplina. Essa classe contém os atributos id, descricao, professor, curso, periodo e sala.
Realizada como atividade da disciplina de Desenvolvimento de Sistemas WEB do curso de Sistemas de Informação do Instituto Federal do Norte de Minas Gerais - Campus Salinas.
O objetivo da API é realizar consultas, inserções, atualizações e remoção de dados, de uma tabela no banco de dados.

## Clone ou utilização do projeto

Sua utilização pode ser realizada através de uma máquina local, ou acessando o deploy da aplicação. Por não utilizar de nenhuma depêndencia, em ambos os formatos seu uso é fácil.
Para uso na máquina local é necessário: 
- Clonar o repositório na máquina local
- Alterar as configurações de banco de dados para as suas configurações. Encontrado no caminho ``` API_RESR_WEB/config/database.php``` 
- Acessar o endereço ``` https://localhost/API_REST_WEB/api/``` 
 

Para realizar seu uso via o deploy no heroku basta acessar o endereço ``` https://localhost/API_REST_WEB/api/``` 
 
## Utilização

A api permite:
- Retornar as informações de todas as disciplinas cadastradas. READ
- Retornar apenas a informação de uma disciplina cadastrado com base no `id` informado no endereço da requisição. SINGLE
- Inserir uma nova disciplina. CREATE
- Excluir uma disciplina com base no `id` informado no corpo da requisição. DELETE
- Atualizar a descricao, o professor, o curso, o periodo e a sala de uma disciplina cadastrado com base no `id`. UPDATE


## Requisições
##### Requisição READ
A requisição read, é uma requisição do tipo GET realizada atravez do endereço local:
``` 
https://localhost/API_REST_WEB/api/read.php
``` 
Ou acessando remoto pelo endereço:
``` 
https://localhost/API_REST_WEB/api/read.php
``` 
Um exemplo de sua saída está abaixo:
```json
[
  "body": [
        {
            "id": "1",
            "descricao": "WEB",
            "professor": "Arthur",
            "sala": "laboratório 3",
            "periodo": "6º período",
            "curso": "BSI"
        },
        {
            "id": "2",
            "descricao": "Algoritmos III",
            "professor": "Patricia",
            "sala": "laboratório 2",
            "periodo": "6º período",
            "curso": "BSI"
        }
    ]
]
```

##### Requisição SINGLE

A requisição single, é uma requisição do tipo GET realizada atravez do endereço local:
``` 
https://localhost/API_REST_WEB/api/single.php/?id=chave
``` 
Ou acessando remoto pelo endereço:
``` 
https://localhost/API_REST_WEB/api/single.php/?id=chave
``` 
sendo chave alterada pelo `id` que deseja acessar. Por exemplo para acessar o `id` 1 utiliza-se:
``` 
https://localhost/API_REST_WEB/api/single.php/?id=1
``` 
Um exemplo de sua saída utilizando o `id` 1 está abaixo:
```json
{
    "id": "1",
    "descricao": "descricao",
    "professor": "professor",
    "sala": "sala",
    "periodo": "periodo",
    "curso": ""
}
```

##### Requisição CREATE

A requisição create, é uma requisição do tipo POST realizada atravez do endereço local:
``` 
https://localhost/API_REST_WEB/api/create.php
``` 
Ou acessando remoto pelo endereço:
``` 
https://localhost/API_REST_WEB/api/read.php
``` 
passando em seu corpo o JSON com os dados a inserir.
Um exemplo de corpo de inserção pode ser visto a baixo:
```json
{
    "descricao": "Metodologia Cientifica",
    "professor": "Patricia",
    "sala": "Sala 3 predio 2",
    "periodo": "4º periodo",
    "curso": "BSI"
}
```

##### Requisição DELETE

A requisição delete, é uma requisição do tipo DELETE realizada atravez do endereço local:
``` 
https://localhost/API_REST_WEB/api/delete.php
``` 
Ou acessando remoto pelo endereço:
``` 
https://localhost/API_REST_WEB/api/delete.php
``` 
passando em seu corpo o JSON com o `id` da disciplina que deseja excluir.
Um exemplo de corpo de exclusão da disciplina cujo o `id` é 3 pode ser visto a baixo:
```json
{
    "id":3
}
```

##### Requisição UPDATE

A requisição update, é uma requisição do tipo PUT realizada atravez do endereço local:
``` 
https://localhost/API_REST_WEB/api/update.php
``` 
Ou acessando remoto pelo endereço:
``` 
https://localhost/API_REST_WEB/api/update.php
``` 
passando em seu corpo o JSON com os dados que deseja atualizar, e o `id` da disciplina.
Um exemplo de corpo de update da disciplina cujo o `id` é 1 pode ser visto a baixo:
```json
{
            "id": "1",
            "descricao": "Desenvolvimento WEB",
            "professor": "Arthur",
            "sala": "laboratório 2",
            "periodo": "3º Ano",
            "curso": "técnico em informática"
}
```



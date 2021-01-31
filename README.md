# Api-PhpSlim
### Api com Php Slim, para aprendizado. ![Badge](https://img.shields.io/static/v1?label=license&message=MIT&color=gree)  ![Badge](https://img.shields.io/static/v1?label=buld&message=progress&color=gree) ![Badge](https://img.shields.io/static/v1?label=PHP&message=7.2&color=blue) ![Badge](https://img.shields.io/static/v1?label=framework&message=PhpSlim4&color=blue) ![Badge](https://img.shields.io/static/v1?label=version&message=1.0.0&color=white)

## Métodos
Requisições para a API devem seguir os padrões:
<!--ts-->
| Método | Descição |
| --- | --- |
| GET | Retorna Informações de um ou mais registros |
| POST | Cria um novo registro |
| PUT | Atualiza um determindado registro |
| DELETE | Remove um registro |
<!--te-->

## Código Respostas
| Código | Descição |
| --- | --- |
| 200 | Executado com sucesso |
| 201 | Criado com sucesso |
| 400 | Erros de validação ou campos inexistentes |
| 401 | Credenciais de acesso inválidos |
| 404 | Recurso não encontrado |
| 501 | Erro interno |

## Rotas
### Customer
| Método | Rota | Descrição
| --- | --- | --- |
| GET | /api/customers | Lista todos clientes guardados na base |
| GET | /api/customers/id | Retorna os dados de um unico cliente |
| POST | /api/customers | Armazena um novo cliente |
| PUT |  /api/customers/id | Atuaiza os attributos de um unico cliente |
| DELETE |  /api/customers/id | Remove um determido cliente |

## Como Usar - Customers

## Obter lista de Clientes
* ### Request - GET - /api/customers (application/json)
```
curl -X GET -H 'Content-Type: application/json' -i http://localhost/api/customers
```
* ### Response - GET - /api/customers - 200 (application/json)
```
[
    {
    "id": 172,
    "nome": "Luzia Tânia Raquel das Neves",
    "idade": 26,
    "cpf": "434.248.740-35",
    "rg": "10.962.625-4",
    "data_nasc": "1995-06-21",
    "sexo": "Feminino",
    "mae": "Carla Antônia",
    "pai": "Martin Luís das Neves",
    "email": "luziataniaraqueldasneves_@atualmarcenaria.com.br",
    "signo": "Câncer",
    "cep": "58801-215",
    "endereco": "Rua Francisco Gonçalves Ribeiro",
    "bairro": "Guanabara",
    "cidade": "Sousa",
    "estado": "PB",
    "numero": 650,
    "telefone_fixo": "(83) 2739-2449",
    "celular": "(83) 98930-1122",
    "altura": 1,
    "peso": 54,
    "tipo_sanguineo": "A-",
    "cor": "azul"
    }, {
    "id": 173,
    "nome": "Sueli Isabel Pereira",
    "idade": 46,
    "cpf": "915.226.359-20",
    "rg": "28.291.580-1",
    "data_nasc": "1975-05-15",
    "sexo": "Feminino",
    "mae": "Clarice Isabelle Lavínia",
    "pai": "Thomas Bernardo Pereira",
    "email": "sueliisabelpereira..sueliisabelpereira@ceuazul.ind.br",
    "signo": "Touro",
    "cep": "09380-355",
    "endereco": "Viela Oswaldo Rodrigues de Almeida",
    "bairro": "Jardim Sônia Maria",
    "cidade": "Mauá",
    "estado": "SP",
    "numero": 337,
    "telefone_fixo": "(11) 3702-0771",
    "celular": "(11) 99836-2451",
    "altura": 1,
    "peso": 88,
    "tipo_sanguineo": "AB+",
    "cor": "amarelo"
    }, {
    "id": 174,
    "nome": "Pedro Luiz Ruan Peixoto",
    "idade": 58,
    "cpf": "230.693.154-29",
    "rg": "17.083.798-1",
    "data_nasc": "1963-05-15",
    "sexo": "Masculino",
    "mae": "Raimunda Ester",
    "pai": "Julio Erick Pietro Peixoto",
    "email": "pedroluizruanpeixoto__pedroluizruanpeixoto@allianceconsultoria.com.br",
    "signo": "Touro",
    "cep": "72153-506",
    "endereco": "Setor SIG Conjunto F",
    "bairro": "Taguatinga Norte (Taguatinga)",
    "cidade": "Brasília",
    "estado": "DF",
    "numero": 849,
    "telefone_fixo": "(61) 2994-9486",
    "celular": "(61) 98401-0524",
    "altura": 1,
    "peso": 56,
    "tipo_sanguineo": "A-",
    "cor": "laranja"
    }
]
```
## Obter dados do Cliente X
* ### Request - GET - /api/customers/id (application/json)
```
curl -X GET -H 'Content-Type: application/json' -i http://localhost/api/customers/22
```
* ### Response - GET - /api/customers/id - 200 (application/json)
```
{
  "id": 22,
  "nome": "Pietra Silvana Julia Fernandes",
  "idade": 21,
  "cpf": "653.690.763-91",
  "rg": "45.112.488-1",
  "data_nasc": "2000-10-07",
  "sexo": "Feminino",
  "mae": "Natália Priscila",
  "pai": "Enzo Lucca Yago Fernandes",
  "email": "pietrasilvanajuliafernandes_@optovac.com.br",
  "signo": "Libra",
  "cep": "69911-862",
  "endereco": "Rua João Gomes",
  "bairro": "Ayrton Sena",
  "cidade": "Rio Branco",
  "estado": "AC",
  "numero": 389,
  "telefone_fixo": "(68) 2760-0787",
  "celular": "(68) 99931-9934",
  "altura": 1.67,
  "peso": 53,
  "tipo_sanguineo": "A+",
  "cor": "verde"
}
```

## Inserir um Novo Cliente
* ### Request - POST - /api/customers (application/json)
    * Body
```
curl -X POST -H 'Content-Type: application/json' -i http://localhost/api/customers --data '{
  "nome": "Pietra Silvana Julia Fernandes",
  "idade": 21,
  "cpf": "653.690.763-91",
  "rg": "45.112.488-1",
  "data_nasc": "07/12/1996",
  "sexo": "Feminino",
  "mae": "Natália Priscila",
  "pai": "Enzo Lucca Yago Fernandes",
  "email": "pietrasilvanajuliafernandes_@optovac.com.br",
  "signo": "Libra",
  "cep": "69911-862",
  "endereco": "Rua João Gomes",
  "bairro": "Ayrton Sena",
  "cidade": "Rio Branco",
  "estado": "AC",
  "numero": 389,
  "telefone_fixo": "(68) 2760-0787",
  "celular": "(68) 99931-9934",
  "altura": 1.67,
  "peso": 53,
  "tipo_sanguineo": "A+",
  "cor": "verde"
}'
```
* ### Response - POST - /api/customers - 201 (application/json)

## Atualizar dados do Cliente X
* ### Request - PUT - /api/customers/id (application/json)
    * Body
```
curl -X PUT -H 'Content-Type: application/json' -i http://localhost/api/customers/22 --data '{
"idade": 25,
"numero": 422
}'
```
* ### Response - PUT - /api/customers - 200 (application/json)
```
{
  "success": true
}
```

## Deletar Cliente X
* ### Request - DELETE - /api/customers/id (application/json)
    * Body
```
curl -X DELETE -H 'Content-Type: application/json' -i http://localhost/api/customers/149
}'
```
* ### Response - DELETE - /api/customers - 200 (application/json)
```
{
  "success": true
}
```

## Parametros - GET
## Limit - Limita o retorno de registros
```
curl -X GET -H 'Content-Type: application/json' -i 'http://localhost/api/customers?limit=3'
```

## Asc - Ordena o retorno em ordem crescente de acordo com o atributo
``` 
curl -X GET -H 'Content-Type: application/json' -i 'http://localhost/api/customers?asc=idade'
```

## Desc - Ordena o retorno em ordem decrescente de acordo com o atributo
```
curl -X GET -H 'Content-Type: application/json' -i 'http://localhost/api/customers?desc=id'
```

## Limit & Page - Cria uma paginação
```
curl -X GET -H 'Content-Type: application/json' -i 'http://localhost/api/customers?limit=10&page=3' 
```

## Fields
```
curl -X GET -H 'Content-Type: application/json' -i 'http://localhost/api/customers?fields[id,nome,email,celular,telefone_fixo]'
```

## Filter - Filtra os retorno de acordo com os parametro passado [atributo, operador, valor]
```
curl -X GET -H 'Content-Type: application/json' -i 'http://localhost/api/customers?filter[idade,>,25]'
```

## Find By - Filtra usando o atributo e valor passado
```
curl -X GET -H 'Content-Type: application/json' -i 'http://localhost/api/customers?cpf=703.246'
```
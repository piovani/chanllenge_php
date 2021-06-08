# chanllenge_php

Objectivos
- [X] - instalar o framework
- [X] - imagens docker
- [X] - CRUD Users
    - Nome completo
    - CPF/CNPJ
    - E-Mail
    - Senha
    - apenas um com mesmo cpf/cnpj ou e-mail
    - tipos de usuario (usuario normal e lojistas)
        - [X] - CREATE User
        - [X] - UPDATE User
        - [X] - SHOW User
        - [X] - LIST Users
        - [X] - DELETE User
- [X] - Trsnferencias
    - usuario deve ter saldo na conta para fazer isso
    - lojistas nao enviam dinheiro apenas recebem
    - validar com api externa https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6
    - caso de retorno da transferencia
    - deve ser notificado por email, sms usando outra api externa http://o4d9z.mocklab.io/notify
    - payload 
        {
            "value" : 100.00,
            "payer" : 4,
            "payee" : 15
        }
- [X] - script de avaliacao automatizado
    - docker run -it --rm -v $(pwd):/project -w /project jakzal/phpqa phpmd app text cleancode,codesize,controversial,design,naming,unusedcode
- [X] - testes
    - [X] - integracao
    - [X] - unitarios
- [X] - porposta de melhoria para a arquitetura

## REVISAO

- [X] - documentação
- [X] - arquitetura
- [X] - codigo limpo
- [X] - padroes
    - [X] - PSRs
    - [X] - patterns
    - [X] - SOLID
- [X] - solucao de dominio
- [X] - modelagem de dados
- [X] - manutencao do codigo
- [X] - tratamento de erros
- [X] - segurancao
- [X] - camadas
    - [X] - services
    - [X] - repositories


## Instalação e Inicialização do Projeto

Com o seu terminal aberto na diretório do projeto execute:

1. Copie o arquivo .env-exemple
```
cp .env.example .env 
```

2. Criar o Network docker na sua maquina
```
docker network create chanllenge_php-networks
```

3. Criar o volume docker na sua maquina
```
docker volume create --name=chanllenge_php-db
```

4. Inicar os containers
```
docker-compose up -d
```

5. Rodar as migrates
```
docker-compose run chanllenge_php-app php artisan migrate
```

## PROPOSTA DE MELHORIA DA ARQUITETURA
1. Separar o wallet do usuario

2. Separar o o tipo para uma categoria toda propria para o Vendedor

3. Notificações sendo colocada em filas de processamento, assim não é preciso aguardar o retorno da api

4. Vendedores podem transferir tambêm para os outros vendedores apenas

5. Exigir uma foto da documentação, para confirmar a indentidade, com isso colocar um status aguardando confirmação dos dados

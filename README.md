# chanllenge_php

Objectivos
[ ] - imagens docker
[ ] - autenticacao
[ ] - CRUD Users
- Nome completo
- CPF/CNPJ
- E-Mail
- Senha
- apenas um com mesmo cpf/cnpj ou e-mail
- tipos de usuario (usuario normal e lojistas)
    [ ] - CREATE User
    [ ] - UPDATE User
    [ ] - SHOW User
    [ ] - LIST Users
    [ ] - DELETE User
[ ] - Trsnferencias
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
[ ] - script de avaliacao automatizado
- docker run -it --rm -v $(pwd):/project -w /project jakzal/phpqa phpmd app text cleancode,codesize,controversial,design,naming,unusedcode
[ ] - testes
    [ ] - integracao
    [ ] - unitarios
[ ] - porposta de melhoria para a arquitetura

## REVISAO
[ ] - documentação
[ ] - arquitetura
[ ] - codigo limpo
[ ] - padroes
    [ ] - PSRs
    [ ] - patterns
    [ ] - SOLID
[ ] - solucao de dominio
[ ] - modelagem de dados
[ ] - manutencao do codigo
[ ] - tratamento de erros
[ ] - segurancao
[ ] - camadas
    [ ] - services
    [ ] - repositories

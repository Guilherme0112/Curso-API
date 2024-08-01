# Documentaçao da API RESTful, CRUD

- Baixe o o repositório ou digite:
<br>
`git clone https://github.com/Guilherme0112/Curso-API.git`

- No arquivo "classes/db-classes.php" você pode conectar seu banco de dados MySQL, lembre-se de trocar os nomes das tabelas nas query's que ficam na pasta "classes".

- Nos verbos PUT e DELETE, tem que ser criada uma coluna chamada "_method" e colocar o método desejado.

Listar usuários (GET):
<br>
`localhost/api/usuarios/lista`

Inserir usuários (POST):
<br>
`localhost/api/usuarios/adicionar`

Editar usuários (PUT):
<br>
`localhost/api/usuarios/update/{id}`

Deletar usuários (DELETE):
<br>
`localhost/api/usuarios/delete/{id}`